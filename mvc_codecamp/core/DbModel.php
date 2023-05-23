<?php 

    namespace app\core;

    /**
     * 
     * 
     */

    abstract class DbModel extends Model
    {

        abstract public static function tableName() : string;

        abstract public function attributes() : array; 
        // Retorna a lista de atributos que devem ser mapeados e salvos no banco de dados
        // pois nem todos os atributos da classe ou das regras vão para o banco de dados
        // em um framework mais robusto, os atributos deveriam ser mapeados a partir do schema da tabela do banco de dados
        // como faria isto? com alguma forma de manipulação de string? 
        // 
        abstract public function bind($stmt); // vou fazer o bind pelo modelo...
        

        public function save() 
        {
            $tableName = $this->tableName();
            $attributes = $this->attributes();
            $params = array_map(fn($attr) => ":$attr", $attributes);
            $statement = self::prepare("INSERT INTO $tableName (" . implode(",", $attributes) . ") 
                    VALUES (" . implode(",", $params) . ")");
            foreach ($attributes as $attribute) {
                $statement->bindValue(":$attribute", $this->{$attribute});
            }
            $statement->execute();
            return true;
        }

        public static function findOne($where) // ['column' => 'value]
        {
            $tableName = static::tableName();
            $columns = array_keys($where);
            $sql = implode("AND", array_map(fn($col) => "$col = :$col", $columns)); //Olha que legal o implode aqui!
            $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
            foreach ($where as $column => $value) {
                $statement->bindValue(":$column", $value);
            }
            $statement->execute();
            return $statement->fetchObject();
        }

        public static function prepare($sql): \PDOStatement
        {
            return Application::$app->db->prepare($sql);
        }

    }