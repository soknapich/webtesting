####################################################################################################
#   BACKGROUND
####################################################################################################

The environment is simple Apache / PHP / MySQL app for managing a library and book checkouts. Provided
are Bootstrap and jQuery, but you may add any other framework / library you need. The main purpose of
this test is to assess your coding, so styling is not important as long as it's readable. If you need
to stub out functions or make assumptions, please state them in comments.

Main points of assessment:
 - Code approach (problem-solving)
 - Exactness in solving the given task
 - Secure coding practice
 - Reusability

The files are as follows:
 - index.php: contains the main view, with different tasks in tabs
 - functions.php: contains utility functions, may be modified as needed

Database access is currently provided via the db() function, which returns a PDO instance. You may 
replace this with myqsl_* / mysqli_* functions if you prefer. The connection credentials are in the 
global variable $CONFIG

The database schema is as follows:

 - books
    - book_id: PRIMARY
    - title: text
    - author: text

 - checkouts
    - checkout_id: PRIMARY
    - timestamp: datetime
    - name: text
    - email: varchar(50)
    - phone: varchar(50)
    - book_id: int, foreign key

Database Constraints:
 - Each book may be checked out by a max of 5 people

####################################################################################################
#   TASK #1: Implement getBooksPopular()
####################################################################################################

 - Implement the getBooksPopular function to return all books checked out by more than 2 people,
   ordered by most popular first
   
 - Display the results in the 2nd tab in index.php, with the columns:
   Title, Author, Number of Checkouts


####################################################################################################
#   TASK #2: Implement getBooksRecent()
####################################################################################################

 - Implement the getBooksRecent function to return all recent checkouts ordered by most recent first
 
 - Add a 3rd tab (Recent Checkouts) in index.php, and display the results in a table with the columns:
   Title, Author, Checkout Date


####################################################################################################
#   TASK #3: Create checkout form
####################################################################################################

 - Add a 4th tab (New Checkout) in index.php, and display the form below

 - Create a form to capture new checkouts, with the following fields and constraints:
    - Name: non-empty
    - Email: formatted as valid email syntax
    - Phone: formatted as ($country_code)$number, where:
             $country_code: 1 - 3 digits
             $number: 6 - 11 digits
    - Book ID: valid book_id as found in `books`
       - this should be a dropdown of available books (i.e. <select> instead of <input>)
          - available books means any book with fewer than 5 checkouts
    - The target of the submission should be a new PHP file that does handles validation and redirection
      You may include the functions.php file to access the shared library

 - Handle validation and display errors above the form
    - In addition to the validation above, each book can be checked out at most 5 times. Any attempt
      to check more should return an error

 - On error, redirect back to the form with the appropriate error message

 - If no errors, insert the checkout into the database and display a success notice. You should be
   able to check the results in Recent Checkouts tab from previous task


####################################################################################################
#   TASK #4: Implement AJAX
####################################################################################################

 - Convert the form in Task #3 to use AJAX instead of normal HTTP POST submission
    - Handle validation as usual in the backend

 - On failure / errors, display a message to the user above the form
 
 - On success, switch to the New Checkout tab automatically and prepend a new row to the table, with
   the new checkout data


