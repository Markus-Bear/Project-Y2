<!--
    Name of screen: 	home.html.php
    Purpose of screen: 	This is the main menu of the website.
    Student ID:			C00166672
    Name:				Mark Mukiiza
    Date Written:		March 2025
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <!-- Burger icon that will toggle the sidebar -->
  <div class="burger-menu">&#9776;</div>
  <div class="page-header">
    <h1>Main Menu</h1>
    <a href="home.html.php"><img src="C2PLogoNew.png" alt="C2P Hotel Logo" class="logo"></a>
  </div>
	<!-- Sidebar navigation -->
	<?php include 'sidebar.php'; ?>
  <div class="content">
    <div class="card">
      <div class="menu-item">
        <a href="checkin-checkout/checkin-checkout.html">
          <img src="icons/checkin-out.png" alt="Check In Check Out Menu Icon" class="menu-icon">
          <div class="menu-text">
            <h3 class="menu-title">Check-in/Check-out</h3>
            <p class="menu-subtitle">Menu for managing guest arrivals and departures</p>
          </div>
        </a>
      </div>
      <div class="menu-item">
        <a href="extra/extras.html.php">
          <img src="icons/extras.png" alt="Extras Menu Icon" class="menu-icon">
          <div class="menu-text">
            <h3 class="menu-title">Extras</h3>
            <p class="menu-subtitle">Menu for managing guest spending in the hotel</p>
          </div>
        </a>
      </div>
      <div class="menu-item">
        <a href="stockcontrol/stock_control.html.php">
          <img src="icons/stock-control.png" alt="Stock Control Menu Icon" class="menu-icon">
          <div class="menu-text">
            <h3 class="menu-title">Stock Control</h3>
            <p class="menu-subtitle">Menu for managing stock room, ordering new stock and recording receipt of goods
              from orders.</p>
          </div>
        </a>
      </div>
      <div class="menu-item">
        <a href="filemaintenance/file_maintenance.html.php">
          <img src="icons/file-maintenance.png" alt="File Maintenance Menu Icon" class="menu-icon">
          <div class="menu-text">
            <h3 class="menu-title">File Maintenance</h3>
            <p class="menu-subtitle">Menu for managing staff, stock, guest and rooms</p>
          </div>
        </a>
      </div>
      <div class="menu-item">
        <a href="construction.html.php">
          <img src="icons/reports.png" alt="Reports Menu Icon" class="menu-icon">
          <div class="menu-text">
            <h3 class="menu-title">Reports</h3>
            <p class="menu-subtitle">Menu for generating and managing reports</p>
          </div>
        </a>
      </div>
      <div class="menu-item">
        <a href="login.html">
          <img src="icons/leave.png" alt="Exit Menu Icon" class="menu-icon">
          <div class="menu-text">
            <h3 class="menu-title">Exit</h3>
            <p class="menu-subtitle">Log out of the system</p>
          </div>
        </a>
      </div>
    </div>
  </div>
  <script src="sidebar.js"></script>
</body>
</html>