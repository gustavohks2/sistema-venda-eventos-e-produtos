$(document).ready(function() {
   popupOpen = false;
   // Elementos do modelo de objetos do documento - DOM
   DOM = {
      popup: $(".popup"),
      loginOpen: $(".js-login-open"),
      loginForm : $(".js-login-form"),
      loginClose: $(".js-login-close"),
      formMessage : $(".js-login-form-message"),
      inputs: {
         user: $(".js-input-user"),
         password: $(".js-input-psw"),
         CEP: $("[data-input='CEP']"),
         CPF: $("[data-input='CPF']"),
         telefone: $("[data-input='telefone']")
      }
   }

   const bindEvents = function() {
      DOM.loginForm.on("submit", handleFormData);
      DOM.loginOpen.on("click", openLoginPopup);
      DOM.loginClose.on("click", closeLoginPopup);
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

   const handleFormData = function(e) {
      e.preventDefault();

      $.ajax({
         type: "POST",
         url: "/login/verificar",
         data: $(this).serialize(),
         success: function(data) { handleUserLogin($.parseJSON(data)); },
         error: function(jqXhr, textStatus, errorThrown) { showMessage("Erro: Não foi possível fazer login!") }
      });
   }

   const handleUserLogin = function(login) {
      DOM.formMessage.text("");

      if (!login.success) 
         showMessage(login.message ? login.message : "");

      if (parseInt(login.nivel) === 1) location.reload();
      else if (parseInt(login.nivel) === 2) location.href = "/admin";
   }

   const showMessage = function(message) {
      DOM.formMessage.text(message);
      DOM.formMessage.addClass("shake");
      setTimeout(function() { DOM.formMessage.removeClass("shake"); }, 310);
   }

   const init = function() {
      bindEvents();
      bindMasks();
      //Inicia Slider
      simpleslider.getSlider();
   }

   init();
});