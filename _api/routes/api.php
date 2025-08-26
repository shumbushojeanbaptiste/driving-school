<?php

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Remove "/public" or subdirectory from URI if hosted under subfolder
$basePath = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$request = str_replace($basePath, '', $requestUri);

// Normalize request URI
$request = rtrim($request, '/') ?: '/';

switch (true) {
    case $request === '/':
        echo json_encode(['message' => 'Welcome to Driving School API']);
        break;
        // Authentication routes

    case $request === '/auth/register' && $method === 'POST':
        require_once __DIR__ . '/../controllers/AuthController.php';
        (new AuthController())->register();
        break;
    case $request === '/auth/edit' && $method === 'PUT':
        require_once __DIR__ . '/../controllers/AuthController.php';
        (new AuthController())->updateUser();
        break;
     case $request === '/auth/list' && $method === 'GET':
        require_once __DIR__ . '/../controllers/AuthController.php';
        (new AuthController())->getAllUsers();
        break;
    case $request === '/auth/login' && $method === 'POST':
        require_once __DIR__ . '/../controllers/AuthController.php';
        (new AuthanticationChecker())->login();
        break;
    // user profile
    case $request === '/auth/profile' && $method === 'GET':
        require_once __DIR__ . '/../controllers/AuthController.php';
        (new AuthanticationChecker())->getUserProfile();
        break;
    case $request === '/auth/logout' && $method === 'POST':
        require_once __DIR__ . '/../controllers/AuthController.php';
        (new AuthanticationChecker())->logout();
        break;

        // School routes
    case $request === '/schools/register' && $method === 'POST':
        require_once __DIR__ . '/../controllers/SchoolController.php';
        (new SchoolController())->registerSchool();
        break;

    case $request === '/schools/edit' && $method === 'PUT':
        require_once __DIR__ . '/../controllers/SchoolController.php';
        (new SchoolController())->updateSchool();
        break;

    case $request === '/schools/delete' && $method === 'DELETE':
        require_once __DIR__ . '/../controllers/SchoolController.php';
        (new SchoolController())->deleteSchool();
        break;

    case $request === '/schools/get' && $method === 'GET':
        require_once __DIR__ . '/../controllers/SchoolController.php';
        (new SchoolController())->getAllSchools();
        break;
    
        // Student routes
    case $request === '/students/register' && $method === 'POST':
        require_once __DIR__ . '/../controllers/StudentController.php';
        (new StudentController())->register();
        break;
    case $request === '/students/edit' && $method === 'PUT':
        require_once __DIR__ . '/../controllers/StudentController.php';
        (new StudentController())->updateStudent();
        break;
    case $request === '/students/delete' && $method === 'DELETE':
        require_once __DIR__ . '/../controllers/StudentController.php';
        (new StudentController())->deleteStudent();
        break;
        
    case $request === '/students/list' && $method === 'GET':
        require_once __DIR__ . '/../controllers/StudentController.php';
        (new StudentController())->getAllStudents();
        break;
    case $request === '/students/center/registration' && $method === 'POST':
        require_once __DIR__ . '/../controllers/StudentController.php';
        (new StudentController())->studentLicenseRegistration();
        break;
     case $request === '/students/center/registered' && $method === 'GET':
        require_once __DIR__ . '/../controllers/StudentController.php';
        (new StudentController())->getAllStudentsRegistrations();
        break; 

    //settings routes
     case $request === '/settings/create' && $method === 'POST':
        require_once __DIR__ . '/../controllers/SettingController.php';
        (new SettingController())->createRoles();
        break;
    
    case $request === '/settings/edit' && $method === 'PUT':
        require_once __DIR__ . '/../controllers/SettingController.php';
        (new SettingController())->update();
        break;
    case $request === '/settings/role/list' && $method === 'GET':
        require_once __DIR__ . '/../controllers/SettingController.php';
        (new SettingController())->getAllroles();
        break;
   
   case $request === '/settings/license/new' && $method === 'POST':
        require_once __DIR__ . '/../controllers/SettingController.php';
        (new SettingController())->createLicense();
        break;

    case $request === '/settings/license/list' && $method === 'GET':
        require_once __DIR__ . '/../controllers/SettingController.php';
        (new SettingController())->getAllLicenses();
        break;

    case $request === '/settings/get' && $method === 'GET':
        require_once __DIR__ . '/../controllers/SettingController.php';
        (new SettingController())->getSettings();
        break;
    
    case $request === '/settings/license/permitted' && $method === 'POST':
        require_once __DIR__ . '/../controllers/SettingController.php';
        (new SettingController())->licensePermission();
        break;
    case $request === '/settings/license/permitted/list' && $method === 'GET':
        require_once __DIR__ . '/../controllers/SettingController.php';
        (new SettingController())->getAllLicensePermissions();
        break;
    //instructor routes
    case $request === '/instructors/register' && $method === 'POST':
        require_once __DIR__ . '/../controllers/InstructorController.php';
        (new InstructorController())->register();
        break;
    case $request === '/instructors/edit' && $method === 'PUT':
        require_once __DIR__ . '/../controllers/InstructorController.php';
        (new InstructorController())->updateInstructor();
        break;

    case $request === '/instructors/list' && $method === 'GET':
        require_once __DIR__ . '/../controllers/InstructorController.php';
        (new InstructorController())->getAllInstructors();
        break;
    case $request === '/instructors/assign' && $method === 'POST':
        require_once __DIR__ . '/../controllers/InstructorController.php';
        (new InstructorController())->assignToCenter();
        break;
    case $request === '/instructors/assigned/list' && $method === 'GET':
        require_once __DIR__ . '/../controllers/InstructorController.php';
        (new InstructorController())->getAssignedInstructors();
        break;
    // center routes
    case $request === '/centers/register' && $method === 'POST':
        require_once __DIR__ . '/../controllers/CenterController.php';
        (new CenterController())->registerCenter();
        break;
    case $request === '/centers/edit' && $method === 'PUT':
        require_once __DIR__ . '/../controllers/CenterController.php';
        (new CenterController())->updateCenter();
        break;
   
    case $request === '/centers/list' && $method === 'GET':
        require_once __DIR__ . '/../controllers/CenterController.php';
        (new CenterController())->getAllCenters();
        break;
    

        // payment routes
    case $request === '/payments/financial/records' && $method === 'POST':
        require_once __DIR__ . '/../controllers/PaymentController.php';
        (new PaymentController())->registerPayment();
        break;
   
    case $request === '/payments/list' && $method === 'GET':
        require_once __DIR__ . '/../controllers/PaymentController.php';
        (new PaymentController())->getAllPayments();
        break;
    case $request === '/payments/get' && $method === 'POST':
        require_once __DIR__ . '/../controllers/PaymentController.php';
        (new PaymentController())->getPaymentById();
        break;

    // Default case for unmatched routes

    default:
        http_response_code(404);
        echo json_encode(['message' => 'Route not found']);
        break;
}
