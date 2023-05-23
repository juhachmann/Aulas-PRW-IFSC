<?php

    namespace app\core;

    /**
     * Class Application
     * 
     * @package app\core
     */

    class Application {

        public static string $ROOT_DIR;
        public static Application $app; // QUE DIABOS? COMO ASSIM? Ainda não entendo o STATIC
        public Router $router; // lida com tudo que é responsável pelas rotas, isto é, vê a rota e chama o controller e a função necessária para ela
        public Request $request; // request pega path e método da requisição
        public Response $response; // pega e seta código da resposta
        public Controller $controller; // é instanciado no router! 
        public Database $db;
        public Session $session;
        public ?DbModel $user;


        public function __construct($rootPath, array $config) { // inicializa e instancia aqui tudo que é necessário para a aplicação
            self::$ROOT_DIR = $rootPath;
            self::$app = $this;
            $this->request = new Request();
            $this->response = new Response();
            $this->session = new Session();
            $this->router = new Router($this->request, $this->response); // router é responsável por instanciar o controller específico chamado pela requisição
            $this->db = new Database($config['db']); // instancia nova conexão, MAS já abre ela tbm      
        }

        public function setController(Controller $controller) {
            $this->controller = $controller;
        }

        public function run() {
            echo $this->router->resolve(); // run só manda resolver a rota! 
        }

        public function login(DbModel $user) {

        }

    }
