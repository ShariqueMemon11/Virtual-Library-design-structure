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
</head>
<body>
  
  <?php include '../includes/navbar.php'; ?>
  <div class="main">
    <div class="main-content">
      <h1>Welcome to the Virtual Library</h1>
      <p>Discover thousands of books, and create your personal reading list.</p>
      <a href="../BrowseBooks/index.php" class="btn btn-primary btn-lg" >Browse Books</a>
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

  
  <footer class="bg-dark text-white text-center py-3 mt-5">
    <p>&copy; 2023 Virtual Library. All rights reserved.</p>
    <p>
      <a href="#" class="text-white me-3">Privacy Policy</a>
      <a href="#" class="text-white me-3">Terms of Service</a>
      <a href="#" class="text-white">Contact Us</a>
    </p>
  </footer>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
