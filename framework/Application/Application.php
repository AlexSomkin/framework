<?

    namespace App\framework\Application;

    class Application
    {

        public function _D($var, $types = false)
        {
            echo '<pre>';
            if ($types) {
                var_dump($var);
            } else {
                print_r($var);
            }
            echo '</pre>';
        }

        public function getConfig($path, $params) 
        {
            return "";
        }
    }
