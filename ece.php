<<?php
$insert = false;
if(isset($_POST['save'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $databasename = "task3";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password,$databasename);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
     

    // Collect post variables
    $CS = $_POST['CS'];
    $VLSI = $_POST['VLSI'];
    $COOS = $_POST['COOS'];
    $OOP = $_POST['OOP'];
    $eCAD = $_POST['eCAD'];
    $sql = "INSERT INTO ece (`CS`, `VLSI`, `COOS`, `OOP`,`eCAD`, `date`) VALUES ('$CS', '$VLSI', '$COOS', '$OOP', '$eCAD', current_timestamp());";


    // Execute the query
    if($con->query($sql) == true){
        

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECE</title>
    <style>
           body {
            background-image: url('taskimg1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0px;
        }

        .main-div{
            background-color: rgba(51, 44, 45, 0.479);
            border: none;
            height: 540px;
            width: 40%;
            margin: 1% 0% 0% 30%;
            border-radius: 20px;
            box-shadow: 10px 10px 5px rgba(128, 128, 128, 0.418);
            padding-top: 1%;
        }
        h2 {
            text-align: center;
            font-size: 30px;
            margin-top: 0px;
            margin-bottom: 2px;
        }
        .inner-div {
            display: flex;
            flex-direction: column;
            padding: 1% 0% 5% 25%;
        }

        input {
            margin: 1% 0% 1% 0%;
            padding-left: 2%;
            font-size: 1vw;
            height: 40px;
            width: 60%;
            border: none;
            border-radius: 5px;

        }

        button {
            width: 62%;
            height: 40px;
            padding: 2%;
            margin-top: 4%;
            border: none;
            background-color: white;
            border-radius: 5px;
            transition: 0.1s;
        }

        button:hover {
            background-color: black;
           color: white;
        }

        label {
            font-size: 25px;
        }
        .msg{
            color:green;
        }
        .footer1{
           text-align: center;
           color: black;
           font-size: 2vw;
           margin:3% 0% 0% 0%
           
     }
     a{
           
           color: black;
           font-size: 2vw;
           padding: 2% 2% 2% 2%;
          
       }
    </style>
</head>

<body>
    <h2>Online Result Display</h2>
    <hr color="black" width="70%" text-align="center">
    <?php
    if($insert == true){
    echo "<h2 class='msg'>Thanks for submitting your form.</h2>";
   
    }
    ?>
    <div class="main-div">
        <h2>Enter Student Marks</h2>
        <div class="inner-div">
            <form method="post" action="ece.php"><br>
                <label>CS</label><br>
                <input type="number" name="CS" required><br>
                <label>VLSI Design</label><br>
                <input type="number" name="VLSI" required><br>
                <label>COOS</label><br>
                <input type="number" name="COOS" required><br>
                <label>OOPs</label><br>
                <input type="number" name="OOP" required><br>
                <label>e-CAD</label><br>
                <input type="number" name="eCAD" required><br>
                <button name="save">Submit</button>
            </form>
        </div>
    </div>
    <div class="footer1">
<a href="index.html">Main Page</a>
</div>
</body>

</html>