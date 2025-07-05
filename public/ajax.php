<?php
$request = $_GET['page'] ?? 'home';

switch ($request) {
    case 'home':
        require __DIR__ . '/views/home.php';
        break;
    case 'about':
        require __DIR__ . '/views/about.php';
        break;
    case 'sign-in':
        require __DIR__ . '/views/sign-in.php';
        break;
    case 'registration':
        require __DIR__ . '/views/registration.php';
        break;
    case 'training':
        require __DIR__ . '/views/training.php';
        break;
    case 'fees':
        require __DIR__ . '/views/fees.php';
        break;
    case 'sessions':
        require __DIR__ . '/views/sessions.php';
        break;
    case 'tracker':
        require __DIR__ . '/views/tracker.php';
        break;
    case 'licenses':
        require __DIR__ . '/views/licenses.php';
        break;
    case 'services':
        require __DIR__ . '/views/services.php';
        break;
    // for admin pages
    case 'dashboard':
        require __DIR__ . '/views/dashboard.php';
        break;
    default:
        require __DIR__ . '/views/404.php';
        break;
}
