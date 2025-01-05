<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Books</title>
    <link rel="stylesheet" href="browsebooks.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Navbar.css">
    <link rel="stylesheet" href="AddBookform.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    

</head>
<body>
<?php include '../includes/navbar.php'; ?>
    <main>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search books by name...">
        </div>
        <?php 
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION['role']) && $_SESSION['role'] == 'Admin') { 
        ?>
            <div style="text-align: center;">
                <button class="btn btn-primary" id="addBookBtn">Add Book</button>
            </div>
        <?php
        }
        ?>

        
        <div class="book-grid">
            <div class="book-card">
                <img src="../assets/hp.jpg" alt="Harry Potter Book">
                <h3>Harry Potter Series by J.K. Rowling</h3>
                <div class="star-rating">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <a href="#" class="preview-button">Preview</a>
                <a href="#" class="preview-button">Read</a>
                <a href="#" class="preview-button">Add to My List</a>
            </div>
            <div class="book-card">
                <img src="../assets/13RW.jpeg" alt="Thirteen Reasons Why Book">
                <h3>Thirteen Reasons Why by Jay Asher</h3>
                <div class="star-rating">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <a href="#" class="preview-button">Preview</a>
                <a href="#" class="preview-button">Read</a>
                <a href="#" class="preview-button">Add to My List</a>
            </div>
        </div>

        <!-- Add Book Modal -->
        <div id="addBookModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Add New Book</h2>
                <form id="addBookForm">
                    <label for="bookName">Book Name:</label>
                    <input type="text" id="bookName" name="bookName" required>
                    
                    <label for="bookRating">Rating:</label>
                    <input type="number" id="bookRating" name="bookRating" min="1" max="5" required>
                    
                    <label for="bookDescription">Description:</label>
                    <textarea id="bookDescription" name="bookDescription" required></textarea>
                    
                    <label for="bookImage">Image URL:</label>
                    <input type="text" id="bookImage" name="bookImage" required>
                    
                    <button type="submit" class="btn btn-primary">Add Book</button>
                </form>
            </div>
        </div>
<?php include '../includes/footer.php'; ?>
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
        </script>
    </main>
</body>
</html>