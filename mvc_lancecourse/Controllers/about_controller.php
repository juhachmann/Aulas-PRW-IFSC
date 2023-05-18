<?php

    /**
     * Controller do About
     */

    class AboutController {

        private $model;

        function __construct($model) {
            $this->model = $model;
        }

        public function current() {
            return $this->model->message = "About us changed by the controller";
        }


    }