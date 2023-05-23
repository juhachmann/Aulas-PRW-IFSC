<?php 

    namespace app\core;

    use mysqli;
    use PDO;

    /**
     * Class Database
     * 
     * @package app\core
     */

    class Database 
    {

        public PDO $con;


        public function __construct(array $config)
        {
            $dns = $config['dns'];
            $user = $config['user'];
            $passwd = $config['password'];
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $this->con = new PDO($dns, $user, $passwd); 
            $this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->useDatabase($config['dbName']); 
            echo "cheguei aquiii";
            $this->applyMigrations();      
            echo "passei aqui?";
        }


        public function applyMigrations() 
        {
            $newMigrations = [];

            $this->createMigrationsTable();

            $applied = $this->getAppliedMigrations();
            $files = scandir(Application::$ROOT_DIR.'/migrations');
            $toApply = array_diff($files, $applied);

            foreach($toApply as $migration) {
                if ($migration === '.' || $migration === '..') {
                    continue;
                }

                require_once Application::$ROOT_DIR.'/migrations/'.$migration;
                $className = pathinfo($migration, PATHINFO_FILENAME);
                $instance = new $className();
                $this->log("Apllying migration $migration");
                $instance->up();
                $this->log("$migration applied.");
                $newMigrations[] = $migration;
            }

            if(!empty($newMigrations)) {
                $this->saveMigrations($newMigrations);
            }
            else {
                $this->log("All migrations already applied!");
            }
        }

        public function saveMigrations(array $migrations) 
        {
            $str = implode(',', array_map(fn($m) => "('$m')", $migrations));
            $statement = $this->con->prepare("INSERT INTO migrations (migration) VALUES 
                $str
            ");
            $statement->execute();
        }

        public function createMigrationsTable() 
        {
            $this->con->exec("CREATE TABLE IF NOT EXISTS migrations (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    migration VARCHAR(250),
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                ) ENGINE = INNODB;");
            echo "passei aqui";
        }

        public function getAppliedMigrations() 
        {
            $statement = $this->con->prepare("SELECT migration FROM migrations");
            $statement->execute();
            return $statement->fetchAll(\PDO::FETCH_COLUMN);
        }

        public function useDatabase($dbName) {
            $this->con->exec("CREATE DATABASE IF NOT EXISTS $dbName");
            $this->con->exec("USE $dbName");
        }

        public function log($message) {
            echo "[" . date('Y-m-d H:i:s') . '] - ' . $message . PHP_EOL;
        }

        public function prepare($sql) 
        {
            return $this->con->prepare($sql);
        }

        
    }