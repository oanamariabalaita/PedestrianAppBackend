<?php


    require_once __DIR__ . '/db_config.php';
        
	$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD,DB_DATABASE);
		
    if (!$conn) {
		die ("Can't connect to MySQL: " . mysqli_connect_error());  }
	echo "Connected successfully";
 
    $response = array();
 
    if (isset($_POST['latitude']) && isset($_POST['longitude'])) {
 
		$latitude = $_POST['latitude'];
		$longitude = $_POST['longitude'];
		
		$float_value_of_latitudine = floatval($latitude);
		$float_value_of_longitudine = floatval($longitude);
	
		$query = "INSERT INTO locations(latitude, longitude) VALUES('$float_value_of_latitudine', '$float_value_of_longitudine')";
 
		$result = mysqli_query($conn,$query);

 
        if ($result) {
             echo "New record created successfully";
			
             
               } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                       }
	
          echo json_encode($response);
	}
	
       	mysqli_close($conn);
	
	
?>