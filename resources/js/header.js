"use strict";

let menuBtn = document.querySelector('.menu-btn');
let menu = document.querySelector('.menu');

// menu-btn.addEventListener('click', mobileMenu);
// function mobileMenu() {
//     menu-btn.classList.toggle('active');
//     .menu'.classList.toggle('active');
// }

//Упрощенный вариант


menuBtn.addEventListener('click', function () {
    menuBtn.classList.toggle('active');
    menu.classList.toggle('active');
})

const navLink = document.querySelectorAll('.menu_li');

navLink.forEach(n => n.addEventListener('click', function () {
    menuBtn.classList.remove('active');
    menu.classList.remove('active');
}))
