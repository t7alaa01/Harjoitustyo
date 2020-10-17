<?php 
  
 /* 
  * To change this license header, choose License Headers in Project Properties. 
  * To change this template file, choose Tools | Templates 
  * and open the template in the editor. 
  */ 
 $host='localhost'; 
 $dbname='t7alaa01'; 
 $username='t7alaa01'; 
 $password='alanen12'; 
  
 $con=mysqli_connect($host,$username,$password,$dbname); 
  
 if (mysqli_connect_errno()) 
 { 
  echo "Yhteys epäonnistui" . mysqli_connect_error(); 
 } 
  
 $idtuote=mysqli_real_escape_string($con, 
  filter_input(INPUT_POST,'it',FILTER_SANITIZE_STRING)); 
 $tuotenimi=mysqli_real_escape_string($con, 
  filter_input(INPUT_POST,'tn',FILTER_SANITIZE_STRING)); 
 $valmistaja=mysqli_real_escape_string($con,$_POST['va']); 

 $hinta=mysqli_real_escape_string($con, 
  filter_input(INPUT_POST,'hi',FILTER_SANITIZE_STRING)); 

 
  
 $sql="INSERT INTO tuote (idtuote, tuotenimi, valmistaja,hinta) " 
  . "VALUES ('$idtuote','$tuotenimi','$valmistaja','$hinta')"; 
 // Tässä voi kutsua myös aliohjelmaa, esim. 
 /*$sql="CALL LisaaTekija('$etunimi','$sukunimi')"; */ 
 //$sql="INSERT INTO Tekija (Etunimi, Sukunimi) VALUES ('$etunimi','$sukunimi')"; 
 if (!mysqli_query($con, $sql)){ 
  die('Error: ' . mysqli_error($con)); 
 } 
 echo "1 record added"; 
 mysqli_close($con); 
  
/* 
 * To change this license header, choose License Headers in Project Properties. 
 * To change this template file, choose Tools | Templates 
 * and open the template in the editor. 
 */ 
 ?>