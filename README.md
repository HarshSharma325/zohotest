CONTACT MANAGER APP
===================
A contact manager form using HTML, PHP, Bootstrap and MySQL. This form allows users to add their contacts and display it in a table. All information is stored in a MySQL database. First, the sign-up requires a secret key which will only be known to the user. After successful login, the user is required to add the contacts using it's secret key. According to user's entered secret key the data/list is displayed in a tabular format.
Some of the features are:
-It's a secured app as the password is hashed and stored in the database.
-Easy to use.
-Uses secret key for more enhanced security.


INSTRUCTIONS
============
1. Download and install xampp and visual studio code
2. Clone the repository and then copy the folder named "zoho" to C:\xampp\htdocs
3. Open xampp and start Apache and MySql server
4. Go to http://localhost/phpmyadmin/ and create two databases with the name "contacts" and "users" seperately
5. Go to import and import the two databases from the cloned repository named "contacts.sql" and "users.sql" to get the structure of the database
6. Open http://localhost/zoho/login.php to access the application.


