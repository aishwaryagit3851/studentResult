<?php
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
    $JP = $_POST['JP'];
    $DBMS = $_POST['DBMS'];
    $OS = $_POST['OS'];
    $python = $_POST['python'];
    $WT = $_POST['WT'];
    $rollno = $_POST['rollno'];
    $sql = "INSERT INTO cse (`rollno`,`JP`, `DBMS`, `OS`, `python`, `WT`, `date`) VALUES ('$rollno','$JP', '$DBMS', '$OS', '$python', '$WT', current_timestamp());";


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

    if($insert == true){
     
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSE</title>
    
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
            height: 530px;
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

        .inner-div{
            display: flex;
            flex-direction: column;
            padding: 2% 0% 1% 27%;
        }

        input {
            margin: 1% 0% 1% 0%;
            padding-left: 2%;
            font-size: 1vw;
            height: 30px;
            width: 70%;
            border: none;
            border-radius: 5px;

        }

        button {
            width: 72%;
            height: 30px;
            padding: 2%;
            margin-top: 3%;
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
            padding-right: 2%;
           
            
        }

        @media screen and (max-width:1000px) {
            .cse {
                height: 550px;
            }
        }

        @media screen and (max-width:500px) {
            .cse {
                height: 450px;
            }
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
    <hr color="black" width="70%"text-align="center">
    <?php
    if($insert == true){
    echo "<h2 class='msg'>Thanks for submitting your form.</h2>";
   
    }
    ?>
    <div class="main-div">
        <h2>Enter Student Marks</h2>
        <div class="inner-div">
            <form method="post" action="cse.php">
            <label>Roll No</label><br>
            <input type="number" name="rollno" required><br>   
            <label>Java</label><br>
            <input type="number" name="JP" required><br>
            <label>DBMS </label><br>
            <input type="number" name="DBMS" required><br>
            
            <label>Operating System</label><br>
            <input type="number" name="OS" required><br>
            <label>Python      </label><br>
            <input type="number" name="python" required><br>
            <label>Web technology</label><br>
            <input type="number" name="WT" required><br>
            <button name="save">Submit</button>
        </form>
        </div>
    </div>
    <div class="footer1">
<a href="index.html">Main Page</a>
</div>
</body>

</html>