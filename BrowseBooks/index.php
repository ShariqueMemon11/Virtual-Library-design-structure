<?php
session_start();
include '../includes/connection.php';

// Fetch books from the database
$query = "SELECT * FROM books";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

if (isset($_POST['submit'])) {
    // Capture and sanitize input
    $bookName = $_POST['bookName'];
    $bookRating = (int) $_POST['bookRating']; // Ensure it's an integer
    $bookDescription = $_POST['bookDescription'];

    // Handle file upload
    $bookImage = $_FILES['bookImage']['name'];
    $target = "../assets/" . basename($bookImage);

    if (move_uploaded_file($_FILES['bookImage']['tmp_name'], $target)) {
        echo "<script>console.log('Image uploaded successfully to: $target')</script>";
    } else {
        echo "<script>alert('Failed to upload the image file!')</script>";
        exit();
    }

    // Debugging output
    echo "<script>console.log('Book Name: $bookName, Rating: $bookRating, Description: $bookDescription, Image: $bookImage')</script>";

    // Use prepared statements for the SQL query
    $stmt = $conn->prepare("INSERT INTO books (Name, Rating, Description, Image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $bookName, $bookRating, $bookDescription, $bookImage);

    if ($stmt->execute()) {
        echo "<script>alert('Book added successfully!')</script>";
    } else {
        echo "<script>alert('Failed to add book: " . $stmt->error . "')</script>";
    }

    // Close the statement
    $stmt->close();

    // Redirect to avoid form resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<Script>
function searchBook() {
    const query = document.getElementById('searchInput').value.trim();
    if (query.length === 0) {
        // Optionally clear results if input is empty
        return;
    }

    // Make an AJAX call to fetch books
    fetch(`searchBook.php?query=${encodeURIComponent(query)}`)
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert(data.error);
        } else {
            // Clear existing book grid
            const bookGrid = document.querySelector('.book-grid');
            bookGrid.innerHTML = '';

            // Add books to the grid
            data.books.forEach(book => {
                const bookCard = `
                    <div class="book-card">
                        <img src="${book.Image}" alt="${book.Name}">
                        <h3>${book.Name}</h3>
                        <div class="star-rating">
                            ${'<i class="fas fa-star"></i>'.repeat(book.Rating)}
                        </div>
                        <a href="#" class="preview-button">Preview</a>
                        <a href="#" class="preview-button">Read</a>
                        <a href="#" class="preview-button">Add to My List</a>
                    </div>
                `;
                bookGrid.insertAdjacentHTML('beforeend', bookCard);
            });
        }
    })
    .catch(err => console.error('Error:', err));
}
</Script>

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
</head>
<body>
<?php include '../includes/navbar.php'; ?>
    <main>
        <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search books by name..." onkeyup="searchBook()">
        </div>
        <?php 
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION['role']) && ($_SESSION['role'] == 'Admin' ||  $_SESSION['role'] == 'Librarian') ) { 
        ?>
            <div style="text-align: center;">
                <button class="btn btn-primary" id="addBookBtn">Add Book</button>
            </div>
        <?php
        }
        ?>

        <div class="book-grid">
            <?php 
            while ($row = mysqli_fetch_assoc($result)) {
                $name = htmlspecialchars($row['Name']);
                $rating = (int) $row['Rating'];
                $description = htmlspecialchars($row['Description']);
                $image = htmlspecialchars($row['Image']);
            ?>
                <div class="book-card">
                    <img src="../assets/<?php echo $image; ?>" alt="<?php echo $name; ?>">
                    <h3><?php echo $name; ?></h3>
                    <div class="star-rating">
                        <?php for ($i = 0; $i < $rating; $i++) { ?>
                            <i class="fas fa-star"></i>
                        <?php } ?>
                    </div>
                    <p style="color:#fff;"><?php echo $description; ?></p>
                    <a href="#" class="preview-button">Preview</a>
                    <a href="#" class="preview-button">Read</a>
                    <a href="#" class="preview-button">Add to My List</a>
                </div>
            <?php 
            }
            ?>
        </div>

        <!-- Add Book Modal -->
        <?php include 'addBookModal.php'; ?>
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
