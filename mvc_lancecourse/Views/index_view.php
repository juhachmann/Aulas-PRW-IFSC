<?php

    /**
     * O view da Home Page
     */

    class IndexView {

        private $model;
        private $controller;

        function __construct($controller, $model) {
            $this->model = $model;
            $this->controller = $controller;
            echo "Home - ";
        }

        public function index() {
            return $this->controller->sayWelcome();
        }

        public function action() {
            return $this->controller->takeAction();
        }

    }