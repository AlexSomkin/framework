<?

    namespace App\framework\Database;

    class Database extends \App\framework\Application\Application
    {
        public function __construct()
        {
            include (ROOT . "/database_config.php");
            $this->_D($databaseConfig);
        }
    }
