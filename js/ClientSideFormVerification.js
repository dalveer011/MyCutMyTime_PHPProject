/**
 * Created by damil on 2016-11-04.
 */

function validate() {

    var phoneregex1 ='/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/';
    var phoneregex = '[1-9][0-9][0-9][-][0-9][0-9][0-9][-][0-9][0-9][0-9][0-9]';
    var postalcoderegex = '[ABCEGHJKLMNPRSTVXY][0-9][ABCEGHJKLMNPRSTVWXYZ][0-9][ABCEGHJKLMNPRSTVWXYZ][0-9]';
    var check = true;

    if(check) {
        if (document.getElementById("name").value == "") {
            document.getElementById("nameErr").innerHTML = "Salon name cannot be empty";
            check = false;
        }
        if (document.getElementById("email").value == "") {
            document.getElementById("emailErr").innerHTML = "Email cannot be empty";
            check = false;
        }
        if (document.getElementById("phone").value == "") {
            document.getElementById("phoneErr").innerHTML = "phone cannot be empty";
            check = false;
        }
        if (!document.getElementById("phone").value.match(phoneregex)){
            document.getElementById("phoneErr").innerHTML = "Phone format has to be ###-###-####";
            check = false;
        }

        if (document.getElementById("city").value == "") {
            document.getElementById("cityErr").innerHTML = "City cannot be empty";
            check = false;
        }
        if (document.getElementById("postalCode").value == "") {
            document.getElementById("postalCodeErr").innerHTML = "phone name cannot be empty";
            check = false;
        }
        if (!document.getElementById("postalCode").value.match(postalcoderegex)) {
            document.getElementById("postalCodeErr").innerHTML = "Not a correct postal code format";
            check = false;
        }

        // var email = document.getElementById('email');
        // var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        //
        // if (!filter.test(email.value)) {
        //     document.getElementById("emailErr").innerHTML="invalid email format";
        //     check = false;
        // }
    }
    return check;
}

function validateServices() {

    var check = true;

    if(check)
    {
        if (document.getElementById("description").value == "") {
            document.getElementById("descErr").innerHTML = "Umm ! name your service ";
            check = false;
        }
        if (document.getElementById("price").value == "") {
            document.getElementById("priceErr").innerHTML = "please enter a price";
            check = false;
        }
        if (document.getElementById("duration").value == "") {
            document.getElementById("durationErr").innerHTML = "phone name cannot be empty";
            check = false;
        }

        return check;

    }
}