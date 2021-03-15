<html>
<link rel="stylesheet" href="css/main.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,700&display=swap" rel="stylesheet"> 
        
        <?php include 'templates/header.php' ?>
        <?php include 'templates/menu.php' ?>

    <body>
    <div style="margin: auto; width:50%;">
        <form action="" method="POST">
            <input type="text" name='user' placeholder="Enter your username"> <br>
            <input type="password" name='pass' placeholder="Enter your password"> <br>
            <button type=submit value= "<?php echo $UserID; ?>" name= 'Submit'> Submit </button>
        </form>
        <br>
    </div> 

    <?php
        /*$UserID = $_POST ['Submit'];
        echo '<table style="margin-left: 20; margin-right: 20; width:50%;" bgcolor="DFA79D" cellpadding="15">';
            echo"<form action= method= POST> ";
            echo "<input type=text name='user' placeholder=Enter your username>";
            echo "<input type=password name='pass' placeholder=Enter your password>";
            echo "<button type=submit value= ".$UserID." name= 'Submit'> Submit </button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
            
        

        echo "</table>";
    /*
    $username = $_POST['username'];
    $password = $_POST['password']; 

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password']; 
        $query = "SELECT * from user WHERE Username ='$username' AND Password = '$password'";
       
        $stmt = $db->prepare($query);
        $stmt->bind_result($UserID, $Username, $Password, $UserType);
        $stmt -> execute();

        echo "Hey $username<br>";
        
        echo "$Username";

        if ($username == 'Username' && $password == 'Password'){
            echo "<h2> Welcome $Username </h2>";
        } else {
            echo "<h2> Log in failed! </h2>";
        }

    }
    */

     include 'config.php';
     include 'connect.php';

    if(isset($_POST) && !empty($_POST)){
    $Username = $_POST['user'];
    $Password = $_POST['pass'];

    $Username = htmlentities ($Username); //cross
    $Password = htmlentities ($Password);
   // $UserType = htmlentities ($UserType);   SQL PROTECTION!
    $Username = mysqli_real_escape_string($db,$Username);
    $Password = mysqli_real_escape_string($db,$Password); 
   // $UserType = mysqli_real_escape_string($db,$UserType); 

    $sql = "SELECT * FROM user WHERE Username = '$Username' AND Password = '$Password'";

    /*$stmt = $db->prepare($sql);
    $stmt->bind_param('ss', $Username, $Password);*/

    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    echo "$count";
    /*$_SESSION['isadmin'] = false;*/
    $query = "SELECT * from user";

    $stmt = $db->prepare($query);
    $stmt->bind_result($UserID, $Username, $Password, $UserType);
    $stmt -> execute();
   // while($stmt -> fetch()){
        if ($count == 1){
            
            $_SESSION['userID'] = $row['UserID'];
            $_SESSION['username'] = $row['Username'];
            $_SESSION['password'] = $row['Password'];
            $_SESSION['userType'] = $row['UserType'];
            header('Location:gallery.php');

            /*if ($UserType == 'Admin'){
                $_SESSION['isadmin'] = true;
               // admin();
                header('Location:gallery.php');
            }*/
            
           // header('Location:gallery.php');
            /*
            $query = "SELECT UserType 
                        FROM user
                        WHERE Username =$Username ";
                        echo "$query";
            $stmt = $db->prepare($query);
            $stmt -> execute();
            echo "$query";*/
        } else {
            echo "<h2> Log in failed! </h2>";
        }
    }
//}

      /*$stmt = $db->prepare($sql);
    $stmt->bind_param('ss', $Username, $Password);
    $stmt->bind_result($UserID, $Username, $Password, $UserType);
    $stmt->execute();*/
 
    ?>
    </body>
    <footer>
        <?php include 'templates/footer.php' ?>
    </footer>
</html>