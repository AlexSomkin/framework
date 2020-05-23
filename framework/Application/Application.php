<?

    namespace App\framework\Application;

    class Application
    {

        public function _D($var)
        {
            echo '<pre>';
            var_dump($var);
            echo '</pre>';
        }

        public function getConfig($path, $params) 
        {
            return "";
        }
    }
