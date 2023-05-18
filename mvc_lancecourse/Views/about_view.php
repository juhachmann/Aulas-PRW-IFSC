<?php

    class AboutView {

        private $model;
        private $controller;

        function __construct($controller, $model) {
            $this->model = $model;
            $this->controller = $controller;
            echo "About - ";
        }

        public function now() {
            return $this->model->nowADays();
        }

        public function today() {
            return $this->controller->current();
        }



    }
