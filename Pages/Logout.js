const logoutButton = document.getElementById('logoutButton');
        if (logoutButton) {
            logoutButton.addEventListener('click', function() {
                // Redirect to logout handler
                window.location.href = '../Pages/Logout.php';
            });
        }