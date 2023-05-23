<?php 

    namespace app\core;

    /**
     * Class Session
     * 
     * @package app\core
     */

    class Session 
    {

        protected const FLASH_KEY = 'flash_messages'; 

        public function __construct()
        {
            session_start();
            $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
            foreach($flashMessages as $key => &$flashMessage) {
                // Mark to be removed
                $flashMessage['remove'] = true;
            }
            $_SESSION[self::FLASH_KEY] = $flashMessages;

            //var_dump($_SESSION[self::FLASH_KEY]);
        }        

        public function setFlash($key, $message) 
        {
            $_SESSION[SELF::FLASH_KEY][$key] = [
                'remove' => false,
                'value' => $message];
        }

        public function getFlash($key)
        {
            return $_SESSION[SELF::FLASH_KEY][$key]['value'] ?? false;
        }

        public function __destruct()
        {
            // Iterar pelas mensagens marcadas para serem removidas e remover elas...
            $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
            foreach($flashMessages as $key => &$flashMessage) {
                if ($flashMessage['remove']) {
                    unset($flashMessages[$key]);
                }
            }
            $_SESSION[self::FLASH_KEY] = $flashMessages;

        }

    }
