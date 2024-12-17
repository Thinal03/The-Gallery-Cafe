<html>
    <head>
</head>


    <body>
            <?php
            $conn=mysqli_connect("localhost", "root","","the_gallery_cafe");

            // Check Connection
            if($conn === false){
                die("ERROR: Could not connect."
                .mysqli_connect_error());
            }
            $Name= $_REQUEST['name'];
            $Email= $_REQUEST['email'];
            $Phone_Number= $_REQUEST['phone'];
            $Subject= $_REQUEST['subject'];
            $Message = $_REQUEST['message'];
           
            $sql = "INSERT INTO Usermessage VALUES ('$Name','$Email','$Phone_Number','$Subject','$Message')";
            if(mysqli_query($conn,$sql)){
                echo "Your Message has been sent:<br>";
                echo "Name: " . $Name . "<br>";
                echo "Email: " . $Email . "<br>";
                echo "Message: " . $Message . "<br>";
                echo "Thank You !";
            } else {
                echo "ERROR: Hush! sorry $sql."
                . mysqli_error($conn);
            }
            //close connection
            mysqli_close($conn)

            ?>
    </body>
</html>



