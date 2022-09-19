

<?php 
function getConn(){
  $mysqli = mysqli_connect('localhost', 'root', '', "dbproyecto");
  
  
  return $mysqli;
}
?>

  
<?php 



function getLocalizacion(){
    $mysqli = getConn();
    $id = $_POST['id'];
    $query = "SELECT * FROM `lecturas` WHERE id = $id";
    $result = $mysqli->query($query);
    $localizacion = '';
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
      $localizacion .= "<option value='$row[id]' >$row[localizacion]</option>";
    }
    return $localizacion;
  }
  
  echo getLocalizacion();