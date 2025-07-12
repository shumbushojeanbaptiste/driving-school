<div class="my-3 my-md-5">
          <div class="container">
            <div class="page-header">
              <h1 class="page-title">
                User accessibility
              </h1>
            </div>
      
       <div class="row row-cards row-deck">



  <!-- Admin Access Card (conditional - only shows for admin users) -->
  <div class="col-lg-6" style="display: none;" id="adminCard">
    <div class="card card-aside">
      <div class="card-body d-flex flex-column">
        <h4><a href="#">Administrator Controls</a></h4>
        <div class="text-muted">
          Manage all school operations, approve instructor reports, 
          handle billing and payments, and configure system settings.
        </div>
        <div class="d-flex align-items-center pt-5 mt-auto">
          <div class="avatar avatar-md mr-3" style="background-image: url(demo/faces/female/25.jpg)"></div>
          <div>
            <a href="./profile.html" class="text-default">Admin Portal</a>
            <small class="d-block text-muted">Last login: 15 minutes ago</small>
          </div>
          <div class="ml-auto">
            <span class="badge badge-danger">5 Alerts</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Vehicle Management Card (for instructors/admins) -->
  <div class="col-lg-6" style="display: none;" id="vehicleCard">
    <div class="card card-aside">
      <div class="card-body d-flex flex-column">
        <h4><a href="#">Vehicle Management</a></h4>
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
  </div>
</div>

<script>
// This would be replaced with actual role-checking logic from your backend
// For demo purposes, we'll simulate an admin user
document.addEventListener('DOMContentLoaded', function() {
  const userRole = 'admin'; // This would come from your authentication system
  
  if(userRole === 'admin' || userRole === 'instructor') {
    document.getElementById('vehicleCard').style.display = 'block';
  }
  
  if(userRole === 'admin') {
    document.getElementById('adminCard').style.display = 'block';
  }
}); 
</script> 
            <div class="row row-cards row-deck">
             
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Account(s)</h3>
                    <div class="col-auto">
                  <a href="javascript:void(0)" class="btn btn-outline-primary btn-sm"><i class="fe fe-plus"></i>  create new</a>
                </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap table-hover">
                      <thead>
                        <tr>
                          <th class="w-1">User-code.</th>
                          
                          <th>Names</th>
                          <th>Email</th>
                          <th>Phone number</th>
                          <th>Schools </th>
                          <th>Role</th>
                         <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                     <?php   
$apiUrl = $baseUrl . "/_api/auth/list"; 
// Fetch data
$response = @file_get_contents($apiUrl);
if ($response === false) {
    echo '<tr><td colspan="8" class="text-center text-danger">Unable to fetch data from API.</td></tr>';
    $data = [];
} else {
    $data = json_decode($response, true);
    if (empty($data)) {
        echo '<tr><td colspan="8" class="text-center text-warning">No user data available.</td></tr>';
        $data = [];
    }
}
$i = 0;
foreach ($data as $user) {
    $i++;
    $rowClass = ($user['status'] == 0) ? 'table-danger' : '';
?>
    <tr class="<?php echo $rowClass; ?>">
        <td><span class="text-muted">#00<?php echo $i; ?></span></td>
        <td><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></td>
        <td><span class="text-muted"><?php echo $user['email']; ?></span></td>
        <td><span class="text-muted"><?php echo $user['phone']; ?></span></td>
        <td><?php echo $user['school_full_name']; ?> | <?php echo $user['center_name']; ?></td>
        <td><?php echo $user['role_name']; ?></td>
        <td></td>
        <td>
            <a class="icon" href="javascript:void(0)">
                <i class="fe fe-unlock"></i>
            </a>
            <a class="icon" href="javascript:void(0)">
                <i class="fe fe-edit"></i>
            </a>
            <a class="icon" href="javascript:void(0)">
                <i class="fe fe-trash"></i>
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
<div class="modal" id="createUserModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <form id="createUserForm">
        <div class="modal-header">
          <h5 class="modal-title">Create New User</h5>
          <button type="button" class="close" onclick="closeCreateModal()">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Center ID</label>
            <input type="number" name="center_id" class="form-control" required>
          </div>
          <div class="form-group">
            <label>School ID</label>
            <input type="number" name="school_id" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Role ID</label>
            <input type="text" name="role_id" class="form-control" required>
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
