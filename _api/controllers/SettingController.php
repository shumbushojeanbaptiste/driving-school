<?php
require_once './models/Setting.php';
require_once './config/database.php';
require_once './core/Response.php';

class SettingController {
    /**
     * Register a new student.
     * This method expects a JSON payload with the student's details.
     */
  public function createRoles() {
    try {
        $data = json_decode(file_get_contents("php://input"), true);
        $db = (new Database())->connect();
        $setting = new Roles($db);

        // setting fields
        $setting->role_name = $data['role_name'];
        
        $setting->status = isset($data['status']) ? $data['status'] : 1; // Default to active if not provided
        // Try to create the setting
       $result = $setting->create();

if ($result === true) {
    Response::json([
        "message" => "{$setting->role_name} role registered successfully."
    ], 201);
} else {
    Response::json([
        "message" => "Failed to register role.",
        "error" => $result
    ], 400);
}

    } catch (PDOException $e) {
        // Database error (e.g., duplicate email, constraint violation)
        Response::json([
            "error" => "Database error",
            "details" => $e->getMessage()
        ], 500);
    } catch (Exception $e) {
        // General PHP error
        Response::json([
            "error" => "Server error",
            "details" => $e->getMessage()
        ], 500);
    }
}
    public function update() {
        try {
            $data = json_decode(file_get_contents("php://input"), true);
            $db = (new Database())->connect();
            $setting = new Roles($db);

            // setting fields
            $setting->role_name = $data['role_name'];
            $setting->status = isset($data['status']) ? $data['status'] : 1; // Default to active if not provided
            
            // Try to update the setting
            $result = $setting->update($data['id']);
if ($result === true) {
    Response::json([
        "message" => "{$setting->role_name} role updated successfully."
    ], 200);

} else {
    Response::json([
        "message" => "Failed to update role.",
        "error" => $result
    ], 400);
}
        } catch (PDOException $e) {
            // Database error (e.g., duplicate email, constraint violation)
            Response::json([
                "error" => "Database error",
                "details" => $e->getMessage()
            ], 500);
        } catch (Exception $e) {
            // General PHP error
            Response::json([
                "error" => "Server error",
                "details" => $e->getMessage()
            ], 500);
        }
    }

    public function getAllRoles() {
        try {
            $db = (new Database())->connect();
            $setting = new Roles($db);
    
            // Fetch all roles
            $result = $setting->getAll();
    
            if ($result) {
                Response::json(["data" => $result], 200);
            } else {
                Response::json([
                    "message" => "No roles found."
                ], 404);
            }
        } catch (PDOException $e) {
            // Database error
            Response::json([
                "error" => "Database error",
                "details" => $e->getMessage()
            ], 500);
        } catch (Exception $e) {
            // General PHP error
            Response::json([
                "error" => "Server error",
                "details" => $e->getMessage()
            ], 500);
        }
    }
    public function createLicense() {
        try {
            $data = json_decode(file_get_contents("php://input"), true);
            $db = (new Database())->connect();
            $license = new License($db);
    
            // setting fields
            $license->full_name = $data['full_name'];
            $license->short_name = $data['short_name'];

            // Try to create the setting
           $result = $license->create();

if ($result === true) {
    Response::json([
        "message" => "{$license->full_name} license registered successfully."
    ], 201);
} else {
    Response::json([
        "message" => "Failed to register license.",
        "error" => $result
    ], 400);
}

    } catch (PDOException $e) {
        // Database error (e.g., duplicate email, constraint violation)
        Response::json([
            "error" => "Database error",
            "details" => $e->getMessage()
        ], 500);
    } catch (Exception $e) {
        // General PHP error
        Response::json([
            "error" => "Server error",
            "details" => $e->getMessage()
        ], 500);
    }
}

public function getAllLicenses() {
    try {
        $db = (new Database())->connect();
        $license = new License($db);

        // Fetch all licenses
        $result = $license->getAll();

        if ($result) {
           Response::json(["data" => $result], 200);
        } else {
            Response::json([
                "message" => "No licenses found."
            ], 404);
        }
    } catch (PDOException $e) {
        // Database error
        Response::json([
            "error" => "Database error",
            "details" => $e->getMessage()
        ], 500);
    } catch (Exception $e) {
        // General PHP error
        Response::json([
            "error" => "Server error",
            "details" => $e->getMessage()
        ], 500);
    }
}

public function licensePermission() {
    try {
        $data = json_decode(file_get_contents("php://input"), true);
        $db = (new Database())->connect();
        $license = new LicensePermitted($db);

        // setting fields
        $license->school_id = $data['school_id'];
        $license->center_id = $data['center_id'];
        $license->license_id = $data['license_id'];

    

        // Check if school_id, center_id, and license_id are provided
        if (empty($license->school_id) || empty($license->center_id) || empty($license->license_id)) {
            Response::json([
                "error" => "Missing required fields: school_id, center_id, license_id."
            ], 400);
            return;
        }
        // Try to create the setting
       $result = $license->create();

       if ($result === true) {
           Response::json([
               "message" => "License permission created successfully."
           ], 201);
       } else {
           Response::json([
               "message" => "Failed to create license permission.",
               "error" => $result
           ], 400);
       }
   } catch (PDOException $e) {
       // Database error (e.g., duplicate email, constraint violation)
       Response::json([
           "error" => "Database error",
           "details" => $e->getMessage()
       ], 500);
   } catch (Exception $e) {
       // General PHP error
       Response::json([
           "error" => "Server error",
           "details" => $e->getMessage()
       ], 500);
   }


}

public function getAllLicensePermissions() {
    try {
        $db = (new Database())->connect();
        $license = new LicensePermitted($db);

        // Fetch all license permissions
        $result = $license->getAll();

        if ($result) {
            Response::json($result, 200);
        } else {
            Response::json([
                "message" => "No license permissions found."
            ], 404);
        }
    } catch (PDOException $e) {
        // Database error
        Response::json([
            "error" => "Database error",
            "details" => $e->getMessage()
        ], 500);
    } catch (Exception $e) {
        // General PHP error
        Response::json([
            "error" => "Server error",
            "details" => $e->getMessage()
        ], 500);
    }

}

}
?>