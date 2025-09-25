<div class="my-3 my-md-5">
    <div class="container">
        
<div class="row row-cards row-deck">
  <div class="col-lg-12">
    <div class="card card-aside">
      <div class="card-body d-flex flex-column">
        <h4><a href="#">Driving School Instructors</a></h4>
        <div class="text-muted">
          View instructor details and the categories they are licensed to teach.
          Manage instructor assignments and qualifications for your driving school system.
        </div>
        
        <div class="mt-3">
          <div class="row">
            <div class="col-md-6">
              <div class="alert alert-success">
                <strong>Honest Instructor:</strong> 
                <span id="instructorName">Jean Habimana</span><br>
                <small>Assigned to Kigali Driving Center – Specializes in light vehicles (Type B).</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="alert alert-primary">
                <strong>Licensed Categories:</strong> 
                <span id="licensedCategories">Type A, B</span><br>
                <small>Authorized to instruct for motorcycles and light vehicle licenses.</small>
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
                    <h3 class="card-title">School instructors | Informations</h3>
                 <div class="col-auto">
                  <a href="javascript:void(0)" class="btn btn-outline-primary btn-sm"><i class="fe fe-plus"></i>  create new</a>
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
$apiUrl = $baseUrl . "/_api/instructors/list";
// Fetch data
$response = @file_get_contents($apiUrl);
if ($response === false) {
    echo '<tr><td colspan="5" class="text-center text-danger">Unable to fetch data from API.</td></tr>';
    $data = [];
} else {
    $json = json_decode($response, true);
    // Expecting: { "data": [ ... ] }
    if (isset($json['data']) && is_array($json['data'])) {
        $data = $json['data'];
        if (empty($data)) {
            echo '<tr><td colspan="5" class="text-center text-warning">No role data available.</td></tr>';
        }
    } else {
        echo '<tr><td colspan="5" class="text-center text-warning">Invalid API response.</td></tr>';
        $data = [];
    }
}
$i = 0;
foreach ($data as $instructor) {
    $i++;
    $rowClass = ($instructor['instructor_id'] == 6) ? 'text-success' : '';
?>
    <tr class="<?php echo $rowClass; ?>">
        <td><span class="text-muted"><?php echo $i; ?></span></td>
        <td><span class="text-muted"><strong><?php echo htmlspecialchars($instructor['instructor_code']); ?></strong></span></td>
        <td><?php echo htmlspecialchars($instructor['first_name'])." ".htmlspecialchars($instructor['familly_name']); ?></td>

        <td><?php echo htmlspecialchars($instructor['phone']); ?></td>
        <td><?php echo htmlspecialchars($instructor['email']); ?></td>
        <td><?php echo htmlspecialchars($instructor['ID_number']); ?></td>
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

<!-- Add this modal just before the closing </div> of your main container -->
<div class="modal" id="createInstructorModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <form id="createInstructorForm">
        <div class="modal-header">
          <h5 class="modal-title">Create New Instructor</h5>
          <button type="button" class="close" onclick="closeCreateModal()">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Instructor Code</label>
            <input type="text" name="instructor_code" class="form-control" required>
          </div>
          <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required>
          </div>
          <div class="form-group">
            <label>ID No</label>
            <input type="number" name="ID_number" class="form-control" required>
          </div>
          <div class="form-group">
            <label>E-mail</label>
            <input type="email" name="email" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="closeCreateModal()">Cancel</button>
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
// Show modal when "create new" button is clicked
document.querySelector('.btn-outline-primary').addEventListener('click', function() {
    document.getElementById('createInstructorModal').style.display = 'block';
});
function closeCreateModal() {
    document.getElementById('createInstructorModal').style.display = 'none';
}

// Handle form submit
document.getElementById('createInstructorForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = e.target;
    const payload = {
        instructor_code: form.instructor_code.value,
        first_name: form.first_name.value,
        last_name: form.last_name.value,
        phone: form.phone.value,
        ID_number: form.ID_number.value,
        email: form.email.value
    };
    fetch('../_api/instructors/register', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(payload)
    })
    .then(response => response.json())
    .then(data => {
        alert('Instructor created!');
        closeCreateModal();
        location.reload();
    })
    .catch(error => {
        alert('Error creating Instructor');
        console.error(error);
    });
});
</script>

<style>
/* Add this style to make the modal body scrollable */
.modal .modal-body {
    max-height: 60vh;
    overflow-y: auto;
}
</style>
