//for google map
var map;
//marker for user's address
var myHomeMarker;
//position of user it is LatLng object
var userAddressLatLng;
//adding all the salon markers to this array
var salonMarkers = [];
//this is the array containing all the salons objects which we get by json call
var allSalons = [];
//this array will contain all the LatLng for all the salons
var allsalonsLatLng = [];
//this is for settimeout function which we need to overcome when we are getting QUERY_OVER_LIMIT by geocoder
var myTimeout;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 43.728971, lng: -79.6076467},
        zoom: 10
    });
    //adding search box
    var input = document.getElementById("search");
    var searchBox = new google.maps.places.SearchBox(input);
    searchBox.addListener('places_changed', function() {
        var place = searchBox.getPlaces();
        // Clear out the old address marker.
        if(myHomeMarker != null) {
            myHomeMarker.setMap(null);
        }
        if (place.length == 0) {
            return;
        }else{
            userAddressLatLng = place[0].geometry.location;
            myHomeMarker = new google.maps.Marker({
                map: map,
                position: place[0].geometry.location
            });
        }
        // making preffered distance enabled once user enters the address
        $("#preferredDistance").attr('disabled',false);
    });
}

var app = angular.module("myApp", []);
app.controller('MyMapController', ["$scope", "$http", function ($scope, $http) {
    //making a ajax request and getting salons json which i am saving in salons now that is an array
        $http.get("SalonList.php").then(function (response) {
        $scope.salons = response.data;
        allSalons = $scope.salons;
        getLatLngForAllSalons(0);

    });

    // creating a method to mark all salons on map whenever user changes distance this method will be called
    $scope.markSalonsWithinDistance = function (preferredDistance) {

        //clearing out all markers first
        for(i=0;i<salonMarkers.length;i++){
            salonMarkers[i].setMap(null);
        }
        //showing salons as per distance
        for(i=0;i<salonMarkers.length;i++){
            if(calcDistance(allsalonsLatLng[i],userAddressLatLng) < preferredDistance){
                //generating info window for the salons that will be visible on the map
                generateInfoWindow(salonMarkers[i],allSalons[i]);
                salonMarkers[i].setMap(map);
            }
        }
    }

}]);


// controller for appointments
app.controller('MyAppointmentController', ["$scope", "$http", function ($scope, $http) {
    //getting salon id
    var salonid = document.getElementById("salonid").value;
    //making a ajax request and getting all appointments for that particular salon now that is an array
    //getting json data as per salon id
    $http({
        url:"AppointmentsJSON.php",
        method:"GET",
        params:{
            salonId:salonid
        }}).then(function (response) {
        $scope.allAppointments = response.data;
    });
    $scope.allTimings = ["10:00:00", "10:30:00", "11:00:00", "11:30:00", "12:00:00", "12:30:00", "13:00:00", "13:30:00",
        "14:00:00", "14:30:00", "15:00:00", "15:30:00", "16:00:00", "16:30:00", "17:00:00", "17:30:00", "18:00:00", "18:30:00",
        "19:00:00", "19:30:00"];

    $scope.getAppointmentTimings = function(date){
        $scope.appointmentstartingTimings = [];
        $scope.availableAppointmentTimings = [];
        for(i=0;i<$scope.allAppointments.length;i++){
            if($scope.allAppointments[i].orderdate == date){
                $scope.appointmentstartingTimings.push($scope.allAppointments[i].appointmentstarttime);
            }
        }
        if($scope.appointmentstartingTimings.length > 0){
            for(i=0;i<$scope.allTimings.length;i++){
                if($scope.appointmentstartingTimings.indexOf($scope.allTimings[i]) == -1 ){
                    $scope.availableAppointmentTimings.push($scope.allTimings[i]);
                }
            }
        }
        else{
            $scope.availableAppointmentTimings = $scope.allTimings;
        }
    }
}]);
//returning appropriate marker as per distance
//this function is going to give us all the salon's LatLng obj we will call it with time out function
//once we get all the latLng for salons we will simply clear timeout
function getLatLngForAllSalons(i){
    var geocoder = new google.maps.Geocoder();
    if(i<allSalons.length){
    geocoder.geocode( { 'address': allSalons[i].streetaddress + "," + allSalons[i].city + "," + allSalons[i].province}, function(results, status) {
        if (status == 'OK') {
           allsalonsLatLng.push(results[0].geometry.location);
            myTimeout = setTimeout(function () {
                i++;
                getLatLngForAllSalons(i);
            },100);
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }

    });
}else{
        clearTimeout(myTimeout);
        createAllSalonMarkers();
    }
}
//this function is generating all the markers but i am not setting the map right now
//will set it as per user's selected distance
function createAllSalonMarkers() {
    for(i=0;i<allsalonsLatLng.length;i++){
        salonMarkers[i] = new google.maps.Marker({
            position: allsalonsLatLng[i],
            icon: "./images/salon.jpg",
            animation: google.maps.Animation.DROP
        });

    }
}
//calculates distance between two points in km's
function calcDistance(p1, p2) {
    return (google.maps.geometry.spherical.computeDistanceBetween(p1, p2) / 1000).toFixed(2);
}
//this function generates a info window on the marker passed and creates events as well
function generateInfoWindow(marker,salonObject){
    rating = "";
    if(salonObject.total == null){
        rating = "Not Rated";
    }else{
        rating = (salonObject.total/salonObject.numberOfPeople).toFixed(1)+" out of 5";
    }
    markerInfoWindowContent = "<form action='Appointment.php' method='post'>" +
        "<label class='h4'>" + salonObject.name + "</label><br>" +
        "<input type='hidden' name='salonName' value='" + salonObject.name + "'>" +
        "<label>Address : </label><span>" + salonObject.streetaddress + "," + salonObject.city + "," + salonObject.province + "</span><br>" +
        "<input type='hidden' name='salonAddress' value='" + salonObject.streetaddress+ "," +salonObject.city+ "," +salonObject.province + "'>" +
        "<label>Rating : "+rating+"</label>&nbsp;" +
        "<a href='../MyCutMyTime/viewReviewsHome.php?salonid="+salonObject.id+"' target='_blank'>View Reviews</a><br>"+
        "<label>Distance : </label><span class='btn-success' style='padding: 3px;margin: 3px;'>"+calcDistance(salonMarkers[i].getPosition(),userAddressLatLng)+" &nbsp;KM</span><br>" +
        "<input type='hidden' name='distance' value='"+calcDistance(salonMarkers[i].getPosition(),userAddressLatLng)+"'>" +
        "<input type='hidden' name='salonId' value='" + salonObject.id + "'>" +
        "<input class='btn-success' name='book' type='submit' value='Book With Us'></form>";
    //creating info windo and setting content
    var infowindow = new google.maps.InfoWindow({
        content: markerInfoWindowContent
    });
    trigger = false;
    //showing info window when user mouse overs marker
    marker.addListener('mouseover', function () {
        infowindow.open(map, marker);
        trigger = false;
    });
    // putting a trigger so if user clicked on marker dont use mouseout event

    marker.addListener('click', function () {
        infowindow.open(map,marker);
        trigger = true;
        marker.setAnimation(null);
    });
    marker.addListener('mouseout', function () {
        if (trigger == false) {
            infowindow.close();
        }
    });
    marker.addListener('closeclick',function(){
        trigger = false;
        infowindow.close();
    });
}

