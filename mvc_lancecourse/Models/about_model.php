<?php

    /**
     * AboutModel class
     */

    class AboutModel {

        public $message;

        function __construct() {
            $this->message = "Bem vindo ao PHP MVC framework";
        }

        public function nowADays() {
            return $this->message = "hoje em dia todos querem ser um chefe";
        }

    }
