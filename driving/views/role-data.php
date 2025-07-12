<div class="my-3 my-md-5">
    <div class="container">
        
<div class="row row-cards row-deck">
  <div class="col-lg-12">
    <div class="card card-aside">
      <div class="card-body d-flex flex-column">
        <h4><a href="#">Authorization and Role Management</a></h4>
        <div class="text-muted">
          Manage user permissions, configure role-based access controls, 
          and oversee security settings for your driving school system.
        </div>
        
        <div class="mt-3">
          <div class="row">
            <div class="col-md-6">
              <div class="alert alert-info">
                <strong>Current Role:</strong> 
                <span id="currentRole">Administrator</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="alert alert-secondary">
                <strong>Permissions:</strong> 
                <span id="currentPermissions">Full system access</span>
              </div>
            </div>
          </div>
        </div>

        
      </div>
    </div>
  </div>
</div>

<script>
// Example role-based UI updates
document.addEventListener('DOMContentLoaded', function() {
  // This would come from your authentication system
  const userRoles = {
    role: 'Administrator',
    permissions: [
      'User Management',
      'Role Configuration',
      'System Settings',
      'Audit Logs'
    ]
  };

  document.getElementById('currentRole').textContent = userRoles.role;
  document.getElementById('currentPermissions').textContent = userRoles.permissions.join(', ');
});
</script>
 
            <div class="row row-cards row-deck">
             
              <div class="col-6">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Role(s) | Privileges</h3>
                    <div class="col-auto">
                  <a href="javascript:void(0)" class="btn btn-outline-primary btn-sm"><i class="fe fe-plus"></i>  create new</a>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap table-hover">
                      <thead>
                        <tr>
                          <th class="w-1">role-code.</th>
                          
                          <th>role name</th>
                          <th>Privileges</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                     <?php   
$apiUrl = $baseUrl . "/_api/settings/role/list";
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
    $rowClass = ($role['role_id'] == 1) ? 'table-success' : '';
?>
    <tr class="<?php echo $rowClass; ?>">
        <td><span class="text-muted">#00<?php echo $i; ?></span></td>
        <td><?php echo htmlspecialchars($role['role_name']); ?></td>
        <td><?php echo htmlspecialchars($role['role_name']); ?></td>
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

<div class="col-6">

 <div class="col-lg-12">
    <div class="card card-aside">
      <div class="card-body d-flex flex-column">
        <h4><a href="#">Role assignation based on this Management</a></h4>
        <div class="text-muted">
          Check vehicle availability, schedule maintenance, 
          and view inspection reports for all training vehicles.
        </div>
        <div class="d-flex align-items-center pt-5 mt-auto">
          <div class="avatar avatar-md mr-3" style="background-color: #467fcf">
            <i class="fe fe-car" style="font-size: 1.5rem; color: white;"></i>
          </div>
          <div>
            <a href="./vehicles.html" class="text-default">Fleet Management</a>
            <small class="d-block text-muted">2 vehicles due for service</small>
          </div>
          <div class="ml-auto">
            <span class="badge badge-info">3 Available</span>
          </div>
        </div>
      </div>
   </div>

     <div class="card card-aside">
      <div class="card-body d-flex flex-column">
        <h4><a href="#">Verification based authentication</a></h4>
        <div class="text-muted">
        Check user availability, schedule maintenance,
          and view inspection reports for all users. Manage authentication methods, enable two-factor verification, and monitor login activities for enhanced security.
        </div>
        <div class="d-flex align-items-center pt-5 mt-auto">
          <div class="avatar avatar-md mr-3" style="background-color: #46cf7bff">
            <i class="fe fe-car" style="font-size: 1.5rem; color: white;"></i>
          </div>
          <div>
            <a href="./vehicles.html" class="text-default">Account Management</a>
            <small class="d-block text-muted">2 vehicles due for service</small>
          </div>
          <div class="ml-auto">
            <span class="badge badge-danger">3 Available</span>
          </div>
        </div>
      </div>
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
