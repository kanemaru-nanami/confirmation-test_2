const contactForm = document.forms.contact;
contactForm.postcode.addEventListener('input', e => {
  fetch(`https://zipcloud.ibsnet.co.jp/api/search?zipcode=${e.target.value}`)
    .then(response => response.json())
    .then(data => {
      console.log(e.target.value);
      contactForm.prefecture.value = data.results[0].address1;
      contactForm.city.value = data.results[0].address2;
      contactForm.town.value = data.results[0].address3;
    })
    .catch(error => console.log(error))
})