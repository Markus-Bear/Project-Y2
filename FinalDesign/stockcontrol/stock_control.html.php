<!--Name of screen: 	stock_control.html
	Purpose of screen: 	Contains the stock control menu.
	Student ID:			C00166672
	Name:				Mark Mukiiza
	Date Written:		February 2025
-->
<!DOCTYPE html>
<html>
<head>
  <title>Stock Control</title>
  <link rel="stylesheet" href="../styles.css">
</head>
<body>
  <!-- Burger icon that will toggle the sidebar -->
  <div class="burger-menu">&#9776;</div>
  <div class="page-header">
    <h1>Stock Control Menu</h1>
    <a href="../home.html.php"><img src="../C2PLogoNew.png" alt="C2P Hotel Logo" class="logo"></a>
  </div>
  <!-- Sidebar navigation -->
<?php include '../sidebar.php'; ?>
  <div class="content">
    <div class="card">
      <div class="menu-item">
        <a href="../construction.html.php">
          <img src="../icons/remove-stock.png" alt="Remove Stock Menu Icon" class="menu-icon">
          <div class="menu-text">
            <h3 class="menu-title">Remove Stock</h3>
            <p class="menu-subtitle">Menu used to record the movement of stock from the stock room to specific locations
              in the hotel</p>
          </div>
        </a>
      </div>
      <div class="menu-item">
        <a href="placeOrders.html.php">
          <img src="../icons/stock-order.png" alt="Place Orders Menu Icon" class="menu-icon">
          <div class="menu-text">
            <h3 class="menu-title">Place Orders</h3>
            <p class="menu-subtitle">Menu for placing stock orders for one or more stock items</p>
          </div>
        </a>
      </div>
      <div class="menu-item">
        <a href="../construction.html.php">
          <img src="../icons/recieve-stock.png" alt="Recieve Orders Menu Icon" class="menu-icon">
          <div class="menu-text">
            <h3 class="menu-title">Receive Orders</h3>
            <p class="menu-subtitle">Menu for keeping track of incoming goods from suppliers</p>
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