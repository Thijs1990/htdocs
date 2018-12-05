<?php
// First lesson is: Always comment in English, this increased cooperationg with foreign coworkers and/or so that other devlopers could read your code

// Second: myou don't need to close the php tag, only when you need to use HTML
// like for example
?>

<h1>De falende database van thijs</h1>

<?php

/*
If your MySQL server runs on default settings, you don't need to specify the database host name port.
Default MySQL port is 3306. See: https://stackoverflow.com/questions/3736407/mysql-server-port-number
*/

/* Config - CONSTANTS
 - http://php.net/manual/en/language.constants.php
 - https://www.w3schools.com/php/php_constants.asp
 - https://www.quora.com/Should-class-constants-be-all-uppercase-in-PHP
*/

// Database hostname
define('DB_HOST', 'localhost');

// Database name
define('DB_NAME', 'test');

// Database username
define('DB_USER', 'test_admin');

// Database password
define('DB_PASS', 'Sushi');


/* Lesson 3
- https://www.w3schools.com/php/php_mysql_connect.asp
- https://www.w3schools.com/php/php_mysql_prepared_statements.asp
- https://www.w3schools.com/sql/sql_datatypes.asp

Lesson 4
Try and Catch are new, but it's also a good way to do certain things in the try and catch block rather than in an if / else statment
*/
try {
    // There are three ways to do this, directly put the specific pdo settings, with varuables or with PHP CONSTANTS
    $connection = new PDO( 'mysql:host=' . DB_HOST . '; dbname=' . DB_NAME, DB_USER, DB_PASS ); // This is preferred, check WordPress's source code (and most populair CMS systems)

    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



// prepare sql and bind parameters
$stmt = $connection->prepare("INSERT INTO user (user_email, user_pass, user_name)
VALUES (:user_email, :user_pass, :user_name)");
$stmt->bindParam(":user_email", $user_email);
$stmt->bindParam(":user_pass", $user_pass);
$stmt->bindParam(":user_name", $user_name);

// insert a new entry into user table
$user_email = htmlspecialchars($_POST["user_email"]);
$user_pass = htmlspecialchars($_POST["user_pass"]);
$user_name = htmlspecialchars($_POST["user_name"]);
$stmt->execute();  //execute prepared statement with above parameters

echo "New user account created successfully. " . "Welcome " . htmlspecialchars($_POST["user_name"]) . "."; ?> <br> <?php
echo "We've sent an account activation link to " . htmlspecialchars($_POST["user_email"]) . ".";
}


catch(PDOException $error) {
    echo 'Error: ' . $error->getMessage() . "<br/>";
    exit;
}

// End our PDO connection, see explanation: https://stackoverflow.com/questions/18277233/pdo-closing-connection
// http://php.net/manual/en/pdo.connections.php
$connection = null;

// hier formulier input pakken


//values proberen te echoën uit html formulier
// if( ( !empty( $_POST["user_name"] ) ) && ( !empty( $_POST["user_email"] ) ) ) {
//   echo "Account created succesfully. Welcome " . htmlspecialchars($_POST["user_name"]) . "."; ?> <br> <?php
//   echo "We've sent an account activation link to " . htmlspecialchars($_POST["user_email"]) . ".";
// }
// else {
//   echo "It appears you entered incorrect data.";
// }
