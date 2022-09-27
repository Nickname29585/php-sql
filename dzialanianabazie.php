<?php

 $user= 'root';

 $pass= '';

 $host = 'localhost';

 $base = 'ludzie'; //tutaj nazwa twojej bazy

 $con= mysqli_connect($host,$user,$pass, $base);

 mysqli_select_db($con,$base);

 

 if(isset($_GET['sub']))

 {

 $nr = $_GET['nr'];                        
 $name = $_GET['name'];                        
 $surname = $_GET['surname'];                        
 $score = $_GET['score'];                        

$query = "Insert into programatorzy(ID, Name, Surname, Score) values('$nr', '$name', '$surname', '$score')";                        

$run =mysqli_query($con,$query) or die(mysqli_error());                        

if($run){                        

 echo "Formularz zatwierdzony";                        

}
else{

 echo "formularz jest błędny";

}



 }

 if(isset($_GET['kasacja'])){

 $nr = $_GET['nr'];                        
$query = "delete from programatorzy where ID=$nr";                        
$run =mysqli_query($con,$query) or die(mysqli_error());                       
}



 if(isset($_GET['zmiana'])){

    $nr = $_GET['nr'];                        
    $name = $_GET['name'];                        
    $surname = $_GET['surname'];                        
    $score = $_GET['score'];                       
                       

$query = "update programatorzy set name='$name',surname='$surname',score='$score' where ID='$nr'";                        

$run =mysqli_query($con,$query) or die(mysqli_error());  
                   
 }



 if(isset($_GET['show'])){
    $nr = $_GET['nr'];                        
    $name = $_GET['name'];                        
    $surname = $_GET['surname'];                        
    $score = $_GET['score'];                       
$query = "select * from programatorzy";                        

$run =mysqli_query($con,$query) or die(mysqli_error());  
                   
 while($row=mysqli_fetch_array($run)){
     var_dump($row);
 }
}

?>
<html>
<head>

</head>
<body>
    <form method="get">
ID: <input name="nr"><br>
Imie:<input name="name"><br>
Nazwisko:<input name="surname"><br>
Score:<input name="score"><br>
<input type="submit" value="wprowadź" name="sub">
<input type="submit" value="poka tabele" name="show">
<input type="submit" value="zmień" name="zmiana">
<input type="submit" value="kasuj to" name="kasacja">
</form>

</body>
</html>
