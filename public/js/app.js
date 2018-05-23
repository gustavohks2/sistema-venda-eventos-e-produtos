$(document).ready(function() {
   // Elementos do modelo de objetos do documento - DOM
   popupOpen = false;

   DOM = {
      popup: $(".popup"),
      loginOpen: $(".js-login-open"),
      loginClose: $(".js-login-close")
   }

   const bindEvents = function() {
      DOM.loginOpen.click(openLoginPopup);
      DOM.loginClose.click(closeLoginPopup);
      $(document).on("keyup", closeLoginPopupKeyboard);
   }

   const openLoginPopup = function() {
      popupOpen = true;
      DOM.popup.addClass("active");
   }

   const closeLoginPopup = function() {
      popupOpen = false;
      DOM.popup.removeClass("active");
   }

   const closeLoginPopupKeyboard = function(e) {
      if (popupOpen) {
         if ((e.which || e.keyCode) == 27) {
            popupOpen = false;
            DOM.popup.removeClass("active");
         }
      }
   }

   const init = function() {
      bindEvents();
      //Inicia Slider
      simpleslider.getSlider();
   }

   init();
});