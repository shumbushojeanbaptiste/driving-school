<?php 
class Payments
{
    private $conn;
    private $table = "tbl_pay_transactions";

    
    public $stu_code;
    public $school_id;
    public $center_id;
    public $phone;
    public $amount;
    public $due_date;

    public $status=1;

    public function __construct($db)
    {
        
        $this->conn = $db;
    }
    public function generateTransCode()
    {
        $this->trans_code = uniqid(date('YmdHis') . '-');
    }
    public function registerPayment()
    {
        try {
           
            $this->generateTransCode();
            // check if all required properties are set
            if (empty($this->trans_code) || empty($this->stu_code) || empty($this->school_id) || empty($this->center_id) || empty($this->phone) || empty($this->amount) || empty($this->due_date)) {
                throw new Exception("All fields are required");
            }
            // check if the transaction code already exists
            $checkQuery = "SELECT COUNT(*) FROM {$this->table} WHERE trans_code = :trans_code";
            $stmt = $this->conn->prepare($checkQuery);
            $stmt->bindParam(':trans_code', $this->trans_code);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            if ($count > 0) {
                throw new Exception("Transaction code already exists");
            }

            $query = "INSERT INTO {$this->table} (trans_code, stu_code, school_id, center_id, phone, amount, paid_date, status) VALUES (:trans_code, :stu_code, :school_id, :center_id, :phone, :amount, :paid_date, :status)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':trans_code', $this->trans_code);
            $stmt->bindParam(':stu_code', $this->stu_code);
            $stmt->bindParam(':school_id', $this->school_id);
            $stmt->bindParam(':center_id', $this->center_id);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':amount', $this->amount);
            $stmt->bindParam(':paid_date', $this->due_date);
            $stmt->bindParam(':status', $this->status);
            $stmt->execute();

            // return the transaction code as response to the client
            return $this->trans_code;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getAllPayments()
    {
        $query = "SELECT * FROM {$this->table} ORDER BY due_date DESC limit 100";
       
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPaymentById($center_id)
    {
        $query = "SELECT * FROM {$this->table} WHERE center_id = :center_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':center_id', $center_id);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            return null; // No payment found for the given center_id
        }
        // Fetch all payments for the given center_id
    

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}