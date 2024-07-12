let navbar = document.querySelector('.header .navbar');
let accountBox = document.querySelector('.header .account-box');
document.querySelector('#menu-btn').onclick = () => { // Code to execute when the element with ID "menu-btn" is clicked
   navbar.classList.toggle('active'); //If the navbar element already has the "active" class, it will be removed; if it doesn't have the "active" class, it will be added.
   accountBox.classList.remove('active'); // Removes the "active" class from the accountBox element
}

document.querySelector('#user-btn').onclick = () =>{
   accountBox.classList.toggle('active');
   navbar.classList.remove('active');
}

window.onscroll = () =>{
   navbar.classList.remove('active');
   accountBox.classList.remove('active');
}

document.querySelector('#close-update').onclick = () =>{
   document.querySelector('.edit-product-form').style.display = 'none';
   window.location.href = 'admin_products.php';
}