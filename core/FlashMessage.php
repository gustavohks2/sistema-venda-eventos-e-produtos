<?php

namespace Core;

use Core\Session;

class FlashMessage {

   private static $types = ["success", "danger", "info", "alert"];

   public static function getInstance() {
      return self;
   }
   
   # Caso $isModal seja setado como true, será renderizado um popup para mensagem
   public static function show($isModal = false) {
      $session = Session::getInstance();
      foreach(self::$types as $type) {
         if (isset($session->{"$type"})) {
            echo $session->{"$type"};
            unset($session->{"$type"});
            return;
         }
      }
   }

}