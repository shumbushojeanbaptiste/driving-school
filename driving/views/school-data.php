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
                <small>Light vehicles - Private cars, vans, and small pickups up to 3.5 tons.</small>
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

<!-- Add this modal just before the closing </div> of your main container -->
<div class="modal" id="createSchoolModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <form id="createSchoolForm">
        <div class="modal-header">
          <h5 class="modal-title">Create New User</h5>
          <button type="button" class="close" onclick="closeCreateModal()">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name" class="form-control" required placeholder="e.g., ABC Driving School">
          </div>
          <div class="form-group">
            <label>Short Name</label>
            <input type="text" name="short_name" class="form-control" placeholder="e.g., ABC School">
          </div>
          <div class="form-group">
            <label>Referenced Code</label>
            <input type="text" name="referal_code" class="form-control" placeholder="e.g., ABC123">
          </div>
          <div class="form-group">
            <label>E-mail</label>
            <input type="email" name="email" class="form-control"  placeholder="e.g. abc@gmail.com" required>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="number" name="phone" class="form-control" placeholder="eg. 0788..." required>
          </div>
          <div class="form-group">
            <label>address</label>
            <input type="text" name="address" class="form-control" placeholder="KN 308 ST" required>
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
    document.getElementById('createSchoolModal').style.display = 'block';
});
function closeCreateModal() {
    document.getElementById('createSchoolModal').style.display = 'none';
}

// Handle form submit
document.getElementById('createSchoolForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = e.target;
    const payload = {
        school_full_name: form.full_name.value,
        school_short_name: form.short_name.value,
        referal_code: form.referal_code.value,
        email: form.email.value,
        phone: form.phone.value,
        address: form.address.value
    };
    fetch('../_api/schools/register', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(payload)
    })
    .then(response => response.json())
    .then(data => {
        alert('School created!');
        closeCreateModal();
        location.reload();
    })
    .catch(error => {
        alert('Error creating school');
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
