<div id="addBookModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Add New Book</h2>
                <form id="addBookForm" method="POST" enctype="multipart/form-data">
                <label for="bookName">Book Name:</label>
                <input type="text" id="bookName" name="bookName" required>
                
                <label for="bookRating">Rating:</label>
                <input type="number" id="bookRating" name="bookRating" min="1" max="5" required>
                
                <label for="bookDescription">Description:</label>
                <textarea id="bookDescription" name="bookDescription" required></textarea>
                
                <label for="bookImage">Image:</label>
                <input type="file" id="bookImage" name="bookImage" required>
                
                <button type="submit" name="submit" class="btn btn-primary">Add Book</button>
                </form>

            </div>
        </div>