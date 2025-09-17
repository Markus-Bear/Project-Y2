<!DOCTYPE html>
<html>

<head>
    <title>File Maintenance</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
<!-- Burger icon that will toggle the sidebar -->
  <div class="burger-menu">&#9776;</div>
  <div class="page-header">
    <h1>File Maintenance Menu</h1>
    <a href="../home.html.php"><img src="../C2PLogoNew.png" alt="C2P Hotel Logo" class="logo"></a>
  </div>
  <div class="sidebar">
    <!-- Dropdown: Main Menu -->
    <div class="dropdown" id="mainMenu">
      <a href="../home.html">
        <img src="../icons/main-menu.png" alt="Main Menu Sidebar Icon" class="icon">
        Main Menu
      </a>
      <div class="dropdown-content">
        <a href="checkin-checkout/"><img src="../icons/checkin-out.png" alt="Check In Check Out Menu Icon"
            class="icon">
          Check-in/Check-out</a>
        <a href="extras/"><img src="../icons/extras.png" alt="Extras Menu Icon" class="icon">
          Extras</a>
        <a href="../stockcontrol/stock_control.html"><img src="../icons/stock-control.png" alt="Stock Control Menu Icon"
            class="icon">
          Stock Control</a>
        <a href="file_maintenance.html"><img src="../icons/file-maintenance.png" alt="File Maintenance Menu Icon"
            class="icon">
          File Maintenance</a>
        <a href="../construction.html"><img src="../icons/reports.png" alt="Reports Menu Icon" class="icon">
          Reports</a>
      </div>
    </div>
    <!-- Dropdown: Staff Maintenance -->
    <div class="dropdown" id="staffMaintenance">
      <a href="staff_maintenance.html">
        <img src="../icons/staff.png" alt="Staff Maintenance Sidebar Menu Icon" class="icon">
        Staff Maintenance
      </a>
      <div class="dropdown-content">
        <a href="staff/"><img src="../icons/add.png" alt="Add Sidebar Icon" class="icon">Add Staff</a>
        <a href="staff/"><img src="../icons/delete.png" alt="Delete Sidebar Icon" class="icon">Delete
          Staff</a>
        <a href="staff/"><img src="../icons/amend.png" alt="Amend Sidebar Icon" class="icon">Amend/View
          Staff</a>
      </div>
    </div>
    <!-- Dropdown: Stock Maintenance -->
    <div class="dropdown" id="stockMaintenance">
      <a href="stock_maintenance.html.php">
        <img src="../icons/stock.png" alt="Stock Maintenance Sidebar Menu Icon" class="icon">
        Stock Maintenance
      </a>
      <div class="dropdown-content">
        <a href="stock/addstock.html.php"><img src="../icons/add.png" alt="Add Sidebar Icon" class="icon">Add Stock</a>
        <a href="stock/deleteStock.html.php"><img src="../icons/delete.png" alt="Delete Sidebar Icon"
            class="icon">Delete Stock</a>
        <a href="stock/amendViewStock.html.php"><img src="../icons/amend.png" alt="Amend Sidebar Icon"
            class="icon">Amend/View Stock</a>
      </div>
    </div>
    <!-- Dropdown: Guest Maintenance -->
    <div class="dropdown" id="guestMaintenance">
      <a href="guest_maintenance.html.php">
        <img src="../icons/guests.png" alt="Guest Maintenance Sidebar Menu Icon" class="icon">
        Guest Maintenance
      </a>
      <div class="dropdown-content">
        <a href="guest/"><img src="../icons/add.png" alt="Add Sidebar Icon" class="icon">Add Guest</a>
        <a href="guest/"><img src="../icons/delete.png" alt="Delete Sidebar Icon" class="icon">Delete
          Guest</a>
        <a href="guest/"><img src="../icons/amend.png" alt="Amend Sidebar Icon" class="icon">Amend/View
          Guest</a>
      </div>
    </div>
    <!-- Dropdown: Room Maintenance -->
    <div class="dropdown" id="roomMaintenance">
      <a href="room_maintenance.html.php">
        <img src="../icons/rooms.png" alt="Room Maintenance Sidebar Menu Icon" class="icon">
        Room Maintenance
      </a>
      <div class="dropdown-content">
        <a href="room/addroom.html.php"><img src="../icons/add.png" alt="Add Sidebar Icon" class="icon">Add Room</a>
        <a href="room/deleteRoom.html.php"><img src="../icons/delete.png" alt="Delete Sidebar Icon" class="icon">Delete
          Room</a>
        <a href="room/AmendViewRoom.html.php"><img src="../icons/amend.png" alt="Amend Sidebar Icon" class="icon">Amend/View
          Room</a>
      </div>
    </div>
    <a href="../login.html" class="exit-card">
      <img src="../icons/exit.png" alt="Exit System Sidebar Icon" class="icon">
      Exit System
    </a>
  </div>

    <div class="content">
    <div class="card">
      <div class="menu-item">
        <a href="staff_maintenance.html">
          <img src="../icons/staff-maintenance.png" alt="Staff Maintenance Menu Icon" class="menu-icon">
          <div class="menu-text">
            <h3 class="menu-title">Staff Maintenance</h3>
            <p class="menu-subtitle">Menus to Add, Delete and Amend/View Staff Members</p>
          </div>
        </a>
      </div>

      <div class="menu-item">
        <a href="stock_maintenance.html.php">
          <img src="../icons/stock-maintenance.png" alt="Stock Maintenance Menu Icon" class="menu-icon">
          <div class="menu-text">
            <h3 class="menu-title">Stock Maintenance</h3>
            <p class="menu-subtitle">Menus to Add, Delete and Amend/View Stock Items</p>
          </div>
        </a>
      </div>

      <div class="menu-item">
        <a href="guest_maintenance.html.php">
          <img src="../icons/guest-maintenance.png" alt="Guest Maintenance Menu Icon" class="menu-icon">
          <div class="menu-text">
            <h3 class="menu-title">Guest Maintenance</h3>
            <p class="menu-subtitle">Menus to Add, Delete and Amend/View Guests</p>
          </div>
        </a>
      </div>
		
	  <div class="menu-item">
        <a href="room_maintenance.html.php">
          <img src="../icons/room-maintenance.png" alt="Room Maintenance Menu Icon" class="menu-icon">
          <div class="menu-text">
            <h3 class="menu-title">Room Maintenance</h3>
            <p class="menu-subtitle">Menus to Add, Delete and Amend/View Rooms</p>
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