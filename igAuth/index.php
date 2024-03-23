<?php
  require 'igAuth/igAuth.php';

  getAccessToken();
?>

<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Access Token</title>
</head>
<body>
    <button id="getAccessTokenBtn">Get Access Token</button>

    <script>
        document.getElementById('getAccessTokenBtn').addEventListener('click', function() {
            // Make AJAX request to backend
            fetch('/getAccessToken.php')
                .then(response => response.json())
                .then(data => {
                    console.log(data); // Handle response data accordingly
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
</body>
</html>
