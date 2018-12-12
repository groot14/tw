<?php
header('Content-Type: text/plain');
$usn=array();
$name= array();
$conn = new mysqli("localhost","root","","weblab");
$query = "SELECT * FROM student";
$res =mysqli_query($conn,$query);
echo "Before sorting \n";
    while($row = mysqli_fetch_assoc($res)){
      echo $row["usn"]."\t".$row["name"]."\n";
      array_push($usn,$row["usn"]);
      $name[$row["usn"]] = $row["name"];
    }
$count=count($usn);
for ( $i = 0 ; $i < $count ; $i++ ){
      $pos= $i;
      for ( $j = $i + 1 ; $j < $count ; $j++ ) {
        if ( $usn[$j] < $usn[$pos] )
        {
        $pos= $j;
    }
  }
      $temp = $usn[$i];
      $usn[$i] = $usn[$pos];
      $usn[$pos] = $temp;
}
echo "After sorting\n";
foreach(  $usn as $u ){
  echo $u."\t".$name[$u]."\n"; 
}
?>