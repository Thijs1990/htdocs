<?php
// First lesson is: Always comment in English, this increased cooperationg with foreign coworkers and/or so that other devlopers could read your code

// Second: myou don't need to close the php tag, only when you need to use HTML
// like for example
?>

<h1>Our database lessons</h1>

<?php

/*
If your MySQL server runs on default settings, you don't need to specify the database host name port.
Default MySQL port is 3306. See: https://stackoverflow.com/questions/3736407/mysql-server-port-number
*/

// $db_host = 'localhost:3306';
$db_host = 'localhost';
$db_name = 'test';
$db_user = 'remzi';
$db_pass = 'Amsterdam1993';


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
define('DB_USER', 'remzi');

// Database password
define('DB_PASS', 'Amsterdam1993');


/* Lesson 3
- https://www.w3schools.com/php/php_mysql_connect.asp
- https://www.w3schools.com/php/php_mysql_prepared_statements.asp
- https://www.w3schools.com/sql/sql_datatypes.asp

Lesson 4
Try and Catch are new, but it's also a good way to do certain things in the try and catch block rather than in an if / else statment
*/
try {
    // There are three ways to do this, directly put the specific pdo settings, with varuables or with PHP CONSTANTS
    $connection1 = new PDO( 'mysql:host=localhost; dbname=test', 'remzi, Amsterdam1993' );

    $connection2 = new PDO( "mysql:host=$db_host; dbname=$db_name", $db_user, $db_pass );

    $connection3 = new PDO( 'mysql:host=' . DB_HOST . '; dbname=' . DB_NAME, DB_USER, DB_PASS ); // This is preferred, check WordPress's source code (and most populair CMS systems)


    // set the PDO error mode to exception
    $connection3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // For debugging the connection
    echo 'Connected successfully';
    exit;

    // prepare sql and bind parameters
    $stmt = $connection->prepare("INSERT INTO MyGuests (firstname, lastname, email)
    VALUES (:firstname, :lastname, :email)");
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);

    // insert a row
    $firstname = "John";
    $lastname = "Doe";
    $email = "john@example.com";
    $stmt->execute();

    // insert another row
    $firstname = "Mary";
    $lastname = "Moe";
    $email = "mary@example.com";
    $stmt->execute();

    // insert another row
    $firstname = "Julie";
    $lastname = "Dooley";
    $email = "julie@example.com";
    $stmt->execute();

    echo 'New records created successfully';


    // Another connection http://php.net/manual/en/pdo.connections.php
    $dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
    // use the connection here
    $sth = $dbh->query('SELECT * FROM foo');

    // and now we're done, close it
    $dbh = null;



    // Another connection with a type of database
    $pdo = new PDO('pgsql:host=192.168.137.1;port=5432;dbname=anydb', 'anyuser', 'pw');
    $stmt = $pdo->prepare('SELECT * FROM sometable');
    $stmt->execute();

    // End our PDO connection
    $pdo = null;

    /*
     - http://php.net/manual/en/pdo.installation.php
     - https://www.if-not-true-then-false.com/2012/php-pdo-sqlite3-example/
    */
}
catch(PDOException $error) {
    echo 'Error: ' . $error->getMessage() . "<br/>";
    exit;
}

// End our PDO connection, see explanation: https://stackoverflow.com/questions/18277233/pdo-closing-connection
// http://php.net/manual/en/pdo.connections.php
$connection = null;
