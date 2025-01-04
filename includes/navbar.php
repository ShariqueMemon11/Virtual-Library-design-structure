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
                <li class="nav-item">
                <a class="btn btn-outline-light ms-3" href="../Login/logout.php">Log Out</a>
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