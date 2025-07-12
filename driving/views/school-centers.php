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
                    <h3 class="card-title">Center Location | Information</h3>
                  <div class="col-auto">
                  <a href="javascript:void(0)" class="btn btn-outline-primary btn-sm"><i class="fe fe-plus"></i>  create new</a>
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


