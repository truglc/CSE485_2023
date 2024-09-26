<?php
define('DEV', true);

define('MEDIA_TYPES', ['image/jpeg', 'image/png', 'image/gif',]);
define('FILE_EXTENSIONS', ['jpeg', 'jpg', 'png', 'gif',]);        
define('MAX_SIZE', '5242880');                                  



spl_autoload_register(function($class)                   
{
    $path = APP_ROOT . '/src/classes/';                 
    require $path . $class . '.php';                    
});

unset($dsn, $username, $password);                      
?>