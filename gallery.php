
<html>
<link rel="stylesheet" href="css/main.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,700&display=swap" rel="stylesheet"> 
        <?php include 'config.php' ?>
        <?php include 'connect.php'?> 
        <?php include 'templates/header.php' ?>
        <?php include 'templates/menu.php' ?>
    <body>

    <?php
    function admin (){
           echo '<form action="extras/upload.php" method="POST" enctype="multipart/form-data">';
         echo ' Select image to upload:';
       echo' <input type="file" name="fileToUpload" id="fileToUpload">';
       echo' <input type="submit" value="Upload Image" name="submit">';
       echo' </form>';
    }

    if ( $_SESSION['userType'] == 1){
        admin();
    } 
        ?>
<h3> User Gallery </h3>


<?php /*
$target_dir = "./uploads/";
$thisImage = $_FILES["fileToUpload"]["name"];
echo "<img src='extras/uploads/' $thisImage>"; 
$realise = $_POST['submit'];
while ($realise == true){ 
echo "<img width=20% margin=auto class=gal src='extras/uploads/$realise'>"; 
*/


$query = $db->query(
    "SELECT * FROM images
    ORDER BY uploadedOn DESC");

    if ($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            $imageURL ='extras/uploads/' .$row["file_name"]; ?>
            
            <img width=20% src="<?php echo $imageURL; ?>" alt="" />

            <?php
        
        } 
    }

?>


    </body>
    <footer>
    <?php include 'templates/footer.php' ?>
    </footer>
</html>