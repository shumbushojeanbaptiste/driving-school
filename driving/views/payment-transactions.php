<?php
// filepath: c:\xampp\htdocs\www.driving.rw\driving\views\payment-transactions.php
?>
<div class="my-3 my-md-5">
  <div class="container">

    <!-- Page Header -->
    <div class="row row-cards row-deck">
      <div class="col-lg-12">
        <div class="card card-aside">
          <div class="card-body d-flex flex-column">
            <h4><a href="#">Payment Transactions | History</a></h4>
            <div class="text-muted">
              View all payment records related to student enrollments, training fees, exam charges, or vehicle usage. Keep track of transaction references and payment status for auditing purposes.
            </div>

            <div class="mt-3">
              <div class="row">
                <div class="col-md-6">
                  <div class="alert alert-success">
                    <strong>Student:</strong>
                    <span id="studentName">NDAYISENGA Yves</span><br>
                    <small>Registered for Category B – Light Vehicle Training</small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="alert alert-info">
                    <strong>Total Paid:</strong>
                    <span id="totalPaid">RWF 150,000</span><br>
                    <small>Across 3 completed payments</small>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Payment History Table -->
    <div class="row row-cards row-deck mt-4">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Payment History</h3>
          </div>
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Reference No.</th>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>Purpose</th>
                  <th>Method</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>PAY-2400711-01</td>
                  <td>2025-07-11</td>
                  <td>RWF 50,000</td>
                  <td>Registration Fee</td>
                  <td>Mobile Money</td>
                  <td><span class="badge badge-success">Paid</span></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>PAY-2400712-02</td>
                  <td>2025-07-12</td>
                  <td>RWF 70,000</td>
                  <td>Driving Lessons</td>
                  <td>Bank Transfer</td>
                  <td><span class="badge badge-success">Paid</span></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>PAY-2400713-03</td>
                  <td>2025-07-13</td>
                  <td>RWF 30,000</td>
                  <td>Exam Fee</td>
                  <td>Cash</td>
                  <td><span class="badge badge-success">Paid</span></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>PAY-2400714-04</td>
                  <td>2025-07-14</td>
                  <td>RWF 25,000</td>
                  <td>Vehicle Practice Booking</td>
                  <td>Mobile Money</td>
                  <td><span class="badge badge-warning">Pending</span></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>PAY-2400715-05</td>
                  <td>2025-07-15</td>
                  <td>RWF 10,000</td>
                  <td>Late Attendance Penalty</td>
                  <td>Cash</td>
                  <td><span class="badge badge-danger">Failed</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
