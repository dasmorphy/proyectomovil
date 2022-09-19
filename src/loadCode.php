

<?php 
function getConn(){
  $mysqli = mysqli_connect('localhost', 'root', '', "dbproyecto");
  
  
  return $mysqli;
}
?>

  
<?php 



function getCode(){
    $mysqli = getConn();
    $query = "SELECT * FROM `lecturas`";
    $result = $mysqli->query($query);
    $lectura = '<option  value="" disabled selected>Seleccione: </option>';
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
      $lectura .= "<option value='$row[id]'>$row[codigo]</option>";
      
    }
    return $lectura;
}
  
echo getCode();


