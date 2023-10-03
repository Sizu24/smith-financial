whyChooseUsList();
getUser();
getProfileMedia();
let posts;

function whyChooseUsList() {
  const listItems = document.querySelectorAll('.js-wcu-list');
  const images = document.querySelectorAll('.js-wcu-image');
  let index = 0;

  setInterval(() => {
    listItems[index].classList.remove('selected');
    images[index].classList.remove('selected');

    index = (index + 1) % listItems.length;

    listItems[index].classList.add('selected');
    images[index].classList.add('selected');
  }, 15000);
}

function getUser() {
  fetch('https://api.calendly.com/users/mattsmithinc33')
  .then(res => res.json())
  .then(data => console.log(data))
  .catch((error) => console.error(error));
}

function getProfileMedia() {
  const mediaId = 'your-media-id'; // Replace with the actual media ID
  const fields = 'id,caption,media_url,thumbnail_url,permalink'; // Replace with the desired fields
  const accessToken = 'IGQWROWnRvekxiRVBZAZAHg3QXItR3ZAXXy1ZANklRbnAwaWZA1aWgzNWNFUDF1UGw4dVBPS3FTSm1QVmhWWWwwMmJWTERRUWtVVTdIcU1LRldMTUVFT2F0QVNRUTgyMVZAlcWtzWS02ODVUelJDUQZDZD'; // Replace with your access token
  fetch(`https://graph.instagram.com/me/media?fields=${fields}&access_token=${accessToken}`)
  .then(res => res.json())
  .then(data => {posts = data; showMedia(posts);})
  .catch((error) => console.error(error));
}

function showMedia(posts) {
  const feed = document.querySelector('.js-ig-feed');
  let html = "";
  for (let i = 0; i < 9; i++) {
    html += `
      <div class="insta-feed__post">
        <a href="${posts.data[i].permalink}" target="_blank">
          <img src="${posts.data[i].thumbnail_url}" alt="Instagram Post">
        </a>
      </div>
    `;
  }
  feed.innerHTML = html;
  console.log(html);
  console.log(posts.data[0].thumbnail_url);
}




