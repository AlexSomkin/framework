<?

    namespace App\framework\Template {

        class Template 
        {

            private $content = '';
            private $mainTemplateLayout = '';
            private $templatePath = '';

            public function loadStaticPage($path)
            {   
                require_once $path;
            }

            public function partial($template) 
            {
                return $template . ".php";
            }

            public function renderLayout($layoutPath = false)
            {
                if ($layoutPath) {
                    return $layoutPath;
                } else {
                    return $this->getMainTemplateLayout();
                }
            }
            
            public function setContent($path)
            {
                $this->content = $this->templatePath . $path . ".php";
            }

            public function getContent()
            {
                return $this->content;
            }

            public function renderContent()
            {
                return $this->getContent();
            }

            public function setMainTemplateLayout($mainTemplateLayout)
            {
                $this->mainTemplateLayout = $mainTemplateLayout . ".php";
            }

            public function getMainTemplateLayout()
            {
                return $this->mainTemplateLayout;
            }
            
            public function setTemplatePath($templatePath)
            {
                $this->templatePath = $templatePath;
            }

            public function getTemplatePath()
            {
                return $this->templatePath;
            }

        }
    }
