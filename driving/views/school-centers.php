<div class="my-3 my-md-5">
  <div class="container">

    <div class="row row-cards row-deck">
      <div class="col-lg-12">
        <div class="card card-aside">
          <div class="card-body d-flex flex-column">
            <h4><a href="#">Driving School Centers</a></h4>
            <div class="text-muted">
              View current driving school and center information.
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
            <h3 class="card-title">Center Location | Information</h3>
            <div class="col-auto">
              <a href="javascript:void(0)" class="btn btn-outline-primary btn-sm"><i class="fe fe-plus"></i> create new</a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap table-hover">
              <thead>
                <tr>
                  <th class="w-1">#</th>
                  <th class="w-1">center-code</th>

                  <th>center name</th>

                  <th>Phone number</th>
                  <th>Location Address</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $apiUrl = $baseUrl . "/_api/centers/list";
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
                foreach ($data as $center) {
                  $i++;
                  $rowClass = ($center['center_id'] == 6) ? '' : '';
                ?>
                  <tr class="<?php echo $rowClass; ?>">
                    <td><span class="text-muted"><?php echo $i; ?></span></td>
                    <td><span class="text-muted"><strong><?php echo htmlspecialchars($center['center_code']); ?></strong></span></td>
                    <td><?php echo htmlspecialchars($center['center_name']); ?></td>

                    <td><?php echo htmlspecialchars($center['center_phone']); ?></td>
                    <td><?php echo htmlspecialchars($center['center_address']); ?></td>
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
<div class="modal" id="createCenterModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <form id="createCenterForm">
        <div class="modal-header">
          <h5 class="modal-title">Create New School Center</h5>
          <button type="button" class="close" onclick="closeCreateModal()">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Center Name</label>
            <input type="text" name="center_name" class="form-control" placeholder="e.g MUHIMA AUTO ECOLE" required>
          </div>
          <div class="form-group">
            <label>Center Phone</label>
            <input type="number" name="center_phone" class="form-control" placeholder="e.g 078653..." required>
          </div>
          <div class="form-group">
            <label>Center Code</label>
            <input type="text" name="center_code" class="form-control" placeholder="e.g C12345" required>
          </div>

          <div class="form-group">
            <label>Center Address</label>
            <textarea type="text" name="center_address" class="form-control" placeholder="REMERA KN 307 ST" required></textarea>
          </div>
          <div class="form-group">
            <label>Center Origin</label>
            <input type="text" name="center_orgin" class="form-control" placeholder="e.g Governmental">
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Province</label>
                <input type="number" name="province_id" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>District</label>
                <input type="number" name="district_id" class="form-control">  
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Sector</label>
                <input type="number" name="sector_id" class="form-control">     
                </div>
              </div>
            <div class="col-md-6">
              <div class="form-group">    
                <label>Cell</label>
                <input type="number" name="cell_id" class="form-control">
                </div>
              </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Village</label>
                <input type="number" name="village_id" class="form-control">  
                </div>
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
    document.getElementById('createCenterModal').style.display = 'block';
  });

  function closeCreateModal() {
    document.getElementById('createCenterModal').style.display = 'none';
  }

  // Handle form submit
  document.getElementById('createCenterForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = e.target;
    const payload = {
      center_name: form.center_name.value,
      center_orgin: form.center_orgin.value,
      center_code: form.center_code.value,
      center_address: form.center_address.value,
      province_id: form.province_id.value,
      district_id: form.district_id.value,
      sector_id: form.sector_id.value,
      cell_id: form.cell_id.value,
      village_id: form.village_id.value,
      center_phone: form.center_phone.value
    };
    fetch('../_api/centers/register', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(payload)
      })
      .then(response => response.json())
      .then(data => {
        alert('Center created!');
        closeCreateModal();
        location.reload();
      })
      .catch(error => {
        alert('Error creating center');
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