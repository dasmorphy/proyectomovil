
<?php 
function getConn(){
  $mysqli = mysqli_connect('localhost', 'root', '', "dbproyecto");
  
  
  return $mysqli;
}
?>

  
<?php 

function GetTitular(){
  $mysqli = getConn();
  $id = $_POST['id'];
  $query = "SELECT * FROM `lecturas` WHERE id = $id";
  $result = $mysqli->query($query);
  $titular = '';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $titular .= "<option value='$row[id]'>$row[titular]</option>";
  }
  return $titular;
}

echo GetTitular();
