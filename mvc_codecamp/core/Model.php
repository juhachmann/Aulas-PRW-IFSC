<?php

    namespace app\core;

    /**
     * Class Model
     * 
     * @package app\core
     */

    abstract class Model 
    {

        public const RULE_REQUIRED = 'required';
        public const RULE_EMAIL = 'email';
        public const RULE_MIN = 'min';
        public const RULE_MAX = 'max';
        public const RULE_MATCH = 'match'; 
        public const RULE_UNIQUE = 'unique';
        // Não tenho certeza de que estou entendendo o que está acontecendo aqui...


        public array $errors = [];


        public function loadData($data) 
        {
            foreach ($data as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->{$key} = $value; // SINTAXE diferente aqui!!!  Sanitizar! Acho que não está funcionando...
                }
            }
        }

        abstract public function rules() : array;
        // Cada model vai ter suas regras de validação...
        // Esta classe abstrata Model vai apenas pegar cada uma das regras e aplicar elas usando validate()

        public function labels() : array 
        {
            return [];
        }

        public function getLabel($attribute) 
        {
            return $this->labels()[$attribute] ?? $attribute;
        }

        public function validate(array $arrayRules)  // CARAIO... isso ficou complexo, acho que dava de simplificar...
        { // Tá... preciso fazer uns var_dump() pra acompanhar tudo o que tá acontecendo aqui...
          
            // Basicamente
            // Cuidar quando a regra tem ou não tem parâmetros!

            // echo "Lista de rules() do modelo específico";
            // var_dump($this->rules()); // Lista com as regras do Modelo que está sendo chamado (no caso, aqui é o RegisterModel)
            // array (size=5)
            // 'firstname' => 
            //   array (size=1)
            //     0 => string 'required' (length=8)
            // 'lastname' => 
            //   array (size=1)
            //     0 => string 'required' (length=8)
            // 'email' => 
            //   array (size=2)
            //     0 => string 'required' (length=8)
            //     1 => string 'email' (length=5)
            // 'password' => 
            //   array (size=2)
            //     0 => string 'required' (length=8) // nome regra sem param
            //     1 => 
            //       array (size=2)
            //         0 => string 'min' (length=3) // nome regra com param
            //         'min' => int 8  // param
            // 'passwordConfirm' => 
            //   array (size=2)
            //     0 => string 'required' (length=8)
            //     1 => 
            //       array (size=2)
            //         0 => string 'match' (length=5)
            //         'match' => string 'password' (length=8)

            foreach ($arrayRules as $attribute => $rules) {

                // echo "1. atributo";
                // var_dump($attribute); // 'firstname'
                // echo "2. regras do atributo";
                // var_dump($rules); // 0 => 'required' (isto é self::RULE_REQUIRED)

                // chama o valor do atributo que veio do post, pois é ele que queremos validar
                $value = $this->{$attribute}; // Aqui tá pegando lá de fora, lá dos atributos do model, não tem nada a ver com a lista de rules()
                // valor do atributo atribuído ao modelo


                foreach($rules as $rule) {
                    // cada regra do atributo
                
                    $ruleName = $rule;
                
                    if (!is_string($ruleName)) { // se não é string, é pq é uma regra com parâmetro.. Tem que pegar o nome da regra e depois o param
                        $ruleName = $rule[0];
                        // echo "2.1.1 Regra não é string... imprime rule[0]:";
                        // var_dump($ruleName); // Show, aqui é o índice da regra... 
//                         array (size=2)
//                          0 => string 'min' (length=3)  rule[0] sempre vai dar o nome da regra que tem um parâmetro...
//                          'min' => int 8
                    }
                
                    if ($ruleName === self::RULE_REQUIRED && !$value) {
                        $this->addErrorForRule($attribute, self::RULE_REQUIRED);
                    }
                
                    if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $this->addErrorForRule($attribute, self::RULE_EMAIL);
                    }
                    
                    if ($ruleName === self::RULE_MIN && (strlen($value) < $rule['min'])) { // $rule[x] pega o parâmetro da regra!
                        $this->addErrorForRule($attribute, self::RULE_MIN, $rule); // aqui tá passando atributo, nome da regra, e parâmetros!
                    }

                    if ($ruleName === self::RULE_MAX && (strlen($value) > $rule['max'])) {
                        $this->addErrorForRule($attribute, self::RULE_MAX, $rule); // falta
                    }

                    if ($ruleName === self::RULE_MATCH && ($value != $this->{$rule['match']})) {
                        $rule['match'] = $this->getLabel($rule['match']);
                        //var_dump($this->{$rule['match']}); // no caso $this->password; 
                        $this->addErrorForRule($attribute, self::RULE_MATCH, $rule); // arrumar
                    }

                    if ($ruleName === self::RULE_UNIQUE) {
                        $className = $rule['class'];
                        $uniqueAttr = $rule['attribute'] ?? $attribute;
                        $tableName = $className::tableName();
                        $db = Application::$app->db;
                        $statement = $db->prepare("SELECT * FROM $tableName WHERE $uniqueAttr = :$uniqueAttr");
                        $statement->bindValue(":$uniqueAttr", $value);
                        $statement->execute();
                        $record = $statement->fetchObject();
                        if ($record) {
                            $this->addErrorForRule($attribute, self::RULE_UNIQUE);
                        }
                    }

                }

            }

            return empty($this->errors); // retorna true ou false 
        }


        private function addErrorForRule(string $attribute, string $rule, $params = []) 
        {
            // aqui eu não gostei... tipo, pra cada mensagem de erro 
            // tem que chamar o método errorMessage e retornar uma lista...
            // Não sei, acho que não é o melhor... acho que é melhor só a lista já existir como um atributo
            // e a gente só acessar se existir...

            $message = $this->errorMessages()[$rule] ?? '';
            foreach($params as $key => $value) {// Caso tenha parametros...
                // vai iterar primeiro pelo nome da regra
                // 0 => 'min'
                // não vai encontrar nada para substituir
                // Aí vai iterar pelo primeiro parâmetro válido
                // 'min' => 8
                // vai substituir {min} por 8
                // e vai iterar por outros parâmetros se houver
                $message = str_replace("{{$key}}", $value, $message);
            }

            $this->errors[$attribute][] = $message;

        }

        public function addError(string $attribute, string $message) 
        {
            $this->errors[$attribute][] = $message;
        }



        public function errorMessages() 
        {
            return [
                self::RULE_REQUIRED => 'This field is required',
                self::RULE_EMAIL => 'This field must be a valid email address',
                self::RULE_MIN => 'Min length of this field must be {min}',
                self::RULE_MAX => 'Max length of this field must be {max}',
                self::RULE_MATCH => 'This field must be the same as {match}',
                self::RULE_UNIQUE => 'Record with this {field} already exists!',
            ];
        }

        public function hasError(string $attribute) 
        {
            return $this->errors[$attribute] ?? false;
        }

        public function getFirstError($attribute) {
            return $this->errors[$attribute][0] ?? '';
        }

    }
