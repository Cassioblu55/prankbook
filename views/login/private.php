<?php 
	require_once '../../config/config.php';
    require_once $serverPath."utils/requireLogin.php";

    include_once $serverPath.'views/templates/head.php';
    
?> 
Hello <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>, secret content!<br /> 
<a href="memberlist.php">Memberlist</a><br /> 
<a href="edit_account.php">Edit Account</a><br /> 
<a href="/~cbhudson/informatics_project/prankbook/utils/logout.php">Logout</a>