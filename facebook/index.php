<!DOCTYPE html>
<html lang="en">
  <head></head>
  <body>
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0&appId=267770262794160" nonce="18wa1EOv"></script>
    <h2>Add Facebook Login to your webpage</h2>
    

      <!-- Set the element id for the JSON response -->
  
      <p id="profile">

      </p>
      <div class="fb-login-button" data-width="32px" data-size="" data-button-type="" data-layout="" data-auto-logout-link="false" data-use-continue-as="true"></div>

      <script>
  
        //Add the Facebook SDK for Javascript

        window.fbAsyncInit = function() {
            // Initialize the SDK with your app and the Graph API version for your app 
            FB.init({
              appId      : '{267770262794160}',
              cookie     : true,
              xfbml      : true,
              version    : 'v18.0'
            });
            // If you are logged in, automatically get your name and email adress, your public profile information
            FB.login(function(response) {
              if (response.authResponse) {
                console.log('Welcome!  Fetching your information.... ');
                FB.api('/me', {fields: 'name, email'}, function(response) {
                    document.getElementById("profile").innerHTML = "Good to see you, " + response.name + ". I see your email address is " + response.email
                });
              } else { 
                    // If you are not logged in, the login dialog will open for you to login asking for permission to get your public profile and email
                    console.log('User cancelled login or did not fully authorize.'); }
            });

            (function(d, s, id){
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) {return;}
              js = d.createElement(s); js.id = id;
              js.src = "https://connect.facebook.net/en_US/sdk.js";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

            FB.getLoginStatus(function(response) {
              if (response.status === 'connected') {
                var accessToken = response.authResponse.accessToken;
              } 
            } );
        };

      </script>

  </body>
</html>