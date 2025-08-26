<?php
class Roles {
    private $conn;
    private $table = "tbl_roles";

    public $role_name;
   

    public function __construct($db) {
        $this->conn = $db;
    }
public function create() {
    try {
        // Validate required fields
        if (empty($this->role_name)) {
            return "Missing required fields: role_name.";
        }

        // Check if role_name already exists
        $checkQuery = "SELECT COUNT(*) FROM {$this->table} WHERE role_name = :role_name";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bindParam(":role_name", $this->role_name);
        $checkStmt->execute();
        $count = $checkStmt->fetchColumn();

        if ($count > 0) {
            return "Role name already exists.";
        }

        // Prepare and execute insert query
        $insertQuery = "INSERT INTO {$this->table} (role_name) VALUES (:role_name)";
        $insertStmt = $this->conn->prepare($insertQuery);
        $insertStmt->bindParam(":role_name", $this->role_name);

        if ($insertStmt->execute()) {
            return true;
        } else {
            return "Database error during insert.";
        }
    } catch (PDOException $e) {
        return "Database error: " . $e->getMessage();
    }
}
    public function update($id) {
        try {
            // Validate required fields
            if (empty($this->role_name)) {
                return "Missing required fields: role_name.";
            }

            // Check if role_name already exists for another ID
            $checkQuery = "SELECT COUNT(*) FROM {$this->table} WHERE role_name = :role_name AND role_id != :id";
            $checkStmt = $this->conn->prepare($checkQuery);
            $checkStmt->bindParam(":role_name", $this->role_name);
            $checkStmt->bindParam(":id", $id);
            $checkStmt->execute();
            $count = $checkStmt->fetchColumn();

            if ($count > 0) {
                return "Role name already exists.";
            }

            // Prepare and execute update query
            $updateQuery = "UPDATE {$this->table} SET role_name = :role_name WHERE role_id = :id";
            $updateStmt = $this->conn->prepare($updateQuery);
            $updateStmt->bindParam(":role_name", $this->role_name);
            $updateStmt->bindParam(":id", $id);

            if ($updateStmt->execute()) {
                return true;
            } else {
                return "Database error during update.";
            }
        } catch (PDOException $e) {
            return "Database error: " . $e->getMessage();
        }
    }

    public function getAll() {
        try {
            $query = "SELECT * FROM {$this->table}";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Database error: " . $e->getMessage();
        }
    }



}


class License {
    private $conn;
    private $table = "tbl_license";

    public $full_name;
    public $short_name;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        try {
            // Validate required fields
            if (empty($this->full_name) || empty($this->short_name)) {
                return "Missing required fields: full_name, short_name.";
            }

            // Prepare and execute insert query
            $query = "INSERT INTO {$this->table} (full_name, short_name) VALUES (:full_name, :short_name)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":full_name", $this->full_name);
            $stmt->bindParam(":short_name", $this->short_name);

            if ($stmt->execute()) {
                return true;
            } else {
                return "Database error during insert.";
            }
        } catch (PDOException $e) {
            return "Database error: " . $e->getMessage();
        }
    }
    public function getAll() {
        try {
            $query = "SELECT * FROM {$this->table}";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Database error: " . $e->getMessage();
        }
    }

    
}


class LicensePermitted {
    private $conn;
    private $table = "tbl_licence_permitted";

    public $school_id;
    public $center_id;
    public $license_id;
    public $status = 1; // Default status is active

    public function __construct($db) {
        $this->conn = $db;
    }

   public function create() {
    try {
        // Validate required fields
        if (empty($this->license_id) || empty($this->center_id)) {
            return "Missing required fields: license_id, center_id.";
        }
        if (empty($this->school_id)) {
            return "Missing required field: school_id.";
        }

        // Check if the combination already exists
        $checkQuery = "SELECT COUNT(*) FROM {$this->table} 
                       WHERE school_id = :school_id AND center_id = :center_id AND license_id = :license_id";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bindParam(":school_id", $this->school_id);
        $checkStmt->bindParam(":center_id", $this->center_id);
        $checkStmt->bindParam(":license_id", $this->license_id);
        $checkStmt->execute(); 
        $count = $checkStmt->fetchColumn();

        if ($count > 0) {
            return "already exists.";
        }

        // Insert new record
        $query = "INSERT INTO {$this->table} 
                  (school_id, center_id, license_id, status) 
                  VALUES (:school_id, :center_id, :license_id, :status)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":school_id", $this->school_id);
        $stmt->bindParam(":center_id", $this->center_id);
        $stmt->bindParam(":license_id", $this->license_id);
        $stmt->bindParam(":status", $this->status); 

        if ($stmt->execute()) {
            return true;
        } else {
            return "Database error during insert.";
        }
    } catch (PDOException $e) {
        return "Database error: " . $e->getMessage();
    }
}
    public function getAll() {
        try {
            $query = "SELECT * FROM {$this->table}";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Database error: " . $e->getMessage();
        }
    }
  
 
}