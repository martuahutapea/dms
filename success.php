<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
    <script>
        // Function to show the success message as an alert and hide it after 3 seconds
        function showAlert(message) {
            var alertDiv = document.createElement('div');
            alertDiv.classList.add('alert', 'alert-success');
            alertDiv.textContent = message;
            document.body.appendChild(alertDiv);
            setTimeout(function() {
                alertDiv.style.display = 'none';
            }, 3000);
        }

        // Show the success message
        showAlert('Password reset link has been sent to your email.');
    </script>
</head>
<body>
    Hi
    
</body>
</html>
