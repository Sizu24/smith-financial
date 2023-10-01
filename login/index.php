<!DOCTYPE html>
<html lang="en">
  <head></head>
  <body>
  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0&appId=267770262794160" nonce="s5pZWOs9"></script>

    <h2>Add Facebook Login to your webpage</h2>

      <!-- Set the element id for the JSON response -->
    
      <p id="profile"></p>
      <div class="fb-login-button" data-width="72px" data-size="" data-button-type="" data-layout="" data-auto-logout-link="false" data-use-continue-as="false"></div>

      <script>
  
        (function(d, s, id){
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) {return;}
          js = d.createElement(s); js.id = id;
          js.src = "https://connect.facebook.net/en_US/sdk.js";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk')
        );


        window.fbAsyncInit = function() {
            FB.init({
              appId            : '267770262794160',
              xfbml            : true,
              version          : 'v18.0'
            });
            FB.login(function(response) {
              if (response.authResponse) {
                console.log('Welcome!  Fetching your information.... ');
                FB.api('/me', {fields: 'name, email'}, function(response) {
                    document.getElementById("profile").innerHTML = "Good to see you, " + response.name + ". I see your email address is " + response.email
                });
              } else { 
                console.log('User cancelled login or did not fully authorize.'); }
            });
        };

      </script>

  </body>
</html>