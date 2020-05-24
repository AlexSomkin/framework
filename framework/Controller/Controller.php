<?

    namespace App\framework\Controller;

    class Controller extends \App\framework\Application\Application
    {

        public $template;
        public $database;

        public function __construct()
        {
            $this->initDatabase();
            $this->initTemplate();
        }

        protected function initTemplate()
        {
            $this->template = new \App\framework\Template\Template();
        }

        protected function initDatabase()
        {
            $this->database = new \App\framework\Database\Database();
        }

        public function render($path, $params) 
        {
            if (isset($params) && $params) {
                extract($params);
            }

            $this->template->setContent($path);
            include $this->template->renderLayout();
        }

        public function redirect($uri = '', $method = 'location', $http_response_code = 302)
        {
            if (!preg_match('#^https?://#i', $uri)) $uri = url($uri);
            switch($method) {
                case 'refresh':
                    header("Refresh:0;url=" . $uri);
                    break;
                default:
                    header("Location: " . $uri, TRUE, $http_response_code);
                    break;
            }
            exit;
        }
    }
