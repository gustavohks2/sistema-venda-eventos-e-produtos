<?php

namespace Core;

use Core\Session;

class FlashMessage {

   private static $types = ["success", "danger", "info", "warning"];

   public static function getInstance() {
      return self;
   }
   
   # Caso $isModal seja setado como true, será renderizado um popup para mensagem
   public static function show(bool $isModal = false, bool $hasYesNoOptions = false) {
      if (gettype($isModal) !== "boolean") 
         throw new Exception("O argumento \$isModal deve ser do tipo lógico booleano.");
      if (gettype($hasYesNoOptions) !== "boolean") 
         throw new Exception("O argumento \$hasYesNoOptions deve ser do tipo lógico booleano.");

      $session = Session::getInstance();
      foreach(self::$types as $type) {
         if (isset($session->{"$type"})) {

            $yesNoOptions = $hasYesNoOptions ? 
            '<div class="alert-box__yesorno-buttons">
               <button class="alert-box__button">Sim</button>
               <button class="alert-box__button">Não</button>
            </div>' : '';

            if ($isModal) {
               echo '<div class="alert-box alert-box--' . $type . ' flipInX js-alert-box">
                        <span class="alert-box__close-button js-alert-close-button"></span>
                        <div class="alert-box__message">
                           <span class="alert-box__icon"></span>
                           <p class="alert-box__text">' . $session->{"$type"} . '</p>
                        </div>' .
                           $yesNoOptions .'
                     </div>' . "\n";
            } else {
               echo $session->{"$type"};
            }
            
            unset($session->{"$type"});
            return;
         }
      }
   }

}