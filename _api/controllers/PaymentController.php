<?php
require_once './models/Payments.php';
require_once './config/database.php';
require_once './core/Response.php';

class PaymentController {
    private $payment;

    public function __construct() {
        $db = (new Database())->connect();
        $this->payment = new Payments($db);
    }

    public function registerPayment() {
        try {
            $data = json_decode(file_get_contents("php://input"), true);

            // Set payment properties
            $this->payment->stu_code = $data['stu_code'];
            $this->payment->school_id = $data['school_id'];
            $this->payment->center_id = $data['center_id'];
            $this->payment->phone = $data['phone'];
            $this->payment->amount = $data['amount'];
            $this->payment->due_date = isset($data['due_date']) ? $data['due_date'] : date('Y-m-d');
            
            // Call registerPayment method
            $result = $this->payment->registerPayment();

            if ($result) {
                Response::json(["message" => "Payment registered successfully.", "transaction_code" => $result], 201);
            } else {
                Response::json(["error" => "Failed to register payment."], 400);
            }
        } catch (Exception $e) {
            Response::json(["error" => "Server error", "details" => $e->getMessage()], 500);
        }
    }
    public function getAllPayments() {
        try {
            $payments = $this->payment->getAllPayments();
            if ($payments) {
                Response::json($payments, 200);
            } else {
                Response::json(["message" => "No payments found."], 404);
            }
        } catch (Exception $e) {
            Response::json(["error" => "Server error", "details" => $e->getMessage()], 500);
        }
    }
    public function getPaymentById() {
        $data = json_decode(file_get_contents("php://input"), true);
        $center_id = isset($data['center_id']) ? $data['center_id'] : null;
        try {
            $payment = $this->payment->getPaymentById($center_id);
            if ($payment) {
                Response::json($payment, 200);
            } else {
                Response::json(["message" => "Payment not found."], 404);
            }
        } catch (Exception $e) {
            Response::json(["error" => "Server error", "details" => $e->getMessage()], 500);
        }
    }
}