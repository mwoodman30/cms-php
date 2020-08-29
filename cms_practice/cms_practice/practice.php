<?php
include_once('includes/connection.php');
include_once('includes/practice.php');

$practice = new Practice;

if (isset($_GET['id'])) {
    //display practice file
    $id = $_GET['id'];
    $data = $practice->fetch_data($id);
    
   ?>
        <html>

            <head>
                <title>Gingerbread Bake ShopCMS </title>
                <link rel="stylesheet" href="assets/style1.css">
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roberto">
            </head>

            <body>
                <div class="container">
                    <a href="index.php" id="logo">Gingerbread Bake Shop CMS</a>

                    <h4><?php echo $data['practice_title']; ?></h4>
                    
                    <p><?php echo $data ['practice_content']; ?></p>
                    
                    
                    <a href="index.php">&larr; Back</a>
                </div>
            </body>
        </html>

    <?php
    
    
} else {
    header('Location: index.php');
    exit();
    
}

?>