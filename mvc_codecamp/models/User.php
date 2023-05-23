<?php

    namespace app\models;

use app\core\Application;
use app\core\DbModel;
use AppendIterator;

    /**
     * Class RegisterModel
     * 
     * @package app\models
     */

    class User extends DbModel {

        const STATUS_INACTIVE = 0;
        const STATUS_ACTIVE = 1;
        const STATUS_DELETED = 2;

        public String $firstname = '';
        public String $lastname = '';
        public String $email = '';
        public String $password = '';
        public String $passwordConfirm = '';
        public int $status = self::STATUS_INACTIVE;


        public function attributes() : array 
        {
            return [
                'firstname', 
                'lastname', 
                'email', 
                'password',
                'status'
            ];
        }

        public static function tableName() : string 
        {
            return 'users';
        }

        public function bind($stmt, ) 
        {
            return $stmt->bind_param(
                'ssssi', 
                $this->firstname, // string
                $this->lastname, // string
                $this->email, // string
                $this->password, //string
                $this->status); // int
            // não consegui fazer isso automaticamente, fala sério...
        }


        public function rules() : array {
            return [
                'firstname' => [self::RULE_REQUIRED],
                'lastname' => [self::RULE_REQUIRED],
                'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
                'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 3]],
                'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
            ];
        }

        public function save() {
            $this->status = self::STATUS_ACTIVE;
            $this->password = password_hash($this->password, PASSWORD_ARGON2I);
            return parent::save(); // chamando o método save do DbModel (pai do User)
        }

        public function labels() : array 
        {
            return [
                'firstname' => 'nome',
                'lastname' => 'sobrenome',
                'email' => 'email',
                'password' => 'senha',
                'passwordConfirm' => "confirmar senha",
            ];
        }
        

    }