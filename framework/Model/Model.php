<?

    namespace App\framework\Model;

    class Model extends \App\framework\Application\Application
    {

        public function __construct($params = false)
        {
            if ($params) {
                $this->load($params);
            }
        }

        public function load($params) {
            foreach ($params as $paramName => $param) {
                if (property_exists(get_class($this), $paramName)) {
                    $this->$paramName = $param;
                }
            }
        }
    }
