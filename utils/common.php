<?php 
    // These variables define the connection information for your MySQL database 
    include_once $serverPath.'utils/connection.php';
    $db = connect();
     
    // This statement configures PDO to throw an exception when it encounters 
    // an error.  This allows us to use try/catch blocks to trap database errors. 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
     
    // This statement configures PDO to return database rows from your database using an associative 
    // array.  This means the array will have string indexes, where the string value 
    // represents the name of the column in your database. 
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
         
    // This tells the web browser that your content is encoded using UTF-8 
    // and that it should submit content back to you using UTF-8 
    header('Content-Type: text/html; charset=utf-8'); 
     
    // This initializes a session.  Sessions are used to store information about 
    // a visitor from one web page visit to the next.  Unlike a cookie, the information is 
    // stored on the server-side and cannot be modified by the visitor.  However, 
    // note that in most cases sessions do still use cookies and require the visitor 
    // to have cookies enabled.  For more information about sessions: 
    // http://us.php.net/manual/en/book.session.php 
 
 ?>