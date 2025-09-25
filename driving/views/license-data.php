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
                <small>Light vehicles - Private cars, vans, and small pickups up to 3.5 tons.</small>
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
                   <div class="col-auto">
                  <a href="javascript:void(0)" class="btn btn-outline-primary btn-sm"><i class="fe fe-plus"></i>  create new</a>
                    </div>
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

<!-- Add this modal just before the closing </div> of your main container -->
<div class="modal" id="createLicenseModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <form id="createLicenseForm">
        <div class="modal-header">
          <h5 class="modal-title">Create New License</h5>
          <button type="button" class="close" onclick="closeCreateModal()">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name"  class="form-control" required placeholder="e.g. Motorcycles">
          </div>
          <div class="form-group">
            <label>Short Name</label>
            <input type="text" name="short_name" class="form-control" required placeholder="e.g. A">
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea row="3" type="text" name="description" class="form-control" placeholder="e.g. Authorizes the holder to drive motorcycles."></textarea>
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
    document.getElementById('createLicenseModal').style.display = 'block';
});
function closeCreateModal() {
    document.getElementById('createLicenseModal').style.display = 'none';
}

// Handle form submit
document.getElementById('createLicenseForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = e.target;
    const payload = {
        full_name: form.full_name.value,
        short_name: form.short_name.value,
        description: form.description.value
    };
    fetch('../_api/settings/license/new', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(payload)
    })
    .then(response => response.json())
    .then(data => {
        alert('License created!');
        closeCreateModal();
        location.reload();
    })
    .catch(error => {
        alert('Error creating license');
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

