<?php

  function refreshLongToken($longToken) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token=" . $longToken);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($ch);

    if (curl_errno($ch)) {
      echo 'Error' . curl_error($ch);
    }

    curl_close($ch);

    return json_decode($output, true);
  }

  $newlongToken = refreshLongToken($longToken);
?>