<?php

class Center {
    private $conn;
    private $table = "tbl_centers";

    public $center_name;
    public $center_code;
    public $center_address;
    public $center_phone;
    public $center_orgin;
    public $reg_date;
    public $province_id;
    public $district_id;
    public $sector_id;
    public $cell_id;
    public $village_id;
    public $status=1; // Default status is active

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        try {
            // Validate required fields
            if (empty($this->center_name) || empty($this->center_code) || empty($this->center_address) || empty($this->center_phone)) {
                return "Missing required fields: center_name, center_code, center_address, center_phone.";
            }

            // Check if center_code already exists
            $checkQuery = "SELECT COUNT(*) FROM {$this->table} WHERE center_code = :center_code";
            $checkStmt = $this->conn->prepare($checkQuery);
            $checkStmt->bindParam(":center_code", $this->center_code);
            $checkStmt->execute();
            $count = $checkStmt->fetchColumn();

            if ($count > 0) {
                return "Center code already exists.";
            }

            // Prepare and execute insert query
            $query = "INSERT INTO {$this->table} (center_name, center_code, center_address, center_phone, center_orgin, reg_date, province_id, district_id, sector_id, cell_id, village_id, status) 
            VALUES (:center_name, :center_code, :address, :phone, :center_orgin, :reg_date, :province_id, :district_id, :sector_id, :cell_id, :village_id, :status)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":center_name", $this->center_name);
            $stmt->bindParam(":center_code", $this->center_code);
            $stmt->bindParam(":address", $this->center_address);
            $stmt->bindParam(":phone", $this->center_phone);
            $stmt->bindParam(":center_orgin", $this->center_orgin);
            $stmt->bindParam(":reg_date", $this->reg_date);
            $stmt->bindParam(":province_id", $this->province_id);
            $stmt->bindParam(":district_id", $this->district_id);
            $stmt->bindParam(":sector_id", $this->sector_id);
            $stmt->bindParam(":cell_id", $this->cell_id);
            $stmt->bindParam(":village_id", $this->village_id);
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
    public function update($id) {
        try {
            // Validate required fields
            if (empty($this->center_name) || empty($this->center_code) || empty($this->center_address) || empty($this->center_phone)) {
                return "Missing required fields: center_name, center_code, center_address, center_phone.";
            }

            // Check if center_code already exists for another ID
            $checkQuery = "SELECT COUNT(*) FROM {$this->table} WHERE center_code = :center_code AND center_id != :id";
            $checkStmt = $this->conn->prepare($checkQuery);
            $checkStmt->bindParam(":center_code", $this->center_code);
            $checkStmt->bindParam(":id", $id);
            $checkStmt->execute();
            $count = $checkStmt->fetchColumn();

            if ($count > 0) {
                return "Center code already exists.";
            }

            // Prepare and execute update query
            $query = "UPDATE {$this->table} SET 
                center_name = :center_name, 
                center_code = :center_code, 
                center_address = :address, 
                center_phone = :phone, 
                center_orgin = :center_orgin, 
                reg_date = :reg_date, 
                province_id = :province_id, 
                district_id = :district_id, 
                sector_id = :sector_id, 
                cell_id = :cell_id, 
                village_id = :village_id,
                status = :status
                WHERE center_id = :id";
                
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":center_name", $this->center_name);
            $stmt->bindParam(":center_code", $this->center_code);
            $stmt->bindParam(":address", $this->center_address);
            $stmt->bindParam(":phone", $this->center_phone);
            $stmt->bindParam(":center_orgin", $this->center_orgin);
            $stmt->bindParam(":reg_date", $this->reg_date);
            $stmt->bindParam(":province_id", $this->province_id);
            $stmt->bindParam(":district_id", $this->district_id);
            $stmt->bindParam(":sector_id", $this->sector_id);
            $stmt->bindParam(":cell_id", $this->cell_id);
            $stmt->bindParam(":village_id", $this->village_id);
            $stmt->bindParam(":status", $this->status);
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
}