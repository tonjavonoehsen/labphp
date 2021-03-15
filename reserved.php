<html>
    <link rel="stylesheet" href="css/main.css">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,700&display=swap" rel="stylesheet"> 
            

        <body>
        <?php include 'config.php' ?>
        <?php include 'connect.php'?> 
        <?php include 'templates/header.php' ?>
        <?php include 'templates/menu.php' ?>

        <div class="booklist">
            <p> Your book has been successfully reserved! </p>
            </div>
            
<?php
    if (isset($_POST['ReserveButton'])){

        $BookID = $_POST ['ReserveButton'];
        $query = " UPDATE book
                    SET Reserved = 1
                    WHERE bookID = $BookID";
    
        $stmt = $db->prepare($query);
        $stmt -> execute();
    
    }



?>

        </body>
        <footer>
        <?php include 'templates/footer.php' ?>
        </footer>
</html>