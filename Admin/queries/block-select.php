<?php
if(!isset($_SESSION)){
  session_start();    
}
include("../../config.php");
$con=connect();
extract($_POST);

$block_lot=$con->query("SELECT * FROM `tbl_blocks` WHERE `site_id`='$site_id' AND `sector`='$sector' ORDER BY `block_id` ASC");
if($block_lot->num_rows!=0){
  while($row=$block_lot->fetch_array()){
    echo "<option value=".$row['block_id'].">".$row['block_name']."</option>";
  }
}else{
    echo "<option value='' disabled>No block available</option>";
}