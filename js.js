document.addEventListener("DOMContentLoaded", function (){
const navList=document.querySelector(".navbar-nav");
const navlinks=navList.querySelectorAll(".nav-link");
const monumnetsSection=document.getElementById('examples-section');
const scrollArrow=document.getElementById('scroll');
const arrow=scrollArrow.querySelector('img');

arrow.addEventListener('click',function(){
  monumnetsSection.scrollIntoView({
    behavior:"smooth",

  })
})

navlinks.forEach(link=>{
  link.addEventListener('click',function(e){
    e.preventDefault();
    const target=this.getAttribute('data-info');
    const targetSection=document.getElementById(target);
    if(targetSection){
      targetSection.scrollIntoView({behavior:"smooth"});
      console.log('targetSection',targetSection);
    }
  })
})



})