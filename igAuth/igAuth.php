<?php 

$accessToken = "";
$shortToken = "";
$longToken = "";

  function getAccessToken() {
  /**
   * Get Access Token
   * Required Values:
   * Cliend Id
   * Redirect URI
   * Scope: user_profile,user_media
   */


   $client_id = getenv('CLIENT_ID');
   $ch = curl_init();

   curl_setopt($ch, CURLOPT_URL, 'https://api.instagram.com/oauth/authorize?client_id=' . $client_id . '&redirect_uri=https://wealthbuildersempire.com/&scope=user_profile,user_media&response_type=code');
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
   $output = curl_exec($ch);
 
   if (curl_errno($ch)) {
     echo 'Error:' . curl_error($ch);
   }
 
   curl_close($ch);

   return json_decode($output, true);
  }

  $accessToken = getAccessToken();
  echo $accessToken;

  /**
   * Get Short Token to get Long Token
   * Required Values:
   * Cliend Id
   * Client Secret
   * Redirect URI
   * Access Code from above function
   */
  function getShortToken($accessToken) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.instagram.com/oauth/access_token');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'client_id' => '1375792749950870',
        'client_secret' => '7fe44ace13d60e09563127968e6ba7c0',
        'grant_type' => 'authorization_code',
        'redirect_uri' => 'https://wealthbuildersempire.com/',
        'code' => $accessToken
    ]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }

    curl_close($ch);

    return json_decode($output, true);
  }

  if ($accessToken) {
    $shortToken = getShortToken($accessToken);
    echo $shortToken['access-token'];
  }

  /**
   * Get Long Token
   * Required Values:
   * Client Secret
   * Short Lived Token from above function
   */
  function getLongToken($shortToken) {
    $ch = curl_init();
    $clientSecret = getenv('APP_SECRET');

    curl_setopt($ch, CURLOPT_URL, 'https://graph.instagram.com/access_token?grant_type=ig_exchange_token&client_secret=' . $clientSecret . '&access_token=' . $shortToken);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($ch);

    if (curl_errno($ch)) {
      echo 'Error' . curl_error($ch);
    }

    return json_decode($output, true);
  }

  if ($shortToken) {
    $longToken = getLongToken($shortToken);
    echo $longToken['access_token'];
  }
?>

<button>Get Access Token</button>
