<html>
<link rel="stylesheet" href="css/main.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,700&display=swap" rel="stylesheet"> 
        <?php include 'config.php' ?>
        <?php include 'connect.php'?> 
        <?php include 'templates/header.php' ?>
        <?php include 'templates/menu.php' ?>
    <body>
    
    <div class="booklist">
            <p> Your Books: </p>  
        </div>
    <?php 
            if (isset($_POST['ReturnButton'])){

                $BookID = $_POST ['ReturnButton'];
                $query = " UPDATE book
                            SET Reserved = 0
                            WHERE bookID = $BookID";
            
                $stmt = $db->prepare($query);
                $stmt -> execute();
            
            }



            $query = " SELECT * from book";
            


            $stmt = $db->prepare($query);
            $stmt->bind_result($BookID, $ISBNnumber, $Title, $PageNumber, $Edition, $PubYear,$PubCompany,$Reserved);
            $stmt -> execute();
            
            
            echo '<table style="margin-left: auto; margin-right: auto" bgcolor="DFA79D" cellpadding="15">';
            echo '<tr><b><th>Book Title</th> <th> ISBN-Number </th> <th> Number of Pages </th>';
            while ($stmt ->fetch()){
                if ($Reserved == 1){
                echo "<tr>";
                echo "<td> $Title </td> <td> $ISBNnumber </td> <td> $PageNumber </td>";
                echo "<td> 
                <form action='' method= POST> 
                <button type=submit value= ".$BookID." name= 'ReturnButton'> Return </button>
                </form>
                </td>";
                echo "</tr>";
                }
            }
            
            echo "</table>";
                   
            $stmt->close();

?>


    </body>
    <footer>
    <?php include 'templates/footer.php' ?>
    </footer>
</html>