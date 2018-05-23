$(document).ready(function() {
   // Elementos do modelo de objetos do documento - DOM
   popupOpen = false;

   DOM = {
      popup: $(".popup"),
      loginOpen: $(".js-login-open"),
      loginClose: $(".js-login-close"),
      inputs: {
         CEP: $("[data-input='CEP']"),
         CPF: $("[data-input='CPF']"),
         telefone: $("[data-input='telefone']")
      }
   }

   const bindEvents = function() {
      DOM.loginOpen.click(openLoginPopup);
      DOM.loginClose.click(closeLoginPopup);
      $(document).on("keyup", closeLoginPopupKeyboard);
   }

   const bindMasks = function() {
      DOM.inputs.CEP.mask("00000-000");
      DOM.inputs.CPF.mask("000.000.000-00");
      DOM.inputs.telefone.mask("(00) 0000-0000");
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
      bindMasks();
      //Inicia Slider
      simpleslider.getSlider();
   }

   init();
});