<?php
include 'exceldb.php';
echo "JIT123";
if(isset($_POST["Import"])){
 
 
		echo $filename=$_FILES["file"]["tmp_name"];
 
 
		 if($_FILES["file"]["size"] > 0)
		 {
 
		  	$file = fopen($filename, "r");
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
 
	         echo "\n".$emapData[1];
  //It wiil insert a row to our subject table from our csv file`
	           $sql = "INSERT into Faculty_Master(`faculty_name`,`faculty_father_name`,`faculty_surname`,`faculty_designation`,`faculty_mail_id`,`faculty_mobile`,`faculty_address`,`faculty_status`,`faculty_joining_date`,`o_id`) values('$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]','$emapData[8]','$emapData[9]','$emapData[10]')";
	         //we are using mysql_query function. it returns a resource on true else False on error
              //  echo "Qyery".$sql; 
	          $result = mysqli_query($conn,$sql);
	          echo $result;
				if(!$result )
				{
				echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"index.php\"
						</script>";
 
				}
 
	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	         echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"index_1.php\"
					</script>";
 
 
 
			 //close of connection
			mysql_close($conn); 

		 }
	}	 
?>	
