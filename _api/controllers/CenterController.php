<?php
require_once './models/Center.php';
require_once './config/database.php';
require_once './core/Response.php';

class CenterController {
    private $center;

    public function __construct() {
        $db = (new Database())->connect();
        $this->center = new Center($db);
    }

    public function registerCenter() {
        try {
            $data = json_decode(file_get_contents("php://input"), true);

            // Set center properties
            $this->center->center_name = $data['center_name'];
            $this->center->center_code = $data['center_code'];
            $this->center->center_address = $data['center_address'];
            $this->center->center_phone = $data['center_phone'];
            $this->center->center_orgin = isset($data['center_orgin']) ? $data['center_orgin'] : '';
            $this->center->reg_date = date('Y-m-d H:i:s');
            $this->center->province_id = isset($data['province_id']) ? $data['province_id'] : null; 
            $this->center->district_id = isset($data['district_id']) ? $data['district_id'] : null; 
            $this->center->sector_id = isset($data['sector_id']) ? $data['sector_id'] : null; 
            $this->center->cell_id = isset($data['cell_id']) ? $data['cell_id'] : null; 
            $this->center->village_id = isset($data['village_id']) ? $data['village_id'] : null; 
        

            // Call create method
            $result = $this->center->create();

            if ($result === true) {
                Response::json(["message" => "Center registered successfully."], 201);
            } else {
                Response::json(["error" => "Failed to register center.", "details" => $result], 400);
            }
        } catch (Exception $e) {
            Response::json(["error" => "Server error", "details" => $e->getMessage()], 500);
        }
    }
    public function updateCenter() {
        try {
            $data = json_decode(file_get_contents("php://input"), true);

            // Set center properties
            $this->center->center_name = $data['center_name'];
            $this->center->center_code = $data['center_code'];
            $this->center->center_address = $data['center_address'];
            $this->center->center_phone = $data['center_phone'];
            $this->center->center_orgin = isset($data['center_orgin']) ? $data['center_orgin'] : '';
            $this->center->reg_date = date('Y-m-d H:i:s');
            $this->center->province_id = isset($data['province_id']) ? $data['province_id'] : null;
            $this->center->district_id = isset($data['district_id']) ? $data['district_id'] : null;
            $this->center->sector_id = isset($data['sector_id']) ? $data['sector_id'] : null;
            $this->center->cell_id = isset($data['cell_id']) ? $data['cell_id'] : null;
            $this->center->village_id = isset($data['village_id']) ? $data['village_id'] : null;

            // Check if ID is provided
            if (!isset($data['id'])) {
                Response::json(["error" => "Missing required field: id."], 400);
                return;
            }

            // Call update method
            $result = $this->center->update($data['id']);

            if ($result === true) {
                Response::json(["message" => "Center updated successfully."], 200);
            } else {
                Response::json(["error" => "Failed to update center.", "details" => $result], 400);
            }
        } catch (Exception $e) {
            Response::json(["error" => "Server error", "details" => $e->getMessage()], 500);
        }
    }

    public function getAllCenters() {
        // Fetch all centers
        try {
            $centers = $this->center->getAll();
            if ($centers) {
                Response::json($centers, 200);
            } else {
                Response::json(["message" => "No centers found."], 404);
            }
        } catch (Exception $e) {
            Response::json(["error" => "Server error", "details" => $e->getMessage()], 500);
        }
    }

}


?>