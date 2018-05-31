<?php

namespace Core;

use Core\Session;

class FlashMessage {

   private static $types = ["success", "danger", "info", "alert"];
   
   # Caso $isModal seja setado como true, será renderizado um popup para mensagem
   public static function show($isModal = false) {
      foreach(self::$types as $type) {
         if (isset($_SESSION[$type])) {
            echo $_SESSION[$type];
            unset($_SESSION[$type]);
            return;
         }
      }
   }

}