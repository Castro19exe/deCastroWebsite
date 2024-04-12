/* Menu Responsive */
function myFunction() {
  var x = document.getElementById("Menu");
  if (x.className === "menu") {
    x.className += " responsive";
  } else {
    x.className = "menu";
  }
}

/* Go Top */
var mybutton = document.getElementById("backTop");
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() { scrollFunction() };
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

// Show the warning

//document.getElementsByClassName("produtos").addEventListener("click", noYetDone);
function noYetDone() {
  var x = document.getElementById("warning");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

/* Slide Show */
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
}

/* teste */
function contezt() {
  document.getElementById("login-contentz").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
  if (!event.target.matches('.img-account')) {
      var dropdowns = document.getElementsByClassName("login-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
      }
      }
  }
}
