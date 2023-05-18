<?php

    namespace app\core;

    /**
     * Class Router
     * 
     * @package app\core
     * 
     */


    class Router {

        public Request $request;

        protected array $routes = []; 
        // aqui fica uma estrutura de métodos, caminhos e callbacks
        /*        
        $routes = array (
            'get' => array (
                'path01' => 'callback01'
                'path02' => 'callback02'
            )
            'post' => array (
                'path01' => 'callback01'
                'path02' => 'callback02'
            )
        ) 
        */        

        function __construct(Request $request) {
            $this->request = $request;
        }

        public function get($path, $callback) {
            $this->routes['get'][$path] = $callback;
        }

        public function resolve() {
            $path = $this->request->getPath();
            $method = $this->request->getMethod();
            $callback = $this->routes[$method][$path] ?? false;
            if (!$callback) {
                Application::$app->response->setStatusCode(404);
                return "Not found";
            }
            if (is_string($callback)) {
                return $this->renderView($callback);
            }
            return call_user_func($callback); // Função interessante do PHP!
        }

        public function renderView($view) {
            $layoutContent = $this->layoutContent();
            $viewContent = $this->renderOnlyView($view);
            return str_replace('{{content}}', $viewContent, $layoutContent);

        }

        protected function layoutContent() {
            ob_start();
            include_once Application::$ROOT_DIR . "/views/layouts/main.php";
            return ob_get_clean();
        }

        protected function renderOnlyView($view) {
            ob_start();
            include_once Application::$ROOT_DIR . "/views/$view.php";
            return ob_get_clean();
        }

    }