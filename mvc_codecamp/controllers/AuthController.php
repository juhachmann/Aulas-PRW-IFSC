<?php

    namespace app\controllers;

    use app\core\Application;
    use app\core\Controller;
    use app\models\LoginForm;
    use app\core\Request;
use app\core\Response;
use app\models\User;

    /**
     * Class AuthController.
     * 
     * @package app\controllers
     */

    class AuthController extends Controller {

        public function login(Request $request, Response $response) {
            $this->setLayout('auth');
            $loginForm = new LoginForm();
            if ($request->isPost()) {
                $loginForm->loadData($request->getBody());
                
                if($loginForm->validate($loginForm->rules()) && $loginForm->login()) {
                    Application::$app->session->setFlash('success', "You're logged in");
                    $response->redirect('/');
                    return;
                }
            }
            return $this->render(
                'login', [
                    'model' => $loginForm,
                ]);
        }

        public function register(Request $request) {
            $this->setLayout('auth');
            $user = new User();

            if ($request->isPost()) {

                $user->loadData($request->getBody());
                
                if($user->validate($user->rules()) && $user->save()) {
                    Application::$app->session->setFlash('success', 'Thanks for registering');
                    Application::$app->response->redirect('/');
                    //exit;
                }

            }

            return $this->render('register', [
                'model' => $user
            ]);
        }
        
    }