window.addEventListener("scroll", function () {
  var ViewData = document.querySelector(".submittion");
  var ScrollData = document.querySelector(".text");
  ViewData.style.transform = "translateY(" + window.pageYOffset + "px)";
  ScrollData.style.transform = "translateY(" + window.pageYOffset + "px)";
});
