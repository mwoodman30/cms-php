<?php

session_start();

include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {
    // display index
    ?>
<html>

    <head>
        <title>Gingerbread Bake Shop CMS</title>
        <link rel="stylesheet" href="../assets/style1.css">
    
    </head>
    
    <body>
        <div class="container">
          <a href="index.php" id="logo">Gingerbread Bake Shop CMS</a> 
            <br />   
            
            <ol>
                <li><a href="add.php">Add Item</a></li>
                <li><a href="delete.php">Delete Item</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ol>
        </div>
    </body>
</html>

    <?php
} else {
    //display login
    if(isset($_POST['username'], $_POST['password'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        if (empty($username) or empty($password)) {
            $error = 'All fields are required!';
        } else {
            $query = $pdo->prepare("SELECT * FROM users WHERE user_name = ?  AND user_password = ?");
            
            $query->bindValue(1, $username);
            $query->bindValue(2, $password);
            
            $query->execute();
            
            $num = $query->rowCount();
            
            if ($num == 1) {
                //user enterd correct details
                $_SESSION['logged_in'] = true;
                header('Location: index.php');
                exit();
            } else {
                //user entered incorret details
                $error = 'Incorrect details!';
            }
        }
    }
    ?>
<html>

    <head>
        <title>Gingerbread Bake Shop CMS </title>
        <link rel="stylesheet" href="../assets/style1.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roberto">
    </head>
    
    <body>
        <div class="container">
          <a href="index.php" id="logo">Gingerbread Bake Shop CMS</a> 
            <br />            <br />
            
            <?php if (isset($error)) { ?>
                <small style="color:#aa0000"><?php echo $error; ?></small>
            <br /> <br />
            <?php } ?>
            
            
            
            <form action="index.php" method="post" autocomplete="off">
                <input type="text" name="username" placeholder="Username"/><br /><br />
                <input type="password" name="password" placeholder="Password" /><br /><br />
                <input type="submit" value="Login">
            
            </form>
        </div>
    </body>
</html>
<?php
}
?>