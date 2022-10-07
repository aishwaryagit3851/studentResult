
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Results</title>
    
    <style>
         body {
            background-image: url('taskimg1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0px;
        }

        h2{
            font-size: 3vw;
            text-align: center;
            margin: 1% 0% 1% 0%;
        }
        table{
            margin:1% 30% 1% 30%;
            border-collapse:collapse;
        }
        td,th{
            padding:13px;
            border:2px solid black; 
            width:10%;
        }
        th{
            background:  rgba(51, 44, 45, 0.479);
            color:white;
        }
        td{
            background: rgba(51, 44, 45, 0.479);
            color:white;
        }
        .center{
           padding-left:46% ;
           
       }
       button {
            width: 100%;
            padding: 20px 60px 20px 60px;
            border: none;
            border-radius: 15px;
            background-color: rgba(51, 44, 45, 0.479);
            color: white;
            margin: 0% 0% 0% 0%;
        }
        button:hover{
            background-color: black;
            color: white;
        }
    </style>
    </head>
    <body>
    <div>
    <h2>Online Result Display</h2>
    <hr color="black" width="70%"text-align="center">
    <table>
          
           

            
            
       
            <?php
    
    

   
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
       
        $rollno=$_POST['rollno'];
        $sql1="SELECT * FROM studentdetails WHERE rollno='$rollno'";
        
        $x=$con->query($sql1);
       
       if($x -> num_rows > 0){
           $y=$x->fetch_assoc();
           echo"<tr><th>"."Name :"."</th><td>".$y["name"]."</td></tr><tr><th>"."Roll No :"."</th><td>".$y["rollno"]."</td></tr><tr><th>"."Semister :"."</th><td>".$y["semister"]."</td></tr>";
        
            if($y['branch']=="cse"){
                $sql2 = "SELECT JP,DBMS,OS,python,WT,(JP+DBMS+OS+python+WT) as Total1,((JP+DBMS+OS+python+WT)/500)*100 as Percent1 FROM cse";
                $a = $con->query($sql2);
                 $c= $a -> num_rows;
                 if($c!=false && $c>0){
                    $b=$a->fetch_assoc();
                    if($b['Percent1']>35)
                    {
                       $sqli="ALTER TABLE cse ADD result1 varchar(5);"; 
                    }
                    echo"<tr><th>"."JP :"."</th><td>".$b['JP']."</td></tr><tr><th>"."DBMS :"."</th><td>".$b['DBMS']."</td></tr><tr><th>"."OS :"."</th><td>".$b['OS']."</td></tr><tr><th>"."python :"."</th><td>".$b['python']."</td></tr><tr><th>"."WT :"."</th><td>".$b['WT']."</td></tr><tr><th>"."Total :"."</th><td>".$b['Total1']."</td></tr><tr><th>"."Percent :"."</th><td>".$b['Percent1']."%"."</td></tr>";
                    if($b['Percent1']>35){
                        echo"<h2>"."PASS"."</h2>";
                    }
                    else{
                       echo"<h2>"."FAIL"."</h2>"; 
                    }
                    echo"</table>";
                }
            }
                  
           else if($y['branch']=="ece"){
            $sql3 = "SELECT CS,VLSI,COOS,OOP,eCAD,(CS+VLSI+COOS+eCAD) as Total2,((CS+VLSI+COOS+eCAD)/500)*100 as Percent2 FROM ece";
            $d = $con->query($sql3);
             $f= $d -> num_rows;
             if($f!=false && $f>0){
                $e=$d->fetch_assoc();
             
                echo"<tr><th>"."CS :"."</th><td>".$e['CS']."</td></tr><tr><th>"."<tr><th>"."VLSI :"."</th><td>".$e['VLSI']."</td></tr><tr><th>"."COOS :"."</th><td>".$e['COOS']."</td></tr><tr><th>"."OOP :"."</th><td>".$e['OOP']."</td></tr><tr><th><tr><th>"."eCAD :"."</th><td>".$e['eCAD']."</td></tr><tr><th>"."Total :"."</th><td>".$e['Total2']."</td></tr><tr><th>"."Percent :"."</th><td>".$e['Percent2']."%"."</td></tr>";
                if($e['Percent2']>35){
                    echo"<h2>"."PASS"."</h2>";
                }
                else{
                   echo"<h2>"."FAIL"."</h2>"; 
                }
                echo"</table>";
            }

           }
           else if($y['branch']=="eee"){
            $sql4 = "SELECT AE,EM,DE,PS,PE,(AE+EM+DE+PS+PE) as Total3,((AE+EM+DE+PS+PE)/500)*100 as Percent3 FROM eee";
            $g = $con->query($sql4);
             $h= $g -> num_rows;
             if($h!=false && $h>0){
                $i=$g->fetch_assoc();
                if($b['Percent1']>35)
                    {
                       $sqlk="ALTER TABLE eee ADD result3 varchar(5);"; 
                    }
                echo"<tr><th>"."AE :"."</th><td>".$i['AE']."</td></tr><tr><th>"."<tr><th>"."EM :"."</th><td>".$i['EM']."</td></tr><tr><th>"."DE :"."</th><td>".$i['DE']."</td></tr><tr><th>"."PS :"."</th><td>".$i['PS']."</td></tr><tr><th>"."PE :"."</th><td>".$i['PE']."</td></tr><tr><th>"."Total :"."</th><td>".$i['Total3']."</td></tr><tr><th>"."Percent :"."</th><td>".$i['Percent3']."%"."</td></tr>";
                if($i['Percent3']>35){
                    echo"<h2>"."PASS"."</h2>";
                }
                else{
                   echo"<h2>"."FAIL"."</h2>"; 
                }
                echo"</table>";
            }

           }
          
    
         
       }
     
     
     
    
    $con->close(); 

    
?>
      
    </div>
    <div class="center">
    <a href="index.html" ><button style="width:15%;padding: 20px 30px 20px 30px;">Log out</button></a>
</div>
  
    </body>
</html>
