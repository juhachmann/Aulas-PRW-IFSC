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
        public Response $response;

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

        /**
         * Router constructor.
         * 
         * @param \app\core\Request $request
         * @param \app\core\Response $response
        */

        function __construct(Request $request, Response $response) {
            $this->request = $request;
            $this->response = $response;
        }

        public function get($path, $callback) { // lidando com método get
            $this->routes['get'][$path] = $callback; // populando lista de rotas da aplicação
        }

        public function post($path, $callback) { // lidando com método post
            $this->routes['post'][$path] = $callback; // populando lista de rotas da aplicação
        }

        public function resolve() { // resolvendo o que fazer com a requisição específica
            $path = $this->request->getPath();
            $method = $this->request->getMethod();
            $callback = $this->routes[$method][$path] ?? false;
            if (!$callback) {
                $this->response->setStatusCode(404);
                return $this->renderView("_404"); // página não encontrada
            }
            if (is_string($callback)) {
                return $this->renderView($callback); // view simples, sem passar pelo controller
            }
            if (is_array($callback)) {
                Application::$app->setController(new $callback[0]()); // instanciando um objeto da classe controller, para poder acessar seus métodos via callback! E podendo usar o layout definido no controller
                $callback[0] = Application::$app->controller;
            }
            return call_user_func($callback, $this->request, $this->response); // Função interessante do PHP!
        }

        public function renderView($view, $params = []) {
            $layoutContent = $this->layoutContent();
            $viewContent = $this->renderOnlyView($view, $params);
            return str_replace('{{content}}', $viewContent, $layoutContent); // Aqui a mágica dos templates acontece!
        }

        protected function layoutContent() {
            $layout = Application::$app->controller->layout;
            ob_start();
            include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
            return ob_get_clean(); // Isto aqui tem a ver com BUFFER
        }

        protected function renderOnlyView($view, $params) {
            foreach($params as $key => $value) {
                $$key = $value;
            } // aqui estamos passando os parâmetros para a view <3
            ob_start();
            include_once Application::$ROOT_DIR . "/views/$view.php";
            return ob_get_clean(); // manipulando BUFFER
        }

    }