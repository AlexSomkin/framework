<?

    namespace App\framework\Route;

    use Exception;

    class Route extends \App\framework\Application\Application
    {
        private $urls = [];
        private $request = '';

        public function __construct($url)
        {
            $this->request = $url;
        }

        public function connect($url, $class, $action) 
        {
            $this->urls[] = [
                'url' => $url, 
                'class' => $class, 
                'action' => $action
            ];
        }

        public function run() 
        {
            $preparedRequestUrl = substr($this->request, 1);
            $requestUrlArray = explode('/', $preparedRequestUrl);
            
            foreach ($this->urls as $url) {
                $preparedItemUrl = substr($url['url'], 1);
                $itemUrlArray = explode('/', $preparedItemUrl);
                
                if (count($requestUrlArray) !== count($itemUrlArray)) {
                    continue;
                }

                $itemUrlWithoutParams = '';
                foreach ($itemUrlArray as $item) {
                    if (strpos($item, ':') === false) {
                        if ($itemUrlWithoutParams === '') {
                            $itemUrlWithoutParams .= $item;
                        } else {
                            $itemUrlWithoutParams .= '/' . $item;
                        }
                    }
                }

                $itemUrlSectionsCount = count(explode('/', $itemUrlWithoutParams));
                
                $requestUrlWithoutParams = '';
                $requestUrlParams = [];
                for ($i = 0; $i < count($requestUrlArray); $i++) {
                    if ($i < $itemUrlSectionsCount) {
                        if ($requestUrlWithoutParams === '') {
                            $requestUrlWithoutParams .= $requestUrlArray[$i];
                        } else {
                            $requestUrlWithoutParams .= '/' . $requestUrlArray[$i];
                        }
                    } else {
                        $requestUrlParams[] = $requestUrlArray[$i];
                    }
                }
                
                if ($itemUrlWithoutParams === $requestUrlWithoutParams) {
                    $class = $url['class'];
                    $action = $url['action'];
                    $controller = new $class;

                    try {
                        if (method_exists($class, $action)) {
                            $controller->$action(...$requestUrlParams); 
                            return true;
                        } else {
                            throw new Exception("Methon undefined");
                        }
                    } catch (Exception $th) {
                        echo $th->getMessage();
                    }
                }
            }

            $notFoundTemplate = new \App\framework\Template\Template();
            $notFoundTemplate->loadStaticPage(ROOT . "/404.php");
        }

        public function getUrls()
        {
            return $this->urls;
        }
    }
