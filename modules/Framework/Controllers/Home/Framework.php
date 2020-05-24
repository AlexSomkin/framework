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
            $query = "SELECT * FROM test WHERE id = ?";
            
            $result = $this->database->query($query, [2])->getResult();
            
            $text = "";
            if (count($result) > 0) {
                $text = $result[0]['name'];
            }

            $this->render("/home/index", [
                'text' => $text
            ]);
        }
    }
