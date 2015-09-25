<?php 
    // First we execute our common code to connection to the database and start the session 
    require("../../utils/common.php"); 
     
    // At the top of the page we check to see whether the user is logged in or not 
    if(empty($_SESSION['user'])) 
    { 
        // If they are not, we redirect them to the login page. 
        header("Location: /~cbhudson/informatics_project/prankbook/views/login/"); 
         
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to login"); 
    } 
     
    // Everything below this point in the file is secured by the login system 
     
    // We can display the user's username to them by reading it from the session array.  Remember that because 
    // a username is user submitted content we must use htmlentities on it before displaying it to the user. 
    include_once '../templates/head.php';
?> 
Hello <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>, you are logged in!<br /> 

<div>This will allow a user to add services and change there profile.</div>

<a href="/~cbhudson/informatics_project/prankbook/views/services/edit.php">Provide Prank</a>

<?php include_once '../templates/footer.php';?>
