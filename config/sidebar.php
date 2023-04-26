<?php 
if(!(isset($_SESSION['user_id']))) {
  header("location:index.php");
  exit;
}
?>
<style>
  .modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 30%;
  text-align: center;
}

input[type="password"] {
  padding: 10px;
  margin: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

button[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

  </style>
<aside class="main-sidebar sidebar-dark-primary bg-black elevation-4">
<link rel="stylesheet" type='' href="plugins/admincss/admin.css" />
    <a href="#" class="brand-link logo-switch bg-black">
      <h4 class="brand-image-xl logo-xs mb-0 text-center"><img src="./images/ubicon.png" alt="Ub-logo" width="25px"></h4>
      <h4 class="brand-image-xl logo-xl mb-0 text-center">UB <b>Clinic</b></h4>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img 
          src="user_images/<?php echo $_SESSION['profile_picture'];?>" class="img-circle elevation-2" alt="User Image" />
        </div>
        <div class="info">
          <a href="update_user.php?user_id=1" class="d-block"><?php echo $_SESSION['display_name'];?></a>
        </div>
      </div>

      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item" id="mnu_dashboard">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          
          <li class="nav-item" id="mnu_patients">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-injured"></i>
              <p>
                <i class="fas "></i>
                Patients
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="new_prescription.php" class="nav-link" 
                id="mi_new_prescription">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Prescription</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="patients.php" class="nav-link" 
                id="mi_patients">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Student Patients</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" 
                id="modal-btn">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Employee Patients</p>
                </a>
              </li>
              <a href="#" id="modal-btn">Enter Pin</a>

<div id="modal" class="modal">
  <div class="modal-content">
    <form action="validate.php" method="POST">
      <input type="password" id="pin" name="pin" required>
      <button type="submit" onclick="checkPin()">Submit</button>
    </form>
  </div>
</div>
              
              
              
            </ul>
          </li>
          <li class="nav-item" id="mnu_record">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-address-book"></i>
              <p>
                <i class="fas "></i>
                Record
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="employee_record.php" class="nav-link" 
                id="mi_employee">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employees</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="student_record.php" class="nav-link" 
                id="mi_student">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="patient_history.php" class="nav-link" 
                id="mi_patient_history">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Patient History</p>
                </a>
              </li>
</ul>
</li>



          <li class="nav-item" id="mnu_medicines">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-pills"></i>
              <p>
                Medicines
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="medicine_details.php" class="nav-link" 
                id="mi_medicine_details">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Medicine</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="medicines.php" class="nav-link" 
                id="mi_medicines">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Medicine Details</p>
                </a>
              </li> 
              
                            
            </ul>
          </li>

          <li class="nav-item" id="mnu_reports">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                SMS and Analytics
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="patient_total.php" class="nav-link" 
                id="mi_sms">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SMS Student </p>
                </a>
              </li>
              
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="employee_total.php" class="nav-link" 
                id="mi_sms_emp">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SMS Employee</p>
                </a>
              </li>
              
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="reports.php" class="nav-link" 
                id="mi_analytics">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Analytic Reports</p>
                </a>
              </li>
              
            </ul>
            
          </li> 
          <li class="nav-item" id="mnu_forms">
            <a href="forms.php" class="nav-link">
             <i class="fas fa-file"></i>
              <p>
                Forms
              </p>
            </a>
          </li>
          <li class="nav-item" id="mnu_upload">
            <a href="upload.php" class="nav-link">
             <i class="fas fa-file"></i>
              <p>
                Upload Template
              </p>
            </a>
          </li>

          <li class="nav-item" id="mnu_users">
            <a href="users.php" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fa fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <script>
document.getElementById("modal-btn").addEventListener("click", function() {
  document.getElementById("modal").style.display = "block";
});
document.getElementById("submit").addEventListener("click", function() {
  var password = document.getElementById("pin").value;
  // send the password to the server for verification
});

    </script>