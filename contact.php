<html>
    <head>
        <link rel="stylesheet" href="css/main.css">
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,700&display=swap" rel="stylesheet"> 
        <title> The Book Club </title>
    </head>
    <body>
        <?php include 'templates/header.php' ?>
        <?php include 'templates/menu.php' ?>
        <div class="contact">
            
            <form>
            <h3>Contact us</h3>
                <div class="box">
                    <label for="subject"> Subject:</label><br>
                    <input type="text" id="subject" name="subject" value=""><br>
    	        </div>
                <div class="box">
                    <label for="name"> Name:</label><br>
                    <input type="text" id="name" name="name" value=""><br>
                </div>
                <div class="box"> 
                    <label for="email"> Email:</label><br>
                    <input type="text" id="email" name="email" value=""><br>
                </div>
                <div class="box">
                    <label for="message"> Your Message:</label><br>
                    <input type="text" id="message" name="message" value=""><br>
    	        </div>
                <div class="box">
                    <input type="submit" id="send" value="Send"><br>
    	        </div>

            </form>

        </div>
    </body>
    <footer>
    <?php include 'templates/footer.php' ?>
    </footer>
</html>