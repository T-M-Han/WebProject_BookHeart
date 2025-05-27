// Wait for the DOM content to be fully loaded before executing JavaScript
document.addEventListener("DOMContentLoaded", function () {
    // Add an event listener to show the sign-up form and hide the sign-in form
    document.getElementById("showSignup").addEventListener("click", function () {
        // Hide the sign-in form
        document.querySelector(".signin").style.display = "none";
        // Show the sign-up form
        document.querySelector(".signup").style.display = "block";
    });

    // Add an event listener to show the sign-in form and hide the sign-up form
    document.getElementById("showSignIn").addEventListener("click", function () {
        // Hide the sign-up form
        document.querySelector(".signup").style.display = "none";
        // Show the sign-in form
        document.querySelector(".signin").style.display = "block";
    });
});
