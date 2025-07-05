<?php
class Instructor {
    private $conn;
    private $table = "tbl_instructors";

    public $instractor_code;
    public $first_name;
    public $last_name;
    public $familly_name;
    public $phone;
    public $ID_number;
    public $email;
    public $interest_rate;
    public $school_id;
    public $reg_date;
    


    public function __construct($db) {
        $this->conn = $db;
    }

   public function create() {
    try {
        // Validate required fields
        if (
            empty($this->instructor_code) || 
            empty($this->first_name) || 
            empty($this->last_name) || 
            empty($this->familly_name) || 
            empty($this->phone) || 
            empty($this->ID_number) || 
            empty($this->email)
        ) {
            return "Missing required fields: instructor_code, first_name, last_name, familly_name, phone, ID_number, email.";
        }

        // Check if ID_number already exists
        $checkQuery = "SELECT COUNT(*) FROM {$this->table} WHERE ID_number = :ID_number";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bindParam(":ID_number", $this->ID_number);
        $checkStmt->execute();
        $count = $checkStmt->fetchColumn();

        if ($count > 0) {
            return "ID_number already exists.";
        }

        // Prepare and execute insert query
        $query = "INSERT INTO {$this->table} 
            (instructor_code, first_name, familly_name, phone, ID_number, email) 
            VALUES 
            (:instructor_code, :first_name, :familly_name, :phone, :ID_number, :email)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":instructor_code", $this->instructor_code);
        $stmt->bindParam(":first_name", $this->first_name);
        $stmt->bindParam(":familly_name", $this->familly_name);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":ID_number", $this->ID_number);
        $stmt->bindParam(":email", $this->email);

        if ($stmt->execute()) {
            return true;
        } else {
            return "Database error during insert.";
        }
    } catch (PDOException $e) {
        return "Database error: " . $e->getMessage();
    }
}
public function assignInstructorToCenter($instructor_id, $center_id) {
    try {
        // Check if the instructor is already assigned to the center
        $query = "SELECT COUNT(*) FROM tbl_school_instructors WHERE instructor_id = :instructor_id AND center_id = :center_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":instructor_id", $instructor_id);
        $stmt->bindParam(":center_id", $center_id);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            return "Instructor is already assigned to this center.";
        }
        // Prepare and execute insert query to assign instructor to center
        $query = "INSERT INTO tbl_school_instructors (instructor_id, center_id, school_id, interest_rate, reg_date) VALUES (:instructor_id, :center_id, :school_id, :interest_rate, :reg_date)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":instructor_id", $instructor_id);
        $stmt->bindParam(":center_id", $center_id);
        $stmt->bindParam(":school_id", $this->school_id);
        $stmt->bindParam(":interest_rate", $this->interest_rate);
        $stmt->bindParam(":reg_date", $this->reg_date);

        // 

        if ($stmt->execute()) {
            return true;
        } else {
            return "Database error during assignment.";
        }
    } catch (PDOException $e) {
        return "Database error: " . $e->getMessage();
    }
}
 
public function update($id) {
    try {
        // Validate required fields
        if (
            empty($this->instructor_code) || 
            empty($this->first_name) || 
            empty($this->last_name) || 
            empty($this->familly_name) || 
            empty($this->phone) || 
            empty($this->ID_number) || 
            empty($this->email)
        ) {
            return "Missing required fields: instructor_code, first_name, last_name, familly_name, phone, ID_number, email.";
        }

        // Check if ID_number already exists for another ID
        $checkQuery = "SELECT COUNT(*) FROM {$this->table} WHERE ID_number = :ID_number AND instructor_id != :id";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bindParam(":ID_number", $this->ID_number);
        $checkStmt->bindParam(":id", $id);
        $checkStmt->execute();
        $count = $checkStmt->fetchColumn();

        if ($count > 0) {
            return "ID_number already exists.";
        }

        // Prepare and execute update query
        $query = "UPDATE {$this->table} SET 
            instructor_code = :instructor_code, 
            first_name = :first_name, 
            familly_name = :familly_name, 
            phone = :phone, 
            ID_number = :ID_number, 
            email = :email 
            WHERE instructor_id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":instructor_code", $this->instructor_code);
        $stmt->bindParam(":first_name", $this->first_name);
        $stmt->bindParam(":familly_name", $this->familly_name);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":ID_number", $this->ID_number);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":id", $id);

        if ($stmt->execute()) {
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
    public function getAssignedInstructors($center_id) {
        try {
            $query = "SELECT * FROM tbl_school_instructors WHERE center_id = :center_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":center_id", $center_id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Database error: " . $e->getMessage();
        }
    }
}
class School_instructor extends Instructor {
    private $conn;
    // Additional properties and methods specific to school instructors can be added here
    public function __construct($db) {
        $this->conn = $db ;
        $this->table = "tbl_school_instructors";
    }
    private function assignInstructor($instructor_id, $center_id) {
        // Call the parent assignInstructorToCenter method
        return parent::assignInstructorToCenter($instructor_id, $center_id);
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
