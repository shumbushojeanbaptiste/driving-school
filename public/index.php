<?php
require __DIR__ . '/../vendor/links.php';
$request = $_SERVER['REQUEST_URI'];
$basePath = '/www.driving.rw/public';  // ⚠️ adjust if in a subdirectory

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

    case '/about':
        require __DIR__ . '/views/about.php';
        break;
    case '/sign-in':
        require __DIR__ . '/views/sign-in.php';
        break;
    case '/registration':
        require __DIR__ . '/views/register.php';
        break;

    default:
        require __DIR__ . '/views/404.php';
        break;
}

// Include the footer
require __DIR__ . '/../vendor/footer.php';
require __DIR__ . '/../vendor/end.php';
?>
<script src="assets/js/routeData.js"></script>