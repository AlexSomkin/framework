<?

    namespace App\modules\Framework\Controllers\Home;

    class Framework extends \App\modules\Framework\Controllers\Base
    {

        public function __construct()
        {
            parent::__construct();
        }

        public function index() 
        {
            $query = "SELECT * FROM test";
            
            $result = $this->database->query($query)->getResult();
            
            $models = [];
            foreach ($result as $item) {
                $item['qwe'] = 2;
                $newModel = new \App\modules\Framework\Models\Test($item);
                $models[] = $newModel;
            }

            $this->render("/home/index", [
                'models' => $models
            ]);
        }
    }
