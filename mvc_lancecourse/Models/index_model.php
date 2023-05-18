<?php

    /**
     * O modelo da página inicial
     */

    class IndexModel {

        private $message = 'Welcome to the Home Page!';

        function __construct() {

        }

        public function welcomeMessage() {
            return $this->message;
        }

    }