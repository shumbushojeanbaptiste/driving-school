<?php
require_once './models/Instructor.php';
require_once './config/database.php';
require_once './core/Response.php';

class InstructorController {
   
    private $instructor;
    public function __construct() {
        $db = (new Database())->connect();
        $this->instructor = new Instructor($db);
    }

    public function register() {
        // Get input data
        $data = json_decode(file_get_contents("php://input"), true);
        // Set instructor properties
        $this->instructor->instructor_code = $data['instructor_code'];
        $this->instructor->first_name = $data['first_name'];
        $this->instructor->last_name = $data['last_name'];
        $this->instructor->familly_name = $data['familly_name'];
        $this->instructor->phone = $data['phone'];
        $this->instructor->ID_number = $data['ID_number'];
        $this->instructor->email = $data['email'];

        // Call create method
        $result = $this->instructor->create();

        // Return response
        if ($result === true) {
            Response::json(["message" => "Instructor registered successfully."], 201);
        } else {
            Response::json(["error" => $result], 400);
        }
    }
    
    public function updateInstructor() {
        // Get input data
        $data = json_decode(file_get_contents("php://input"), true);

        // Set instructor properties  use like this $data['role_name'];
        if (!isset($data['instructor_code']) || !isset($data['first_name']) || !isset($data['last_name']) || !isset($data['familly_name']) || !isset($data['phone']) || !isset($data['ID_number']) || !isset($data['email'])) {
            Response::json(["error" => "Missing required fields."], 400);
            return;
        }
        $this->instructor->instructor_code = $data['instructor_code'];
        $this->instructor->first_name = $data['first_name'];
        $this->instructor->last_name = $data['last_name'];
        $this->instructor->familly_name = $data['familly_name'];
            $this->instructor->phone = $data['phone'];
            $this->instructor->ID_number = $data['ID_number'];
            $this->instructor->email = $data['email'];
        // Check if ID is provided
        if (!isset($data['id'])) {
            Response::json(["error" => "Missing required field: id."], 400);
            return;
        }

        // Call update method
        $result = $this->instructor->update($data['id']);

        // Return response
        if ($result === true) {
            Response::json(["message" => "Instructor updated successfully."], 200);
        } else {
            Response::json(["error" => $result], 400);
        }
    }
    public function assignToCenter() {
        // Get input data
        $data = json_decode(file_get_contents("php://input"), true);

        // Check if required fields are present
        $this->instructor->school_id = $data['school_id'];
        $this->instructor->interest_rate = $data['interest_rate'];
        $this->instructor->reg_date = date('Y-m-d H:i:s');
      
        if (!isset($data['instructor_id']) || !isset($data['center_id'])) {
            Response::json(["error" => "Missing required fields: instructor_id, center_id."], 400);
            return;
        }

        // Call the method to assign instructor to center
        $result = $this->instructor->assignInstructorToCenter($data['instructor_id'], $data['center_id']);

        // Return response
        if ($result === true) {
            Response::json(["message" => "Instructor assigned to center successfully."], 200);
        } else {
            Response::json(["error" => $result], 400);
        }
    }
    
       

    public function getAllInstructors() {
        $result = $this->instructor->getAll();

        if (is_array($result)) {
            Response::json(["data" => $result], 200);
        } else {
            Response::json(["error" => $result], 400);
        }
    }
    public function getAssignedInstructors() {
        // Get input data
        $data = json_decode(file_get_contents("php://input"), true);
        $result = $this->instructor->getAssignedInstructors($data['center_id']);
        // Check if the result is an array

        if (is_array($result)) {
            Response::json(["data" => $result], 200);
        } else {
            Response::json(["error" => $result], 400);
        }
    }
}
