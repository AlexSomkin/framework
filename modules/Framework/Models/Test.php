<?

    namespace App\modules\Framework\Models;

    class Test extends \App\framework\Model\Model
    {

        public $id;
        public $name;
        public $age;

        public function __construct($params = false)
        {
            parent::__construct($params);
        }
    }
