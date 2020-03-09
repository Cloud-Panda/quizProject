const hero = document.querySelector('.hero');
const slider = document.querySelector('.slider');
const vintag = document.querySelector('#vintage');
const headline = document.querySelector('.headline');

const tl = new TimelineMax();

tl.fromTo(headline, 1 , {height:"0%"}, {height:'80%' ease: power2.easeInOut})
