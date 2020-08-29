<?php

include_once('includes/connection.php');
include_once('includes/practice.php');

$practice = new Practice;
$practices = $practice->fetch_all();


?>

<html>

    <head>
        <title>Gingerbread Bake Shop CMS </title>
        <link rel="stylesheet" href="assets/style1.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roberto">

    </head>
    
    <body>
        <div class="container">
            <a href="index.php" id="logo">Gingerbread Bake Shop CMS</a>
            
            <ol>
            
                <?php foreach ($practices as $practice) { ?>
                <li><a href="practice.php?id=<?php echo $practice['practice_id']; ?> ">
                        <?php echo $practice['practice_title']; ?>
                    </a>
                
                
                </li>
                <?php } ?>
            </ol>
        <br />
            <small><a href="admin">Admin</a></small>
        </div>
    </body>
</html>