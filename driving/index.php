<?php
require __DIR__ . '/../vendor/admin/topcontent.php';
$request = $_SERVER['REQUEST_URI'];
$basePath = '/www.driving.rw/driving';  // Adjust this to your base path

// Remove basePath from request
$request = str_replace($basePath, '', $request);
$request = strtok($request, '?'); // remove query string

switch ($request) { 
    case '/':
    case '':
        require __DIR__ . '/views/home.php';
        break;
    case '/home':
        require __DIR__ . '/views/home.php';
        break;
  // for admin pages
    case '/dashboard':
        require __DIR__ . '/views/dashboard.php';
        break;  
   case '/documentation':
        require __DIR__ . '/views/documentation.php';
        break; 
    case "/user-access":
        require __DIR__ . '/views/user-account.php';
        break; 
    default:
        require __DIR__ . '/views/404.php';
        break;
}

// Include the footer
require __DIR__ . '/../vendor/admin/bottomcontent.php';

?>
