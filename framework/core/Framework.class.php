<?php

class Framework {
	
	public static function run() {
		//echo "run()";
		self::init();

		self::autoload();

		self::dispatch();
	}

	//Initialization
	private static function init() {
		// Define path constants
	    define("DS", DIRECTORY_SEPARATOR);
    	define("ROOT", getcwd() . DS); //get current directory
	    define("APP_PATH", ROOT . 'application' . DS);
	    define("FRAMEWORK_PATH", ROOT . "framework" . DS);
	    define("PUBLIC_PATH", ROOT . "public" . DS);
	    define("CONFIG_PATH", APP_PATH . "config" . DS);
	    define("CONTROLLER_PATH", APP_PATH . "controllers" . DS);
	    define("MODEL_PATH", APP_PATH . "models" . DS);
	    define("VIEW_PATH", APP_PATH . "views" . DS);
	    define("CORE_PATH", FRAMEWORK_PATH . "core" . DS);
	    define('DB_PATH', FRAMEWORK_PATH . "database" . DS);
	    define("LIB_PATH", FRAMEWORK_PATH . "libraries" . DS);
	    define("HELPER_PATH", FRAMEWORK_PATH . "helpers" . DS);

	    //Define controller and action, for example,
	    //index.php?&c==Goods&a=add
	    define("CONTROLLER", isset($_REQUEST['c']) ? $_REQUEST['c'] : 'Employee'); //Default Controller
	    define("ACTION", isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index'); //Default method

	    define("CURR_CONTROLLER_PATH", CONTROLLER_PATH . DS);
	    define("CURR_VIEW_PATH", VIEW_PATH . DS);

    	// Load core classes
    	require CORE_PATH . "Controller.class.php";
	    require CORE_PATH . "Loader.class.php";
	    require DB_PATH . "Mysql.class.php";
	    require CORE_PATH . "Model.class.php";

	    // Load configuration file
	    $GLOBALS['config'] = include CONFIG_PATH . "config.php";

    	// Start session
	    session_start();

	}

	private static function autoload() {
		spl_autoload_register(array(__CLASS__,'load'));
	}

	// Define a custom load method
	private static function load($classname){
	    // Here simply autoload app’s controller and model classes
	    if (substr($classname, -10) == "Controller"){
	        // Controller
	        require_once CURR_CONTROLLER_PATH . "$classname.class.php";
	    } elseif (substr($classname, -5) == "Model"){
	        // Model
	        require_once  MODEL_PATH . "$classname.class.php";
	    }
	}

	private static function dispatch() {
		// Instantiate the controller class and call its action method
	    $controller_name = CONTROLLER . "Controller";
	    $action_name = ACTION . "Action";
	    $controller = new $controller_name;

	  	if(CONTROLLER == 'Employee') {
	  		if(ACTION == 'team') {
	  			$team_name = $_REQUEST['team_name'];
	  			$controller->$action_name($team_name);	
	  		} else {
	  			$controller->$action_name();
	  		}
	  	} else {
	  		$controller->$action_name();	
	  	}
	}

}