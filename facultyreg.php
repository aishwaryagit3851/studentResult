
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
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2=$_POST['password2'];
   
    $sql = "INSERT INTO facultyreg (`fname`, `email`, `password1`,`password2`) VALUES ('$fname', '$email', '$password1','$password2');";


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


    
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Registration</title>
    <style>
        body{
            background-image:url('taskimg1.jpg');
            background-repeat:no-repeat;
            background-size: cover;
        }
        h2{
            font-size: 3vw;
            text-align: center;
            margin: 1% 0% 1% 0%;
        }
        .main-div {
            background-color: rgba(51, 44, 45, 0.479);
            border: none;
            height: 440px;
            width: 33%;
            margin: 0% 0% 0% 33%;
            border-radius: 20px;
            box-shadow: 10px 10px 5px rgba(128, 128, 128, 0.418);
            padding-top: 1%;
        }
        .inner-div {
        display: flex;
        flex-direction: column;
        padding: 1% 0% 5% 13%;
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
        font-size: 2vw;
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
       .msg{
           color:green;
           font-size:35px;
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
        <h2>Faculty Details</h2>

    <div class="inner-div">
        
        <form name='myform' method="post" action="" onsubmit=" return val()">
            <label>Faculty Name</label><br>
            <input type="text" name="fname" placeholder="Faculty Name" required><br>
            <label>Email Id</label><br>
            <input type="email" name="email" placeholder="Email Id" required><br>
            <label>Password</label><br>
            <input type="password" name="password1" placeholder="password" id="p1" required><br>
            <label>Confirm Password</label><br>
            <input type="password" name="password2" placeholder=" Confirm password" id="p2" required><br>
           <button name='save'>Submit</button>
        </form>
    </div>
</div>
<div class="footer1">
<a href="index.html">Main Page</a>
</div>
<script>
    function val(){
       let x=document.forms["myform"]["password1"].value;
       let y=document.forms["myform"]["password2"].value;
       if(x!=y){
           alert("password did not match");
           return false;
       }
    }
</script>
</body>
</html>