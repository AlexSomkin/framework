<?

    namespace App\modules\Framework\Controllers;

    class Base extends \App\framework\Controller\Controller
    {

        public function __construct()
        {
            parent::__construct();

            $this->template->setTemplatePath(ROOT . "/modules/Framework/template");
            $this->template->setMainTemplateLayout($this->template->getTemplatePath() . "/layout");
        }
        
    }
