<?php
$driverJsonPath = 'driver.json'; // use your correct file name
$driverData = json_decode(file_get_contents($driverJsonPath), true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Driver Route</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
    
  <aside>
    <img src="./image/Background 2.png" alt="Olivery Logo" class="logo" />
    <ul>
      <aside>
        <img src="./image/Background 2.png" alt="Olivery Logo" class="logo" />
        <ul style="list-style: none; padding: 0">
          <li>
            <a href="index.php" style="text-decoration: none; color:black">
                <img style="padding-top: 7px;" src="./image/dash.svg" width="20" height="20" alt="Dashboard Icon" />
                <p style="display: inline; padding-top: 2rem;margin-bottom: 2rem;">Dashboard</p>
            </a>
          </li>
          <li>
            <a href="m/map.html" style="text-decoration: none; color:black">
              <img style="padding-top: 7px;" src="./image/zones.svg" width="20" height="20" alt="Zones Icon" />
              <p style="display: inline; padding-top: 2rem;">Zones/Map</p>
            </a>
          </li>
          <li  style="background: #e6e6ee;border-radius: 1rem;">
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
      <h2>Driver Routes</h2>
      <input type="text" placeholder="Search" class="search-box" />
      <span class="manager-name">Manager</span>
    </div>

    <div class="body">
      <h3 style="margin-bottom: 5px;">Drivers and Their Daily Routes</h3>
      <?php foreach ($driverData as $driver): ?>
        <div class="card" style="margin-bottom: 5px;">
          <h4>Driver ID: <?php echo $driver['driver_id']; ?> | Zone: <?php echo $driver['zone_id']; ?></h4>
          <p>Total Deliveries: <?php echo $driver['total_deliveries']; ?></p>

          <?php foreach ($driver['trips'] as $trip): ?>
            <div class="trip-card">
              <h5>Trip #<?php echo $trip['trip_number']; ?> - Departure: <?php echo $trip['depot_departure_time']; ?></h5>
              <ul style="padding-left: 1rem;">
                <?php foreach ($trip['stops'] as $stop): ?>
                  <li>
                    <strong>Stop #<?php echo $stop['stop_order']; ?>:</strong>
                    <?php echo $stop['customer_name']; ?> |
                    Delivery Time: <?php echo $stop['delivery_time']; ?> |
                    Time Window: <?php echo $stop['time_window']; ?>
                    <br>
                    Location: (<?php echo $stop['latitude']; ?>, <?php echo $stop['longitude']; ?>)
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </main>
</body>

</html>
