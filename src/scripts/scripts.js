
whyChooseUsList();
// getUser();
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

// function getUser() {
//   fetch('https://api.calendly.com/users/mattsmithinc33')
//   .then(res => res.json())
//   .then(data => console.log(data))
//   .catch((error) => console.error(error));
// }

function getProfileMedia() {
  const mediaId = 'your-media-id'; // Replace with the actual media ID
  const fields = 'id,caption,media_url,thumbnail_url,permalink'; // Replace with the desired fields
  fetch(`https://graph.instagram.com/me/media?fields=${fields}&access_token=${longToken}`)
  .then(res => res.json())
  .then(data => {posts = data; showMedia(posts);})
  .catch((error) => console.error(error));
}

function showMedia(posts) {
  const feed = document.querySelector('.js-ig-feed');
  let html = "";
  for (let i = 0; i < 8; i++) {
    html += `
      <a class="insta-feed__image-container insta-feed__image-container--${i}" href="${posts.data[i].permalink}">
        <img class="insta-feed__image" src="${posts.data[i].thumbnail_url}" alt="Instagram Post">
        <div class="insta-feed__image-title">
          <img src="./src/icons/instagram.svg" alt="" class="goals-cards__card-image">
          <h3>${posts.data[i].caption}</h3>
        </div>
      </a>
    `;
  }
  feed.innerHTML = html;
}




