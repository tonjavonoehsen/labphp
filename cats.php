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
    header ('content-type: application/json');
    $url = 'https://catfact.ninja/';
    
  

    ?> 

    <?php   echo '<table style="margin-left: auto; margin-right: auto;" bgcolor="DFA79D" cellpadding="15">';
            echo '<tr><b><th>Cat Breed</th> <th> Cat Fact </th>';

            echo "<tr>";
            //echo "<td> $Title </td> <td> $ISBNnumber </td> <td> $PageNumber </td>";
            echo "<td> 
                <form action=  method= POST> 
            <button type=submit value=  name= 'Breed'> Generate cat breed</button>
            <button type=submit value=  name= 'Fact'> Generate cat fact</button>
                </form>
        </td>";
    echo "</tr>";
    
    /*$cc = curl_init(); // initialise a curl session $CC = curl connection
    curl_setopt ($cc, CURLOPT_URL, $url); //set an option for a curl transfer
    curl_setopt ($cc, CURLOPT_RETURNTRANSFER, true);*/

   
if (isset($_POST['Breed'])) {
    $cc = curl_init(); // initialise a curl session $CC = curl connection
    curl_setopt ($cc, CURLOPT_URL, 'https://catfact.ninja/breeds'); //set an option for a curl transfer
    curl_setopt ($cc, CURLOPT_RETURNTRANSFER, true);
    curl_setopt ($cc, CURLOPT_CUSTOMREQUEST, "GET");


    $output = curl_exec($cc); //run CURL
    curl_close($cc); //end the curl call

    $jsonArrayResponse - json_decode($output);

    echo $output;
}

    ?>
    </body>

    <footer>
    <?php include 'templates/footer.php' ?>
    </footer>
</html>