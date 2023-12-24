navToggle();
whyChooseUsList();
// getUser();
getProfileMedia();
centerWhyChooseUs();
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
        <img class="insta-feed__image" src="${posts.data[i].thumbnail_url}" alt="Instagram Post" loading="lazy">
        <div class="insta-feed__image-title">
          <img src="./src/icons/instagram.svg" alt="" class="goals-cards__card-image" loading="lazy">
          <h3>${posts.data[i].caption}</h3>
        </div>
      </a>
    `;
  }
  feed.innerHTML = html;
}

function navToggle() {
  const navToggle = document.querySelector('.js-nav-toggle');
  const navButton = document.querySelector('.js-nav-button');
  const navList = document.querySelector('.js-nav-list');

  navToggle.addEventListener('click', ()=> {
    navButton.classList.toggle('open');
    navList.classList.toggle('show');
  });

  // Close navDrop if clicked outside of navToggle and navDrop
  document.addEventListener("click", function (event) {
    const target = event.target;
    if (target !== navToggle && target !== navButton) {
      navList.classList.remove('show');
      navButton.classList.remove('open');
    }
  });
}

const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'vertical',

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  freeMode: {
    enabled: true,
    sticky: true,
  },
  slidesPerView: 1,
  // centerSlides: true,
  // centerSlideBounds: true,
  // centerInsufficientSlides: true,
  // snapOnRelease: true,
  spaceBetween: 30,
  slidesPerView: 1,
  loop: true,
  effect: 'fade',
  fadeEffect: {
    crossFade: true
  },

  autoplay: {
    delay: 5000,
  },

  // mouseWheel: true,
  // releaseOnEdges: true,
  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});

function centerWhyChooseUs() {
  document.addEventListener('DOMContentLoaded', () => {
    const sections = document.querySelectorAll('.js-section');
    let currentSection = null;

    window.addEventListener('scroll', () => {
      const windowHeight = window.innerHeight;
      const scrollThreshold = windowHeight * 0.3;

      sections.forEach((section) => {
        const rect = section.getBoundingClientRect();

        if (rect.top <= windowHeight - scrollThreshold && rect.bottom >= scrollThreshold) {
          currentSection = section;
        }
      });

      if (currentSection) {
        window.scrollTo({
          top: currentSection.offsetTop,
          behavior: 'snap'
        });
      }
    });
  });
}
