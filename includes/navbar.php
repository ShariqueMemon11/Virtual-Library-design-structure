<header>
    <div class="App">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Virtual Library</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" href="../HomePage/index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link">My Reading List</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../BrowseBooks/index.php">Browse Books</a>
              </li>
              <?php 
              if(isset($_SESSION['name']))
              {
              ?>
                <li style="display: flex; align-items: center; flex-direction: row; gap: 10px; position: relative;">
                  <img src="../assets/User.png" alt="User Avatar" style="margin-left:20px; height: 50px; width: 50px; border-radius: 50%; border: 2px solid #00d4ff;">
                  <label for="" style="color:#00d4ff; font-size: 1rem; font-weight: bold;">
                    <?php echo $_SESSION['name']; ?>
                  </label>
                  <div class="nav-item dropdown user-dropdown">
                    <a 
                      class="nav-link dropdown-toggle" 
                      href="#" 
                      role="button" 
                      data-bs-toggle="dropdown" 
                      aria-expanded="false"
                      style="color: #00d4ff; font-size: 1rem; font-weight: bold;"
                    >▼
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                      <li><a class="dropdown-item" href="#">Profile</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="../Login/logout.php">Log Out</a></li>
                    </ul>
                  </div>
                </li>



              <?php
              }
              else
              {
              ?>
                <li class="nav-item">
                <a class="btn btn-outline-light ms-3" href="../Login/index.php">Log In</a>
                 </li>
              <?php
              }
              ?>
              
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>