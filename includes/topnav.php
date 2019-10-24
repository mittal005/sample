 <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Block Chainfirms</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
       
        <div class="input-group-append">
          
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav">

      <span style="font-size: 25px;color: white">
      <?php
      // if(isset($_SESSION['user_id'])){

      //       echo $_SESSION['user_id'];


      //     }
          if(isset($_SESSION['username'])){

            echo $_SESSION['username'];


          }

      ?>
      </span>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
         <label></label>
          <a class="dropdown-item" href="Profileview.php">View Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="./logout.php">Logout</a>
         <!--  <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">Logout</a> -->
        </div>
      </li>
    </ul>

  </nav>