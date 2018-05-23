$(document).ready(function() {
   // Elementos do modelo de objetos do documento - DOM
   DOM = {
      popup: $(".popup"),
      loginOpen: $(".js-login-open"),
      loginClose: $(".js-login-close")
   }

   const bindEvents = function() {
      DOM.loginOpen.click(openLoginPopup);
      DOM.loginClose.click(closeLoginPopup);
   }

   const openLoginPopup = function() {
      DOM.popup.addClass("active");
   }

   const closeLoginPopup = function() {
      DOM.popup.removeClass("active");
   }

   const init = function() {
      bindEvents();
      //Inicia Slider
      simpleslider.getSlider();
   }

   init();
});