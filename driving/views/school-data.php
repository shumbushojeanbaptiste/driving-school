<div class="my-3 my-md-5">
    <div class="container">
        
<div class="row row-cards row-deck">
  <div class="col-lg-12">
    <div class="card card-aside">
      <div class="card-body d-flex flex-column">
        <h4><a href="#">School and Location Management</a></h4>
        <div class="text-muted">
          View current school and center information.
          Manage school-related information for your driving school system.
        </div>
        
        <div class="mt-3">
          <div class="row">
            <div class="col-md-6">
              <div class="alert alert-success">
                <strong>Center and permitted vehicle type:</strong> 
                <span id="currentRole">Type B</span><br>
                <small>Light vehicles – Private cars, vans, and small pickups up to 3.5 tons.</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="alert alert-primary">
                <strong>Permitted category:</strong> 
                <span id="currentPermissions">Authorizes the holder to drive personal or commercial vehicles under 3.5 tons.</span>
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
                    <h3 class="card-title">School Location | Information</h3>
                 <div class="col-auto">
                  <a href="javascript:void(0)" class="btn btn-outline-primary btn-sm"><i class="fe fe-plus"></i>  create new</a>
                </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap table-hover">
                      <thead>
                        <tr>
                        <th class="w-1">#</th>
                          <th class="w-1">referal-code</th>

                          <th>school name</th>
                          <th>Email Address</th>
                          <th>Phone number</th>
                          <th>Location Address</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                     <?php   
$apiUrl = $baseUrl . "/_api/schools/get";
// Fetch data
$response = @file_get_contents($apiUrl);
if ($response === false) {
    echo '<tr><td colspan="5" class="text-center text-danger">Unable to fetch data from API.</td></tr>';
    $data = [];
} else {
    $json = json_decode($response, true);
    // Expecting: { "data": [ ... ] }
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
foreach ($data as $school) {
    $i++;
    $rowClass = ($school['school_id'] == 6) ? '' : '';
?>
    <tr class="<?php echo $rowClass; ?>">
        <td><span class="text-muted"><?php echo $i; ?></span></td>
        <td><span class="text-muted"><strong><?php echo htmlspecialchars($school['referal_code']); ?></strong></span></td>
        <td><?php echo htmlspecialchars($school['school_full_name'])." | ".$school['school_short_name']; ?></td>
        <td><?php echo htmlspecialchars($school['email']); ?></td>
        <td><?php echo htmlspecialchars($school['phone']); ?></td>
        <td><?php echo htmlspecialchars($school['address']); ?></td>
        <td></td>
        <td>
        
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


<script>
// Show modal when "create new" button is clicked
document.querySelector('.btn-outline-primary').addEventListener('click', function() {
    document.getElementById('createUserModal').style.display = 'block';
});
function closeCreateModal() {
    document.getElementById('createUserModal').style.display = 'none';
}

// Handle form submit
document.getElementById('createUserForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = e.target;
    const payload = {
        first_name: form.first_name.value,
        last_name: form.last_name.value,
        email: form.email.value,
        phone: form.phone.value,
        center_id: form.center_id.value,
        school_id: form.school_id.value,
        role_id: form.role_id.value
    };
    fetch('../_api/auth/register', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(payload)
    })
    .then(response => response.json())
    .then(data => {
        alert('User created!');
        closeCreateModal();
        location.reload();
    })
    .catch(error => {
        alert('Error creating user');
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
