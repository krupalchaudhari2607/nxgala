let menu = document.querySelector('#menu-bars');
let navbar = document.querySelector('.navbar');
let searchIcon = document.querySelector('#search-icon');
let searchForm = document.querySelector('.search-form');
let userbtn = document.querySelector('#user-btn');
let userdetails = document.querySelector('.user-details');

menu.onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    userdetails.classList.remove('active');
    // menu.classList.remove('active');
}
userbtn.onclick = () =>{
    userdetails.classList.toggle('active');
    searchForm.classList.remove('active');
    navbar.classList.remove('active');
    // menu.classList.remove('active');
}

searchIcon.onclick = () =>{
    searchForm.classList.toggle('active');
    navbar.classList.remove('active');
    userdetails.classList.remove('active');
    // searchForm.classList.remove('active');
}
window.onscroll = () =>{
    menu.classList.remove('active');
    navbar.classList.remove('.active');
    searchForm.classList.remove('active');
}
