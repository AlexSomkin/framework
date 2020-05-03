<?

    namespace App\framework\Controller;

    class Controller
    {

        public $template;

        public function __construct()
        {
            $this->initTemplate();
        }

        protected function initTemplate()
        {
            $this->template = new \App\framework\Template\Template();
        }

        public function render($path, $params) 
        {
            if (isset($params) && $params) {
                extract($params);
            }

            $this->template->setContent($path);
            include $this->template->renderLayout();
        }
    }
