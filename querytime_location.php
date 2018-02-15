<?php

    require_once __DIR__ . '/db_config.php';
        
	$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD,DB_DATABASE);
		
    if (!$conn) {
		die ("Can't connect to MySQL: " . mysqli_connect_error());  }
	
	 if (isset($_GET["querytime"])) {
     $querytime = $_GET['querytime'];}
	
	
	
	$query = "SELECT * FROM locations WHERE time_stamp = $querytime " ;
	
		 
	$result = mysqli_query($conn, $query);
	
	if (!$result) {
		die ('SQL Error: ' . mysqli_error($conn));
		}
 
 
    if (mysqli_num_rows($result) > 0) {
    
	$response["locations"] = array();
	
		 
         while ($row = mysqli_fetch_array($result)) {
			 
       
			$location = array();
			$location["pid"] = $row["pid"];
			$location["latitude"] = $row["latitude"];
			$location["longitude"] = $row["longitude"];
			$location["time_stamp"] = $row["time_stamp"];
     
		    array_push($response["locations"], $location);	
	       	
        }
 
        echo json_encode($response);
	}
 
	  mysqli_free_result($result);
      mysqli_close($conn);
   
 
?>