<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Delivery Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
</head>
<?php
$jsonFilePath = 'result.json';

// Read the JSON file contents
$jsonData = file_get_contents($jsonFilePath);

// Decode the JSON data into a PHP associative array
$data = json_decode($jsonData, true);

// Accessing the data
$totalDriversRequired = $data['total_drivers_required'];
$totalCustomers = $data['total_customers'];
$customers = $data['customers'];
$performanceMetrics = $data['performance_metrics'];

?>

<body>
  <aside>
    <img src="./image/Background 2.png" alt="Olivery Logo" class="logo" />
    <ul>
      <aside>
        <img src="./image/Background 2.png" alt="Olivery Logo" class="logo" />
        <ul style="list-style: none; padding: 0">
          <li style="background: #e6e6ee;border-radius: 1rem;">
            <img style="padding-top: 7px;" src="./image/dash.svg" width="20" height="20" alt="Dashboard Icon" />
            <p style="display: inline; padding-top: 2rem;margin-bottom: 2rem;">Dashboard</p>
          </li>
          <li>
            <a href="m/map.html" style="text-decoration: none; color:black">
              <img style="padding-top: 7px;" src="./image/zones.svg" width="20" height="20" alt="Zones Icon" />
              <p style="display: inline; padding-top: 2rem;">Zones/Map</p>
            </a>
          </li>
          <li>
            <a href="driver.php" style="text-decoration: none; color:black">
                <img src="./image/route map.svg" width="20" height="20" alt="Route Icon" />
                <p style="display: inline;">Driver Routes</p>
            </a>
          </li>
          <li>
            <img style="padding-top: 7px;" src="./image/orders.svg" width="20" height="20" alt="Orders Icon" />
            <p style="display: inline; padding-top: 2rem;">Orders</p>
          </li>
          <li>
            <img style="padding-top: 7px;" src="./image/route map.svg" width="20" height="20" alt="Route Icon" />
            <p style="display: inline; padding-top: 2rem;">Route optimization</p>
          </li>
          <li>
            <img style="padding-top: 7px;" src="./image/report.svg" width="20" height="20" alt="Reports Icon" />
            <p style="display: inline; padding-top: 2rem;">Reports</p>
          </li>
          <li>
            <img style="padding-top: 7px;" src="./image/settings.svg" width="20" height="20" alt="Settings Icon" />
            <p style="display: inline; padding-top: 2rem;">Settings</p>
          </li>
          <li>
            <img style="padding-top: 7px;" src="./image/log out.svg" width="20" height="20" alt="Logout Icon" />
            <p style="display: inline; padding-top: 2rem;">Log out</p>
          </li>
        </ul>
      </aside>
    </ul>
  </aside>
  <main>
    <div class="topbar">
        <h2>Dashboard</h2>
          <input type="text" placeholder="Search" class="search-box" />
          <span class="manager-name">Manager</span>
      </div>
    <div class="body">
      <h3>Today's Sales/Insights</h3>
      <p class="subtitle">Sales Summary</p>
      <div class="dashboard-top">
        <div class="left-panel">
          <div class="summary">
            <div class="card pink">
              <div class="icon-bg">
                <img src="./image/Sales Icon.svg" alt="Trending Icon" class="card-icon" />
              </div>
              <h2><?php echo $totalCustomers; ?></h2>
              <p>Total Orders<br /><small>+8% from yesterday</small></p>
            </div>
            <div class="card yellow">
              <div class="icon-bg-yellow">
                <img src="./image/drivers.svg" alt="Driver Icon" class="card-icon" />
              </div>
              <h2><?php echo $totalDriversRequired; ?></h2>
              <p>Required Drivers<br /><small>-5% from yesterday</small></p>
            </div>
            <div class="card light-pink">
              <div class="icon-bg-light-pink">
                <img src="./image/zone.svg" alt="Zones Icon" class="card-icon" />
              </div>
              <h2>25</h2>
              <p>Zones<br /><small>+7% from yesterday</small></p>
            </div>
            <div class="card green">
              <div class="icon-bg-green">
                <img src="./image/trending_up.svg" alt="Orders Icon" class="card-icon" />
              </div>
              <h2><?php echo $performanceMetrics['total_trips_executed']; ?></h2>
              <p>Orders in progress<br /><small>+1.2% from yesterday</small></p>
            </div>
            <div class="card purple">
              <div class="icon-bg-purple">
                <img src="./image/on time.svg" alt="On Time Icon" class="card-icon" />
              </div>
              <h2>184</h2>
              <p>Delivered on time<br /><small>20% from yesterday</small></p>
            </div>
            <div class="card blue">
              <div class="icon-bg-blue">
                <img src="./image/delay.svg" alt="Delayed Icon" class="card-icon" />
              </div>
              <h2><?php echo $customers['late']; ?></h2>
              <p>Delayed orders<br /><small>-0.2% from yesterday</small></p>
            </div>
          </div>
        </div>
        <div class="progress">
          <h3>Progress</h3>
          <!-- <div class="circle">76%</div> -->
          <img src="image/chart-graphic.png" alt="" style="margin-top: 2rem;margin-bottom: 2rem;">
          <small>
            <strong>76%</strong> of Today’s Target Achieved<br />
            <strong>760</strong> out of <strong>1,000</strong> orders delivered
          </small>
        </div>
      </div>
      <div class="map-and-sidecards">
        <div class="map">
          <iframe src="./m/updated_delivery_map.html" width="100%" height="100%" style="border: none"></iframe>
        </div>
        <div class="sidecards">
          <!-- <div class="card">Title</div> -->
          <div class="card">
            Drivers
            <br>
            <small>
              <?php
            echo "Average Deliveries per Driver: " . $performanceMetrics['average_deliveries_per_driver'] . "\n<br>";
            echo "Average Trips per Driver: " . $performanceMetrics['average_trips_per_driver'] . "\n";
            ?>
          </small>
        </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>