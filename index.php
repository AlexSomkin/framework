<?
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    define('ROOT',dirname(__FILE__));

    spl_autoload_register(function($class) {
        $prefix = 'App\\';
        $base_dir = __DIR__ . '/';
    
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            return;
        }
    
        $relative_class = substr($class, $len);
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
        if (file_exists($file)) {
            require $file;
        }
    });

    $route = new \App\framework\Route\Route($_SERVER['REQUEST_URI']);
    
    $route->connect('/', '\App\modules\Framework\Controllers\Home\Framework', 'index');

    $route->run();
    
?>