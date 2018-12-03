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

//values proberen te echoën uit html formulier

}
catch(PDOException $error) {
    echo 'Error: ' . $error->getMessage() . "<br/>";
    exit;
}

// End our PDO connection, see explanation: https://stackoverflow.com/questions/18277233/pdo-closing-connection
// http://php.net/manual/en/pdo.connections.php
$connection = null;

// hier formulier input pakken

// if( !empty() ) { //dit gebruiken ipv strlen
//
// }

if( ( !empty( $_POST["user_name"] ) ) && ( !empty( $_POST["user_email"] ) ) ) {
  echo "Account created succesfully. Welcome " . htmlspecialchars($_POST["user_name"]) . "."; ?> <br> <?php
  echo "We've sent an account activation link to " . htmlspecialchars($_POST["user_email"]) . ".";
}
else {
  echo "It appears you entered incorrect data.";
}
