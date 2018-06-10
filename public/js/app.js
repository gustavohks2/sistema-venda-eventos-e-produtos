$(document).ready(function() {
   popupOpen = false;
   // Elementos do modelo de objetos do documento - DOM
   DOM = {
      popup: $(".popup"),
      alertBox: $(".js-alert-box"),
      loginOpen: $(".js-login-open"),
      loginForm : $(".js-login-form"),
      loginClose: $(".js-login-close"),
      formMessage : $(".js-login-form-message"),
      alertCloseButton: $(".js-alert-close-button"),
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
      DOM.alertCloseButton.on("click", closeAlertBox)
      $(document).on("keyup", closeLoginPopupKeyboard);

      setTimeout(hideAlert, 4000);
   }

   const bindMasks = function() {
      DOM.inputs.CEP.mask("00000-000");
      DOM.inputs.CPF.mask("000.000.000-00");
      DOM.inputs.telefone.mask("(00) 0000-0000");
   }

   const hideAlert = function() { DOM.alertBox.hide(); }

   const closeAlertBox = function() {
      $(this).parent().hide().delay(100).remove();
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

   const safeJSONParse = function(data) {
      try {
         return $.parseJSON(data);
      } catch(e) {
         console.log("Erro na conversão para o formato JSON: " + e);
      }
      return false;
   }

   const handleFormData = function(e) {
      e.preventDefault();

      $.ajax({
         type: "POST",
         url: "/login/verificar",
         data: $(this).serialize(),
         success: function(data) { 
            const parsedData = safeJSONParse(data);
            
            if (parsedData !== false && parsedData !== null) logUser(parsedData);
            else showMessage("Erro ao logar! Tente novamente mais tarde!");
         },
         error: function(jqXhr, textStatus, errorThrown) { showMessage("Erro: Não foi possível fazer login!") }
      });
   }

   const logUser = function(login) {
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