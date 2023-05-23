<?php 

    namespace app\core;

    /**
     * Class Controller
     * 
     * @package app\core
     */

    class Controller { // classe mãe de todos os controllers, dá as funções básicas deles

        public string $layout = 'main';

        public function setLayout($layout) {
            $this->layout = $layout;
        }


        public function render($view, $params = []) { // função render disponível de forma "simplificada" para todos os controllers por aqui
            return Application::$app->router->renderView($view, $params);
        }

    }
