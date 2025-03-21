$(document).ready(function(){
    // Toggle password visibility
    $('#togglePassword').click(function(){
        var passwordField = $('#password');
        var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
        passwordField.attr('type', type);
        
        // Toggle the eye icon
        $(this).toggleClass('fa-eye fa-eye-slash');
    });

    $('#loginForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/login.php",
            data: $(this).serialize(),
            success: function(response){
                if(response === 'success'){
                    createToast('success', 'Login successful!');
                } else {
                    createToast('error', response);
                }
            }
        });
    });

    function createToast(type, message) {
        var toastContainer = document.querySelector('.toast-container');
        var toast = document.createElement("div");
        toast.classList.add("toast", type);
        toast.innerHTML = '<span>' + message + '</span>' +
                          '<i class="fas fa-times-circle close-icon"></i>';
        toastContainer.appendChild(toast);
        toast.querySelector('.close-icon').addEventListener('click', function(){
            toast.remove();
            if (type === 'success') {
                window.location.href = "sgpa_calculator.html"; // Redirect only on successful login
            }
        });
        setTimeout(function(){
            toast.remove();
            if (type === 'success') {
                window.location.href = "sgpa_calculator.html"; // Redirect after toast timeout
            }
        }, 5000); // Remove toast after 5 seconds
    }
});