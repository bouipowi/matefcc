<?php

  $con=mysqli_connect("us-cdbr-azure-southcentral-f.cloudapp.net","b9a859ae739783","903a2e5b","matefcc");   
//	$con=mysqli_connect("localhost","root","","seguimiento_academico");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$nrc= $_POST['nrc'];
	if(isset($_POST['matriculas'])) {
    $json = $_POST['matriculas'];
   // print_r($json);
   $error = false;

      foreach($json as $item) {
        $mat=$item['matricula'];
       if(!mysqli_query($con,"DELETE FROM inscripcion where id_alumno=$mat and id_curso=$nrc")){
           $error = true; //error
       }
    }
    if($error){
        echo 0; //error
    }else echo 1;


mysqli_close($con);
  } else {
    echo "Error post";
  }

?>