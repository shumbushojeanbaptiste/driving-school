<div class="my-3 my-md-5">
    <div class="container">
        
<div class="row row-cards row-deck">
  <div class="col-lg-12">
    <div class="card card-aside">
      <div class="card-body d-flex flex-column">
        <h4><a href="#">License Type and Description</a></h4>
        <div class="text-muted">
          View current license category and its applicable vehicle type. 
          Manage license-related information for your driving school system.
        </div>
        
        <div class="mt-3">
          <div class="row">
            <div class="col-md-6">
              <div class="alert alert-info">
                <strong>License Type:</strong> 
                <span id="currentRole">Type B</span><br>
                <small>Light vehicles – Private cars, vans, and small pickups up to 3.5 tons.</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="alert alert-secondary">
                <strong>Description:</strong> 
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
                    <h3 class="card-title">License type(s) | Driving description</h3>
                   
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap table-hover">
                      <thead>
                        <tr>
                          <th class="w-1">license-code</th>

                          <th>license name</th>
                          <th>Category letter</th>
                          <th>Description</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                     <?php   
$apiUrl = $baseUrl . "/_api/settings/license/list";
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
foreach ($data as $role) {
    $i++;
    $rowClass = ($role['license_id'] == 6) ? 'table-success' : '';
?>
    <tr class="<?php echo $rowClass; ?>">
        <td><span class="text-muted">#00<?php echo $i; ?></span></td>
        <td><?php echo htmlspecialchars($role['full_name']); ?></td>
        <td><?php echo htmlspecialchars($role['short_name']); ?></td>
        <td><?php echo htmlspecialchars($role['description']); ?></td>
        <td></td>
        <td>
        
            <a class="icon" href="javascript:void(0)">
                <i class="fe fe-edit"></i>
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
