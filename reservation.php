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
            $Phone= $_REQUEST['phone'];
            $Email= $_REQUEST['email'];
            $Date= $_REQUEST['date'];
            $Time = $_REQUEST['time'];
            $Area= $_REQUEST['area'];
            $NumberOfSeats= $_REQUEST['numberOfSeats'];
           
            $sql = "INSERT INTO Reservation VALUES ('$Name','$Phone','$Email','$Date','$Time','$Area',' $NumberOfSeats')";
            if(mysqli_query($conn,$sql)){
                echo "Reservation has been confirmed:<br>";
                echo "Name: " . $Name . "<br>";
                echo "Phone: " . $Phone . "<br>";
                echo "Email: " . $Email . "<br>";
                echo "Date: " . $Date . "<br>";
                echo "Time: " . $Time . "<br>";
                echo "Area: " . $Area . "<br>";
                echo "NumberOfSeats: " . $NumberOfSeats . "<br>";
                echo " Thank You !";
            } else {
                echo "Sorry Please try again.";
            }
            //close connection
            mysqli_close($conn)

            ?>
    </body>
</html>


