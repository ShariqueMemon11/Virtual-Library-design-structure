## Contributions by Shariq 

1. **User Login and Logout Conditions**:

   - Added functionality to ensure proper login and logout conditions for users.
   - Implemented logic to restrict access to certain pages based on user authentication status.

2. **Database Functionality**:

   - Developed and implemented functionality to add data of users to the database.

3. **API Integration:**:

   - Integrated an external API to enable a search functionality for books.
   - Ensured smooth data fetching and display on the relevant pages.
   - Implemented error handling to manage issues during API requests..

## How i did it

**Steps to Integrate Search with API**

1. **Add JavaScript Functionality for Search**
   - To make the search feature dynamic, I added JavaScript to interact with the backend in real-time.
   - Enhancing the Search Input Field:
     - I modified the existing search input field by attaching an event listener for the onkeyup event. This ensures that every time the user types something, the
     - search query is sent to the server
       
2 **Creating an AJAX Function**:
   - I wrote a function (fetchSearchResults) to make an AJAX request to a PHP endpoint. This sends the user's search query and handles the response.

3 **Create PHP Endpoint for Search**:
   - The backend logic was implemented in a search.php file to handle the search queries and interact with both the database and external API.

   - Checking the Database for Existing Records
   - I first checked if the book already existed in the database.
   - If the book was found, the results were returned as JSON.

4 **Calling the External API for Missing Books**:
   - if the book wasn’t found in the database, I called the Google Books API to fetch the details.

5 **Modify the Frontend to Display Results**:
   - The final step was to dynamically update the frontend with the fetched results.
   - Rendering the Results Dynamically:
   - I created a displaySearchResults function in JavaScript to parse and render the response from the PHP script.

## Contributions by Mohamid

1. **File Management**:

   - Organized and managed the file structure for the entire project.

2. **User Login**:

   - Implemented functionality to display the username on the navbar upon user login.

3. **Admin Roles**:
   - Set up the primary admin role with the ability to create other admins and librarians.
   - Ensured that the primary admin role cannot be revoked, unlike other admin roles.

4. **Database Functionality**:

   - Developed and implemented functionality to add data of books to the database.
     
