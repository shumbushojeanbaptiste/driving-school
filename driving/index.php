<?php
require __DIR__ . '/../vendor/admin/topcontent.php';
$request = $_SERVER['REQUEST_URI'];
$basePath = '/www.driving.rw/driving';  // Adjust this to your base path

// Remove basePath from request
$request = str_replace($basePath, '', $request);
$request = strtok($request, '?'); // remove query string
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";

// Get the current host (localhost or yourdomain.com)
$host = $_SERVER['HTTP_HOST'];
$API_basePath = '/www.driving.rw';
$baseUrl = $protocol . "://" . $host . $API_basePath;

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
    case "/role-management":
        require __DIR__ . '/views/role-data.php';
        break;
    case "/license-type":
        require __DIR__ . '/views/license-data.php';
        break;

     case "/school-list":
        require __DIR__ . '/views/school-data.php';
        break;
    case "/instructors":
        require __DIR__ . '/views/instructors-list.php';
        break;
    case "/school-centers":
        require __DIR__ . '/views/school-centers.php';
        break;
    case "/student-list":
        require __DIR__ . '/views/student-data.php';
        break;
    case "/student-registration":
        require __DIR__ . '/views/student-registration.php';
        break;
    case "/attendance-mngt":
        require __DIR__ . '/views/attendance-data.php';
        break;
    case "/examination-trainings":
        require __DIR__ . '/views/examination-trainings.php';
        break;
    case "/request-class-schedule":
        require __DIR__ . '/views/request-class-schedule-data.php';
        break;
    case "/payment-fee":
        require __DIR__ . '/views/payment-transactions.php';
        break;
    case "/student-classes":
        require __DIR__ . '/views/driving-school-classes.php';
        break;
    case "/logout":
        require __DIR__ . '/views/logout.php';
        break; 
    default:
        require __DIR__ . '/views/404.php';
        break;
}

// Include the footer
require __DIR__ . '/../vendor/admin/bottomcontent.php';

?>
