<?php
// filepath: c:\xampp\htdocs\www.driving.rw\driving\views\examination-trainings.php
?>
<div class="my-3 my-md-5">
  <div class="container">

    <!-- Page Title and Overview -->
    <div class="row row-cards row-deck">
      <div class="col-lg-12">
        <div class="card card-aside">
          <div class="card-body d-flex flex-column">
            <h4><a href="#">Student Training Session | Online Learning</a></h4>
            <div class="text-muted">
              Track beginner driver participation in online theory sessions, simulation exercises, and virtual assessments.
              Ensure that students complete mandatory e-learning modules as part of their driving curriculum.
            </div>

            <div class="mt-3">
              <div class="row">
                <div class="col-md-6">
                  <div class="alert alert-success">
                    <strong>Higest performer:</strong>
                    <span id="studentName">HABYARIMANA Patrick</span><br>
                    <small>Enrolled in Theory Training – Category B</small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="alert alert-primary">
                    <strong>Online Module Status:</strong>
                    <span id="moduleStatus">Completed 3 / 6</span><br>
                    <small>Last accessed: July 10, 2025</small>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Training Module Progress Table -->
    <div class="row row-cards row-deck mt-4">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">E-Learning Module Progress</h3>
          </div>
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Module Name</th>
                  <th>Category</th>
                  <th>Status</th>
                  <th>Completed On</th>
                  <th>Score</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Introduction to Road Safety</td>
                  <td>Theory</td>
                  <td><span class="badge badge-success">Completed</span></td>
                  <td>2025-07-08</td>
                  <td>85%</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Traffic Signs & Signals</td>
                  <td>Theory</td>
                  <td><span class="badge badge-success">Completed</span></td>
                  <td>2025-07-09</td>
                  <td>90%</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Basic Vehicle Control</td>
                  <td>Simulation</td>
                  <td><span class="badge badge-success">Completed</span></td>
                  <td>2025-07-10</td>
                  <td>78%</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Hazard Perception</td>
                  <td>Simulation</td>
                  <td><span class="badge badge-warning">In Progress</span></td>
                  <td>-</td>
                  <td>-</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Night Driving Safety</td>
                  <td>Theory</td>
                  <td><span class="badge badge-secondary">Not Started</span></td>
                  <td>-</td>
                  <td>-</td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Mock Exam – Final Test</td>
                  <td>Assessment</td>
                  <td><span class="badge badge-secondary">Not Started</span></td>
                  <td>-</td>
                  <td>-</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<div class="row row-cards row-deck mt-4">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Instructor Information</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="alert alert-info">
              <strong>Instructor Name:</strong>
              <span id="instructorName">John Doe</span><br>
              <small>Specialization: Road Safety</small>
            </div>
          </div>
          <div class="col-md-6">
            <div class="alert alert-info">
              <strong>Contact Information:</strong>
              <span id="instructorContact">johndoe@example.com</span><br>
              <small>Phone: (123) 456-7890</small>
            </div>
          </div>
        </div>
      </div>