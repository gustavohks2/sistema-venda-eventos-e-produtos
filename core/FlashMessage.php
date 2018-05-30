<?php

namespace Core;

use Core\Session;

class FlashMessage {

   private static $types = ["success", "danger", "info", "alert"];

   public static function show() {
      foreach(self::$types as $type) {
         if (isset($_SESSION[$type])) {
            echo $_SESSION[$type];
            unset($_SESSION[$type]);
            return;
         }
      }
   }

}