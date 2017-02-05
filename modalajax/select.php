<?php
require 'connect.php';
$uid = $_POST['id'];
$hash = $mysqli->real_escape_string($uid);
$output = "";
$query = $mysqli->query("SELECT * FROM t_teacher WHERE t_id='$hash'");
$output.= "<table class='table table-striped' > ";
while ($row = $query->fetch_object() ) {
  $output.= "<tr>
                <td>Name</td>
                <td>$row->t_name</td>
              </tr>";
  $output.= "<tr>
                <td>lastname</td>
                <td>$row->t_lastname</td>
             </tr>";
}
$output.= "</table>";
echo $output  ;

 ?>
