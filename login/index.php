<!DOCTYPE html>
<html lang="en">
  <head></head>
  <body>
    
      <p id="profile"></p>
      <script>
  
        const clientId = '1001525341092798';
        const redirectUri = 'YOUR_REDIRECT_URI';
        const scope = 'user_profile user_media';
        const responseType = 'code';

        const authorizationUrl = `https://api.instagram.com/oauth/authorize?client_id=${clientId}&redirect_uri=${redirectUri}&scope=${scope}&response_type=${responseType}`;


        window.location.href = authorizationUrl;

        // Parse the authorization code from the callback URL
        const urlParams = new URLSearchParams(window.location.search);
        const authorizationCode = urlParams.get('code');

        // Now you can exchange the authorization code for an access token using your server-side code (e.g., Node.js, Python, etc.) and Instagram's API.



      </script>

  </body>
</html>

curl -X POST \
  https://api.instagram.com/oauth/access_token \
  -F client_id=1375792749950870 \
  -F client_secret=7fe44ace13d60e09563127968e6ba7c0 \
  -F grant_type=authorization_code \
  -F redirect_uri=https://wealthbuildersempire.com/ \
  -F code=AQCJFPRHJW0QkJ-b9o0f3LensvdSmKFyRKyeIuh_HBmi5VKBduLdU0UDEibVIcEYwfmhumxys030JN0eNGJ3QtfWZszPkvl7GATyOq1JebDorme9pHTv73On-eJQD3nG1b3KV9coaMnurHJcRcA2s_0oKgZj1XbfscKIBiCT8DgebLa8fplAYZItzaH3YqaSY2cfrTiPH7cGQZLKy6CEsSOMW6gEyl8JxYKD17U29iYklg

https://api.instagram.com/oauth/authorize
  ?client_id=1375792749950870
  &redirect_uri=https://wealthbuildersempire.com/
  &scope=user_profile,user_media
  &response_type=code

  https://wealthbuildersempire.com/?code=AQCJFPRHJW0QkJ-b9o0f3LensvdSmKFyRKyeIuh_HBmi5VKBduLdU0UDEibVIcEYwfmhumxys030JN0eNGJ3QtfWZszPkvl7GATyOq1JebDorme9pHTv73On-eJQD3nG1b3KV9coaMnurHJcRcA2s_0oKgZj1XbfscKIBiCT8DgebLa8fplAYZItzaH3YqaSY2cfrTiPH7cGQZLKy6CEsSOMW6gEyl8JxYKD17U29iYklg#_




  {
    "access_token": "IGQWRPb21IRm5Kc1dpN2FUVlpIbGhTbTNYSjJocUtYcnBQQVN4eFpoLWxSaVBCM2M1ZAHVWUXlaNDVCVW5JclpLRmFBN2xtbUNvSXdfOEQ4THluT2JpRUJYYTJwWF9mS21KLVUzNG1PS09FbWsyU09sbU8tZA3pyWEpLSElzZAWVTYWZAVUQZDZD",
     "user_id": 6454019411361951
  }

  curl -X GET \
  'https://graph.instagram.com/6454019411361951?fields=id,username&access_token=IGQWRPb21IRm5Kc1dpN2FUVlpIbGhTbTNYSjJocUtYcnBQQVN4eFpoLWxSaVBCM2M1ZAHVWUXlaNDVCVW5JclpLRmFBN2xtbUNvSXdfOEQ4THluT2JpRUJYYTJwWF9mS21KLVUzNG1PS09FbWsyU09sbU8tZA3pyWEpLSElzZAWVTYWZAVUQZDZD'


  curl -X GET \
  'https://graph.instagram.com/access_token?grant_type=ig_exchange_token&&client_secret=7fe44ace13d60e09563127968e6ba7c0&access_token=IGQWRPb21IRm5Kc1dpN2FUVlpIbGhTbTNYSjJocUtYcnBQQVN4eFpoLWxSaVBCM2M1ZAHVWUXlaNDVCVW5JclpLRmFBN2xtbUNvSXdfOEQ4THluT2JpRUJYYTJwWF9mS21KLVUzNG1PS09FbWsyU09sbU8tZA3pyWEpLSElzZAWVTYWZAVUQZDZD'


  {"access_token":
    "IGQWROWnRvekxiRVBZAZAHg3QXItR3ZAXXy1ZANklRbnAwaWZA1aWgzNWNFUDF1UGw4dVBPS3FTSm1QVmhWWWwwMmJWTERRUWtVVTdIcU1LRldMTUVFT2F0QVNRUTgyMVZAlcWtzWS02ODVUelJDUQZDZD",
    "token_type":"bearer",
    "expires_in":5184000
  }

  curl -X GET \
  'https://graph.instagram.com/me?fields=id,username&access_token=IGQWROWnRvekxiRVBZAZAHg3QXItR3ZAXXy1ZANklRbnAwaWZA1aWgzNWNFUDF1UGw4dVBPS3FTSm1QVmhWWWwwMmJWTERRUWtVVTdIcU1LRldMTUVFT2F0QVNRUTgyMVZAlcWtzWS02ODVUelJDUQZDZD'