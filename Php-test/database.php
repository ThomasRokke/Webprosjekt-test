<?php 
    // 1 . Create a database connection 

    $dbhost = "127.0.0.1"; 
    $dbuser = "root"; 
    $dbpass = "Pondus95";
    $dbname = "world";
    $connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    
    // Test if connection occured

    if(mysqli_connect_errno()) {
        die("Database connection failed: " .
            mysqli_connect_error() . 
            " (" . mysqli_connect_errno() . ")"); 
        
    }
    

?>

<?php 
    //2. Perform database query

    // .= blir det samme som å legge sammen queryen.

    $query  = "SELECT * ";
    $query .= "FROM country ";
    $query .= "WHERE Continent = 'Europe' ";

    $result = mysqli_query($connection, $query);
    //result er en 'resource'

    //test if there was a querry error
    if(!$result) {
        die("Database query has failed"); 
    }
    
    
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Basic html</title>

</head>
<body>
    
        
        
        <ol>
        <?php
        
        // 3. use returned data (if any)
    
        //it's not an php array . it mysql result set. 
        //Den incrementer row'en for oss.  Derfor funker ikke foreach
        //foreach - den prøver incremente 'pointeren'
       
        while($row = mysqli_fetch_assoc($result)) { 
            //output data from each row
           
           //  var_dump($row);
             /*
            echo $row["Code"] . "<br />";
            echo $row["Name"] . "<br />";
            echo $row["Continent"] . "<br />";
            echo $row["Region"] . "<br />";
            echo $row["SurfaceArea"] . "<br />";
            echo $row["IndepYear"] . "<br />";
            echo $row["Population"] . "<br />";
            echo $row["LifeExpectancy"] . "<br />";
            echo $row["GNP"] . "<br />";
            echo $row["GNOLD"] . "<br />";
            echo $row["LocalName"] . "<br />";
            */
          ?>
            
            <!--stopper midt i loopen - gjør litt HTML, også fortsetter--> 
            
        <li><?php echo $row["Name"]; ?></li>
            
       <?php
        } //avslutter while løkka. 
        ?>
      
    
    
    </ol>
    
    <?php 
        //4. Release returned data
        mysqli_free_result($result); 
    
    ?>
  

</body>
</html>

<?php 
    // 5. Close database connection 
    mysqli_close($connection); 

?>
