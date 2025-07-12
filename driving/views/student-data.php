<div class="my-3 my-md-5">
    <div class="container">
        
<div class="row row-cards row-deck">
  <div class="col-lg-12">
    <div class="card card-aside">
      <div class="card-body d-flex flex-column">
        <h4><a href="#">Driving School Beginner Driver | Students</a></h4>
        <div class="text-muted">
          View student registration details and their assigned training categories.
          Monitor beginner drivers' progress and ensure they are assigned to the correct learning path.
        </div>
        
        <div class="mt-3">
          <div class="row">
            <div class="col-md-6">
              <div class="alert alert-success">
                <strong>Latest Highest Category:</strong> 
                <span id="studentName">Jean Baptiste SHUMBUSHO</span><br>
                <small>Registered at Kigali Driving School – Enrolled for light vehicle training (Type E).</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="alert alert-primary">
                <strong>Learning Category:</strong> 
                <span id="learningCategory">Type E</span><br>
                <small>Currently undergoing training for Trucks over 9.5 tons.</small>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>





 
            <div class="row row-cards row-deck">
             
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Beginner Drivers | Informations</h3>
                 <div class="col-auto">
                  <a href="student-registration" class="btn btn-outline-primary btn-sm"><i class="fe fe-plus"></i>  create new</a>
                </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap table-hover">
                      <thead>
                        <tr>
                        <th class="w-1">#</th>
                          <th class="w-1">instructor-code</th>

                          <th>Instructor name</th>
                          
                          <th>Phone number</th>
                          <th>Email</th>
                          <th>ID number</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                     <?php   
$apiUrl = $baseUrl . "/_api/students/list";
// Fetch data
$response = @file_get_contents($apiUrl);
if ($response === false) {
    echo '<tr><td colspan="5" class="text-center text-danger">Unable to fetch data from API.</td></tr>';
    $data = [];
} else {
    $json = json_decode($response, true);
    if (isset($json)) {
        $data = $json;
        if (empty($data)) {
            echo '<tr><td colspan="5" class="text-center text-warning">No role data available.</td></tr>';
        }
    } else {
        echo '<tr><td colspan="5" class="text-center text-warning">Invalid API response.</td></tr>';
        $data = [];
    }
}
$i = 0;
foreach ($data as $student) {
    $i++;
    $rowClass = ($student['status'] == 0) ? 'text-danger' : '';
?>
    <tr class="<?php echo $rowClass; ?>">
        <td><span class="text-muted"><?php echo $i; ?></span></td>
        <td><span class="text-muted"><strong><?php echo htmlspecialchars($student['stu_code']); ?></strong></span></td>
        <td><?php echo htmlspecialchars($student['first_name'])." ".htmlspecialchars($student['familly_name']); ?></td>

        <td><?php echo htmlspecialchars($student['phone']); ?></td>
        <td><?php echo htmlspecialchars($student['email']); ?></td>
        <td><?php echo htmlspecialchars($student['ID_number']); ?></td>
        <td>
           <a class="icon" href="javascript:void(0)">
                <i class="fa fa-envelope text-info"></i>
            </a>
            <a class="icon" href="javascript:void(0)">
                <i class="fe fe-edit text-primary"></i>
            </a>
            <a class="icon text-danger" href="javascript:void(0)">
                <i class="fe fe-trash text-danger"></i>
            </a>
        </td>
    </tr>
<?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>

                
              </div>



        </div>
        </div>

    </div>


