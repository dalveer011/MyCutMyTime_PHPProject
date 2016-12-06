/**
 * Created by DALVEERSINGH on 10/10/2016.
 */
// carousel opening
$('.carousel').carousel();
// opening a window when user clicks signup
$('#btnSignUp').click(function () {
    $('#loginModal').modal('show');
});


//checking if entered password and confirm password are same
function checkingResetPassword() {
    if ($("#password").val() != $("#confirmPassword").val()) {
        $("#errorConfirmingPassword").html("<p style='color: red'>confirm password not same as new password</p>")
        return false;
    } else {
        return true;
    }
}
