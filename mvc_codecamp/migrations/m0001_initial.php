<?php

use app\core\Application;

    class m0001_initial 
    {

        public function up() {
            
            $db = Application::$app->db;

            $sql = "CREATE TABLE IF NOT EXISTS users (
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(150) NOT NULL,
                lastname VARCHAR(150) NOT NULL, 
                email VARCHAR(300) NOT NULL UNIQUE,
                status TINYINT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                ) ENGINE = INNODB;";
            
            $db->connection->query($sql) or die($db->connection->error);

        }

        public function down() {
            $db = Application::$app->db;

            $sql = "DROP TABLE users;";
            
            $db->connection->query($sql) or die($db->connection->error);
        }

    }