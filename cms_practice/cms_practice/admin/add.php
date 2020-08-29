<?php 

session_start();
include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {
    if (isset($_POST['title'], $_POST['content'])) {
        $title = $_POST['title'];
        $content = nl2br($_POST['content']);
        $price = $_POST['price'];
        $catagory = $_POST['catagory'];
        
        if (empty($title) or empty($content) or empty($price) or empty($catagory)) {
            $error = 'All fields are required!';
        } else {
            $query = $pdo->prepare('INSERT INTO practice (practice_title, practice_content, practice_price, practice_catagory) VALUES(?, ?, ?, ?)');
            
            $query->bindValue(1, $title);
            $query->bindValue(2, $content);
            $query->bindValue(3, $price);
            $query->bindValue(4, $catagory);
            $query->execute();
            header('Location: index.php');
        }
    }
    
    
    ?>
<html>

    <head>
        <title>Gingerbread Bake ShopCMS</title>
        <link rel="stylesheet" href="../assets/style1.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roberto">
    </head>
    
    <body>
        <div class="container">
            <div class="wrapper">
              <a href="index.php" id="logo">Gingerbread Bake Shop CMS</a> 
                <br />            

                <h4>Add Item</h4>

                    <?php if (isset($error)) { ?>
                        <small style="color:#aa0000"><?php echo $error; ?></small>
                    <br /> <br />
                    <?php } ?>

                <form action="add.php" method="post" autocomplete="off">

                    <input type="text" name="title" placeholder="Product Name"><br /><br />
                    <textarea rows="15" cols="50" placeholder="Product Description" name="content"></textarea><br /><br /> 
                    <input type="text" name="catagory" placeholder="Catagory"><br /><br /> 
                    <input type="number" name="price" placeholder="Price"><br /> <br />
                    <input type="submit" value="Submit">
                </form>
             </div>   
        </div>
    </body>
</html>


<?php
} else {
    header('Location: index.php');
}

?>