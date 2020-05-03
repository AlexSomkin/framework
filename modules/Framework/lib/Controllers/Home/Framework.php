<?

    namespace App\modules\Framework\lib\Controllers\Home;

    class Framework extends \App\modules\Framework\lib\Controllers\Base
    {

        public function __construct()
        {
            parent::__construct();
        }

        public function index() 
        {
            $this->render("/home/index", [
                'text' => 'text'
            ]);
        }
    }
