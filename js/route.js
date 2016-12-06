/**
 * Created by damil on 2016-10-11.
 */
var app = angular.module("app", ["ngRoute"]);
app.config(function($routeProvider) {
    $routeProvider
        .when("/home", {
            templateUrl : "SalonWelcome.php",
            controller: 'mainController'
        })

        .when("/addSalon", {
            templateUrl : "AddSalon.php",
            controller: 'mainController'
        })
        .when("/viewSalons", {
            templateUrl : "viewSalons.php",
            controller: 'mainController'
        })

        .when("/listPromotions",{
            templateUrl : "listPromotions.php",
            controller : 'promotionController'

        })
        .when("/addServices",{
            templateUrl : "AddService.php",
            controller : 'aboutController'

        })

        .when("/modifyServices",{
            templateUrl : "ModifyService.php",
            controller : 'aboutController'

        })
        .when("/listServices", {
            templateUrl : "listServices.php",
            controller : 'aboutController'
        });

});

app.controller('mainController', function($scope) {
$scope.addSalon = function (task) {
    $http.post("Required Packages/viewSalons.php").success(function (data) {
        $scope.damil="success";

    })

}
});

app.controller('aboutController',function ($scope) {

});

app.controller('promotionController',function ($scope) {

});

app.controller('addServiceController',function ($scope) {

});