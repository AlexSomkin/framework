<?

    namespace App\framework\Database;

    class Database extends \App\framework\Application\Application
    {

        private $connect;
        private $query;
        private $errors = [];
        private $result = [];

        public function __construct()
        {
            include (ROOT . "/database_config.php");

            $this->connect = $this->databaseConnection(
                $database_config['host'],
                $database_config['user'],      
                $database_config['password'],  
                $database_config['db_name']
            );
            $this->connect->set_charset('utf8');
        }

        private function databaseConnection($host, $user, $password, $dbName)
        {
            return mysqli_connect(
                $host,
                $user,
                $password,
                $dbName 
            );        
        }

        public function query($queryText, $params = [])
        {
            if (count($params) === 0) {
                $this->query = $this->connect->query($queryText);
            } else {
                $this->query = $this->connect->prepare($queryText);

                $paramTypes = [];
                foreach ($params as $param) {
                    switch (gettype($param)) {
                        case 'string':
                            $paramTypes[] = "s";
                            break;
                        case 'integer':
                            $paramTypes[] = "i";
                            break;
                        case 'float':
                            $paramTypes[] = "d";
                            break;
                    }
                }

                $this->query->bind_param(implode("", $paramTypes), ...$params);
                $this->query->execute();
                $this->query = $this->query->get_result();
            }

            return $this;
        }

        private function addError($error)
        {
            $this->errors[] = $error;
        }

        public function getErrors()
        {
            return $this->errors;
        }

        private function addResult($item) 
        {
            $this->result[] = $item;
        }

        public function getResult()
        {
            if (!$this->query) {
                return false;
            }

            while ($row = $this->query->fetch_assoc()) {
                $this->addResult($row);
            }

            return $this->result;
        }
    }
