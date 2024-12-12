// script.js
function filterContacts() {
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    const contactItems = document.querySelectorAll('.contact-item');
  
    contactItems.forEach((item) => {
      const name = item.querySelector('.contact-name').textContent.toLowerCase();
      if (name.includes(searchInput)) {
        item.style.display = 'flex'; 
      } else {
        item.style.display = 'none'; 
    });
  }
