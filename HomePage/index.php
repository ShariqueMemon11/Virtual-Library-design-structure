<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Virtual Library</title>
  <link rel="stylesheet" href="homepage.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../Navbar.css">
  <style>
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto; /* 15% from the top and centered */
      padding: 20px;
      border: 1px solid #888;
      width: 80%; /* Could be more or less, depending on screen size */
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
  
  <?php include '../includes/navbar.php'; ?>
  <div class="main">
    <div class="main-content">
      <h1>Welcome to the Virtual Library</h1>
      <p>Discover thousands of books, and create your personal reading list.</p>
      <a href="../BrowseBooks/index.php" class="btn btn-primary btn-lg">Browse Books</a>
      <?php if($_SESSION['role'] == 'Admin') { ?>
        <a href="#" class="btn btn-primary btn-lg" id="addBookBtn">Admin Panel</a>
      <?php } ?>
    </div>
  </div>

  <section class="categories-section">
    <h2>Explore Categories</h2>
    <div class="categories">
      <div class="category">Fiction</div>
      <div class="category">Non-Fiction</div>
      <div class="category">Science</div>
      <div class="category">History</div>
      <div class="category">Children</div>
    </div>
  </section>

  <section class="popular-books-section">
    <h2 style="padding-bottom: 15px;">Popular Books</h2>
    <div class="popular-books">
      <div class="book-card">
        <img src="../assets/HP.jpg" alt="Book Cover">
        <h3>Harry Potter Series by J.K. Rowling</h3>
        <p>★★★★★</p>
      </div>
      <div class="book-card">
        <img src="../assets/13RW.jpeg" alt="Book Cover">
        <h3>Thirteen Reasons Why Novel by Jay Asher</h3>
        <p>★★★★☆</p>
      </div>
      <div class="book-card">
        <img src="../assets/RDPD.jpg" alt="Book Cover">
        <h3>Rich Dad Poor Dad by Robert Kiyosaki</h3>
        <p>★★★★★</p>
      </div>
    </div>
  </section>

  <section class="reviews-section">
    <h2 style="padding-bottom: 15px;">What Our Readers Say</h2>
    <div class="reviews">
      <div class="review">
        <p>"An amazing platform with a great selection of books!"</p>
        <p>– Reader 1</p>
      </div>
      <div class="review">
        <p>"Love the simplicity and ease of use!"</p>
        <p>– Reader 2</p>
      </div>
      <div class="review">
        <p>"The recommendations are spot on."</p>
        <p>– Reader 3</p>
      </div>
    </div>
  </section>

  <div id="addBookModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <table>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th style="text-align: center;">Admin Access</th>
          <th style="text-align: center;">Librarian Access</th>
          <th style="text-align: center;">Revoke Access</th>
        </tr>
        <?php 
include '../includes/connection.php';
$result = mysqli_query($conn, "SELECT * FROM users");
if ($result && mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr style="border-bottom: 1px solid #ddd;">
      <td><?php echo htmlspecialchars($row['Name']); ?></td>
      <td><?php echo htmlspecialchars($row['Email']); ?></td>
      <td><?php echo htmlspecialchars($row['Role']); ?></td>
      <td style="text-align: center;">
      <button class="btn btn-primary" onclick="toggleRole(<?php echo $row['Sno']; ?>, 'Admin')">Grant</button>
      </td>
      <td style="text-align: center;">
<button class="btn btn-primary" onclick="toggleRole(<?php echo $row['Sno']; ?>, 'Librarian')">Grant</button>
      </td>
      <td style="text-align: center;">
    <button class="btn btn-danger" onclick="toggleRole(<?php echo $row['Sno']; ?>,'RemoveAll')">Revoke</button>
</td>

    </tr>
  <?php }
} else { ?>
  <tr>
    <td colspan="5">No users found</td>
  </tr>
<?php } ?>

      </table>
    </div>
  </div>

  <?php include '../includes/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script>
    // Get modal element
    var modal = document.getElementById("addBookModal");
    // Get open modal button
    var btn = document.getElementById("addBookBtn");
    // Get close button
    var span = document.getElementsByClassName("close")[0];

    // Listen for open click
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // Listen for close click
    span.onclick = function() {
      modal.style.display = "none";
    }

    // Listen for outside click
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }

    function toggleRole(id, role) {
    fetch('toggle_role.php', { // Update this to the correct path, e.g., ../toggleRole.php
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ id: id, role: role }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            location.reload(); // Reload the page to reflect changes
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}



  </script>
</body>
</html>
