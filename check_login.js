$(document).ready(function(){
    // Check if the user is logged in via Cloudflare Worker
    $.ajax({
        type: "GET",
        url: "/check_login.php", // Update with your worker URL
        success: function(response){
            if(response === 'not_logged_in'){
                window.location.href = "login.html"; // Redirect to login page
            } else {
                // Your condition to make the body visible
                var condition = true; // Change this to your specific condition

                // Get the body element
                var body = document.querySelector('body');

                // Check the condition
                if (condition) {
                    body.style.display = "block"; // Or any other display style you want
                } else {
                    body.style.display = "none";
                }
            }
        },
        error: function(){
            console.error("An error occurred while checking login status.");
        }
    });
});