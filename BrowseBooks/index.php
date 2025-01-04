<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Books</title>
    <link rel="stylesheet" href="browsebooks.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<?php include '../includes/navbar.php'; ?>
    <main>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search books by name...">
        </div>

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
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                </div>
                <a href="#" class="preview-button">Preview</a>
                <a href="#" class="preview-button">Read</a>
                <a href="#" class="preview-button">Add to My List</a>
            </div>
            <div class="book-card">
                <img src="../assets/RDPD.jpg" alt="Rich Dad Poor Dad Book">
                <h3>Rich Dad Poor Dad by Robert Kiyosaki</h3>
                <div class="star-rating">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <a href="#" class="preview-button">Preview</a>
                <a href="#" class="preview-button">Read</a>
                <a href="#" class="preview-button">Add to My List</a>
            </div>
            <div class="book-card">
                <img src="../assets/Littlelife.jpg" alt="">
                <h3>A Little Life by Hanya Yanagihara</h3>
                <div class="star-rating">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <a href="#" class="preview-button">Preview</a>
                <a href="#" class="preview-button">Read</a>
                <a href="#" class="preview-button">Add to My List</a>
            </div>
            <div class="book-card">
                <img src="../assets/courtmist.jpg" alt="">
                <h3>A Court of Mist and Fury by Sarah J. Maas</h3>
                <div class="star-rating">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <a href="#" class="preview-button">Preview</a>  
                <a href="#" class="preview-button">Read</a>
                <a href="#" class="preview-button">Add to My List</a>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="searchbooks.js"></script>
</body>
</html>
