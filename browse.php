<html>
<head>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/second.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;1,400;1,700&display=swap" rel="stylesheet"> 
        <title> The Book Club </title>
    </head>
    <body>
        <?php include 'config.php' ?>
        <?php include 'connect.php'?> 
        <?php include 'templates/header.php' ?>
        <?php include 'templates/menu.php' ?>
        <div class="form">
            <form>
                <div>
                    <label for="book">Book:</label><br>
                    <input type="text" id="book" name="book" value=""><br>
                </div>
                <div>
                    <label for="author">Author:</label><br>
                    <input type="text" id="author" name="author" value=""><br>
                </div>
                <input type="submit" id="submit" value="Search">
            </form>
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

$query = "SELECT * from book";
/*$action = "INSERT INTO bookuser(BookID) SELECT BookID FROM book";*/

$stmt = $db->prepare($query);
$stmt->bind_result($BookID, $ISBNnumber, $Title, $PageNumber, $Edition, $PubYear,$PubCompany,$Reserved);
$stmt -> execute();


echo '<table style="margin-left: auto; margin-right: auto;" bgcolor="DFA79D" cellpadding="15">';
echo '<tr><b><th>Book Title</th> <th> ISBN-Number </th> <th> Number of Pages </th>';
while ($stmt ->fetch()){
    if ($Reserved == 0){
    echo "<tr>";
    echo "<td> $Title </td> <td> $ISBNnumber </td> <td> $PageNumber </td>";
    echo "<td> 
                <form action= reserved.php method= POST> 
            <button type=submit value= ".$BookID." name= 'ReserveButton'> Reserve </button>
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