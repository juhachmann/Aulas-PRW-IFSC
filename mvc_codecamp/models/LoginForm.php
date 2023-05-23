<?php

    namespace app\models;

    use app\core\Application;
    use app\core\Model;
    use app\models\User;

    /**
     * Class LoginForm
     * 
     * @package \app\core\models
     */

    class LoginForm extends Model
    {

        public string $email = '';
        public string $password = '';

        public function __construct()
        {
            
        }

        public function rules() : array 
        {
            return [
                    'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
                    'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 3]],
                ]; // tem que ver se tá tudo certo...
        }

        public function login() 
        {
            $user = User::findOne(['email' => $this->email]);
            if (!$user) {
                $this->addError('email', "User does not exist with this email");
                return false;
            }
            if (!password_verify($this->password, $user->password)) {
                $this->addError('password', "The password is wrong!");
                return false;
            }
            //var_dump($user);
            return Application::$app->login($user);
        }

        public function labels() : array 
        {
            return [
                'email' => 'meu email',
                'password' => 'senha',
            ];
        }

    }