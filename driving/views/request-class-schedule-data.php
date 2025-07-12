<?php
// filepath: c:\xampp\htdocs\www.driving.rw\driving\views\request-class-schedule.php
?>
<div class="my-3 my-md-5">
  <div class="container">

    <!-- Page Header -->
    <div class="row row-cards row-deck">
      <div class="col-lg-12">
        <div class="card card-aside">
          <div class="card-body d-flex flex-column">
            <h4><a href="#">Driving School | Request Class Schedule</a></h4>
            <div class="text-muted">
              Submit or manage schedule requests for theory or practical driving lessons. Ensure students are enrolled in available time slots aligned with instructor availability and vehicle capacity.
            </div>

            <div class="mt-3">
              <div class="row">
                <div class="col-md-6">
                  <div class="alert alert-info">
                    <strong>Student Name:</strong>
                    <span id="studentName">Mukamana Josiane</span><br>
                    <small>Currently enrolled in Category B practical training.</small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="alert alert-warning">
                    <strong>Next Session:</strong>
                    <span id="nextSession">Pending Confirmation</span><br>
                    <small>Awaiting response from instructor for availability.</small>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Class Schedule Request Table -->
    <div class="row row-cards row-deck mt-4">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Requested Class Schedules</h3>
            <div class="col-auto">
              <a href="javascript:void(0)" class="btn btn-outline-primary btn-sm">
                <i class="fe fe-plus"></i> Request New Schedule
              </a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Lesson Type</th>
                  <th>Instructor</th>
                  <th>Status</th>
                  <th>Remarks</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>2025-07-14</td>
                  <td>09:00 AM</td>
                  <td>Theory</td>
                  <td>Jean Habimana</td>
                  <td><span class="badge badge-success">Confirmed</span></td>
                  <td>Arrive 15 minutes early</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>2025-07-15</td>
                  <td>01:30 PM</td>
                  <td>Practical</td>
                  <td>Marie Uwase</td>
                  <td><span class="badge badge-warning">Pending</span></td>
                  <td>Vehicle allocation in progress</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>2025-07-16</td>
                  <td>11:00 AM</td>
                  <td>Theory</td>
                  <td>Jean Habimana</td>
                  <td><span class="badge badge-danger">Rejected</span></td>
                  <td>Instructor unavailable</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
