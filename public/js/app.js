const module = (function() {

   DOMElements = {
      // Elementos do modelo de objetos do documento - DOM
      
   }

   const init = function() {
      //Inicia Slider
      simpleslider.getSlider();
   }

   return {
      init
   }
})();

$(document).ready(function() {
   module.init();
});