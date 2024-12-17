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
                $First_Name= $_REQUEST['firstName'];
                $Last_Name= $_REQUEST['lastName'];
                $User_name= $_REQUEST['username'];
                $Email= $_REQUEST['email'];
                $Phone_number= $_REQUEST['phone'];
                $City= $_REQUEST['city'];
                $Address= $_REQUEST['address'];
                $NameOnCard= $_REQUEST['ccName'];
                $CardNumber= $_REQUEST['ccNumber'];
                $Expiration= $_REQUEST['ccExpiration'];
                $cvv= $_REQUEST['ccCVV'];
           
                $sql = "INSERT INTO checkout VALUES ('$First_Name','$Last_Name','$User_name','$Email','$Phone_number','$City','$Address','$NameOnCard','$CardNumber','$Expiration','$cvv')";
            
                if(mysqli_query($conn,$sql)){
                echo "<h2>Payment Successful</h2>";
                echo"<h3>Your order will be delivered to your specified address within twenty minutes.</h3>"; 
                echo "First Name: $First_Name<br>";
                echo "Email: $Email<br>";
                echo "Phone: $Phone_number<br>";
                echo "Billing Address: $Address<br>";
                echo "Payment: $NameOnCard<br>";
                echo"<h2>Thank you !</h2";
                

                } else {
                    echo "ERROR: Hush! sorry $sql."
                    . mysqli_error($conn);
                }
                //close connection
                mysqli_close($conn)

            ?>
    </body>
</html>