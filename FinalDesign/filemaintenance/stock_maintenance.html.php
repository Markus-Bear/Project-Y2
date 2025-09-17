<!--Name of screen: 		stock_maintenance.html
	Purpose of screen: 		Contains the stock maintenance menu.
	Student ID:			    C00166672
	Name:				    Mark Mukiiza
	Date Written:		    February 2025
-->
<!DOCTYPE html>
<html>
<head>
  <title>Stock Maintenance</title>
  <link rel="stylesheet" href="../styles.css">
</head>
<body>
<!-- Burger icon that will toggle the sidebar -->
<div class="burger-menu">&#9776;</div>
<div class="page-header">
   <h1>Stock Maintenance Menu</h1>
   <a href="../home.html.php"><img src="../C2PLogoNew.png" alt="C2P Hotel Logo" class="logo"></a>
</div>
<!-- Sidebar navigation -->
<?php include '../sidebar.php'; ?>
  <div class="content">
    <div class="card">
      <div class="menu-item">
        <a href="stock/addstock.html.php">
          <img src="../icons/add-item.png" alt="Add Stock Item Menu Icon" class="menu-icon">
          <div class="menu-text">
            <h3 class="menu-title">Add Stock</h3>
            <p class="menu-subtitle">Menu used to add new stock items to the stock database</p>
          </div>
        </a>
      </div>
      <div class="menu-item">
        <a href="stock/deleteStock.html.php">
          <img src="../icons/delete-item.png" alt="Delete Stock Item Menu Icon" class="menu-icon">
          <div class="menu-text">
            <h3 class="menu-title">Delete Stock</h3>
            <p class="menu-subtitle">Menu used to delete stock items from the stock database</p>
          </div>
        </a>
      </div>
      <div class="menu-item">
        <a href="stock/amendViewStock.html.php">
          <img src="../icons/amend-item.png" alt="Amend/View Stock Item Menu Icon" class="menu-icon">
          <div class="menu-text">
            <h3 class="menu-title">Amend/View Stock</h3>
            <p class="menu-subtitle">Menu used to view or amend stock items in the stock database</p>
          </div>
        </a>
      </div>
      <div class="menu-item">
        <a href="../login.html">
          <img src="../icons/leave.png" alt="Exit Menu Icon" class="menu-icon">
          <div class="menu-text">
            <h3 class="menu-title">Exit</h3>
            <p class="menu-subtitle">Log out of the system</p>
          </div>
        </a>
      </div>
    </div>
  </div>
 <script src="../sidebar.js"></script>
</body>
</html>