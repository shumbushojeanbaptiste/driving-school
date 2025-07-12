<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-3 ml-auto">
                <form class="input-icon my-3 my-lg-0">
                  <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
                  <div class="input-icon-addon">
                    <i class="fe fe-search"></i>
                  </div>
                </form>
              </div>
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <?php
$currentRoute = basename($_SERVER['REQUEST_URI']);
?>
                  <li class="nav-item">
                    <a href="dashboard" class="nav-link <?php echo ($currentRoute == 'dashboard') ? 'active' : ''; ?>">
                        <i class="fe fe-home"></i> Home
                    </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link <?php echo ($currentRoute == 'user-access' || $currentRoute == 'role-management' || $currentRoute == 'license-type') ? 'active' : ''; ?>" data-toggle="dropdown">
                        <i class="fe fe-lock"></i> Authentication Settings
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                        <a href="user-access" class="dropdown-item <?php echo ($currentRoute == 'user-access') ? 'active' : ''; ?>">User Access</a>
                        <a href="role-management" class="dropdown-item <?php echo ($currentRoute == 'role-management') ? 'active' : ''; ?>">Role Management</a>
                        <a href="license-type" class="dropdown-item <?php echo ($currentRoute == 'license-type') ? 'active' : ''; ?>">License-type</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link <?php echo ($currentRoute == 'school-list' || $currentRoute == 'school-centers' || $currentRoute == 'instructors') ? 'active' : ''; ?>" data-toggle="dropdown"><i class="fe fe-box"></i> Driving School</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="school-list" class="dropdown-item <?php echo ($currentRoute == 'school-list') ? 'active' : ''; ?>"> School(s) Registration</a>
                      <a href="school-centers" class="dropdown-item <?php echo ($currentRoute == 'school-centers') ? 'active' : ''; ?>">School Center(s)</a>
                      <a href="instructors" class="dropdown-item <?php echo ($currentRoute == 'instructors') ? 'active' : ''; ?>">Instructor(s)</a>
                     
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link <?php echo ($currentRoute == 'student-registration' || $currentRoute == 'student-list' || $currentRoute == 'student-classes' || $currentRoute == 'student-reports') ? 'active' : ''; ?>" data-toggle="dropdown"><i class="fe fe-users"></i> Students Management</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="student-registration" class="dropdown-item <?php echo ($currentRoute == 'student-registration') ? 'active' : ''; ?>">Registration</a>
                      <a href="student-list" class="dropdown-item <?php echo ($currentRoute == 'student-list') ? 'active' : ''; ?>">Student List</a>
                      <a href="student-classes" class="dropdown-item <?php echo ($currentRoute == 'student-classes') ? 'active' : ''; ?>">Classes</a>
                      <a href="attendance-mngt" class="dropdown-item <?php echo ($currentRoute == 'attendance-mngt') ? 'active' : ''; ?>">Attendance</a>
                    </div>
                  </li>
                
                  
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link <?php echo ($currentRoute == 'examination-trainings' || $currentRoute == 'request-exam-code' || $currentRoute == 'request-class-schedule' || $currentRoute == 'request-attendance-result') ? 'active' : ''; ?>" data-toggle="dropdown"><i class="fe fe-list"></i> online services</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="examination-trainings" class="dropdown-item <?php echo ($currentRoute == 'examination-trainings') ? 'active' : ''; ?>">Examination trainings</a>

                      <a href="request-class-schedule" class="dropdown-item <?php echo ($currentRoute == 'request-class-schedule') ? 'active' : ''; ?>">Request for class schedule</a>
                      <a href="attendance-mngt" class="dropdown-item <?php echo ($currentRoute == 'attendance-mngt') ? 'active' : ''; ?>">Request for attendance result</a>
                       <a href="payment-fee" class="dropdown-item <?php echo ($currentRoute == 'payment-fee') ? 'active' : ''; ?>"><i class="fe fe-check-square"></i> Payment</a>
                    </div>
                  </li>
                   </li>
                    <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link <?php echo ($currentRoute == 'school-and-centers' || $currentRoute == 'student-instructor' || $currentRoute == 'invoice-and-payments' || $currentRoute == 'license-certificate') ? 'active' : ''; ?>" data-toggle="dropdown"><i class="fe fe-bar-chart"></i> Analytics and Reports</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="school-and-centers" class="dropdown-item <?php echo ($currentRoute == 'school-and-centers') ? 'active' : ''; ?>">School and centers</a>
                      <a href="student-instructor" class="dropdown-item <?php echo ($currentRoute == 'student-instructor') ? 'active' : ''; ?>">Students and Instructors</a>
                      <a href="invoice-and-payments" class="dropdown-item <?php echo ($currentRoute == 'invoice-and-payments') ? 'active' : ''; ?>">Invoice and Payments</a>
                      <a href="license-certificate" class="dropdown-item <?php echo ($currentRoute == 'license-certificate') ? 'active' : ''; ?>">License certificate</a>

                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>