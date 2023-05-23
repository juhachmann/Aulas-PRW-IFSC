<?php

use app\core\Application;

    class m0002_add_password_to_users 
    {

        public function up() {
            
            $db = Application::$app->db;

            $sql = "ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL;";
            
            $db->connection->query($sql) or die($db->connection->error);

        }

        public function down() {
            $db = Application::$app->db;

            $sql = "ALTER TABLE users DROP COLUMN password;";
            
            $db->connection->query($sql) or die($db->connection->error);
        }

    }