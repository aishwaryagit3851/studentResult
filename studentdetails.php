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
    $name = $_POST['name'];
    $rollno = $_POST['rollno'];
    $branch = $_POST['branch'];
    $semister = $_POST['semister'];
    $p3 = $_POST['p3'];
    $p4 = $_POST['p4'];
    $sql = "INSERT INTO studentdetails (`name`, `rollno`, `branch`, `semister`,`p3`,`p4`) VALUES ('$name', '$rollno', '$branch', '$semister','$p3','$p4');";


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
    <title>Student Details</title>
    <style>  body {
        background-image: url('taskimg1.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        margin: 0px;
        padding: 0px;
        
    }
      .main-div {
        background-color: rgba(51, 44, 45, 0.479);
        border: none;
        height: 560px;
        width: 33%;
        margin: 0% 0% 1% 33%;
        border-radius: 20px;
        box-shadow: 10px 10px 5px rgba(128, 128, 128, 0.418);
        padding-top: 1%;
    }
    h2{
        font-size: 3vw;
        text-align: center;
        margin: 0% 0% 0% 0%;
    }
    .inner-div {
        display: flex;
        flex-direction: column;
        padding: 0% 0% 1% 13%;
    }
    input {
        margin: 1% 0% 1% 0%;
        padding-left: 2%;
        font-size: 1vw;
        height: 30px;
        width: 80%;
        border: none;
        border-radius: 5px;

    }

    button {
        
        width: 83%;
        height: 30px;
        padding: 2%;
        margin-top: 2%;
        margin-bottom:4%;
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
        font-size: 2vw;
    }
    .msg{
            color:green;
            font-size:30px;
            margin:0% 0% 0% 0%
        }
        .footer1{
           text-align: center;
         
           font-size: 2vw;
           margin:1% 0% 0% 0%
           
        }
        .footer1 > a{
            color:black
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
        <h2>Student Details</h2>
        <div class="inner-div">
            <form name="myform" method="post" onsubmit="return val()" action="studentdetails.php">
                <label>Student Name</label><br>
                <input type="text" name="name" placeholder="Student Name" required><br>
                <label>Roll No</label><br>
                <input type="number" name="rollno" placeholder="Roll No" required><br>
                <label>Branch</label><br>
                <input id="branch1" type="text" name="branch" placeholder="Branch" required><br>
                <label>Semister</label><br>
                <input type="number" name="semister" placeholder="Semister" required><br>
                <label>Password</label><br>
                <input type="password" name="p3" placeholder="password" required><br>
                <label>Confirm Password</label><br>
                <input type="password" name="p4" placeholder="Confirm password" required><br>
               <a href=""><button name='save'>Submit</button></a>
            </form>
        </div>


    </div>
    <div class="footer1">
        <a href="index.html">Main Page</a>
        </div>
        <script>
    function val(){
       let x=document.forms["myform"]["p3"].value;
       let y=document.forms["myform"]["p4"].value;
       if(x!=y){
           alert("password did not match");
           return false;
       }
    }
</script>
</body>

</html>