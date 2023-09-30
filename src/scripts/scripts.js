whyChooseUsList();
getUser();

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


