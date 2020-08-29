<?php 

session_start();

include_once('../includes/connection.php');
include_once('../includes/practice.php');

$practice = new Practice;

if (isset($_SESSION['logged_in'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $query = $pdo->prepare('DELETE FROM practice WHERE practice_id = ?');
        $query->bindValue(1, $id);
        $query->execute();
        
        header('Location: delete.php');
    }
    $practices = $practice->fetch_all();
    // display delete page
    ?>

    <html>

        <head>
            <title>CMS Practice</title>
            <link rel="stylesheet" href="../assets/style1.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roberto">
        </head>

        <body>
            <div class="container">
              <a href="index.php" id="logo">Gingerbread Bake Shop CMS</a> 
                <br />            <br />

                <h4>Select an Item to Delete</h4>

                <form action="delete.php" method="get" >
                    <select onchange="this.form.submit();" name="id">
                        <?php foreach ($practices as $practice) { ?>
                            <option value="<?php $practice['practice_id']; ?>">
                                <?php echo $practice['practice_title']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </form>
                
            </div>
        </body>
    </html>

<?php
} else {
    header('Location: index.php');
}

?>
