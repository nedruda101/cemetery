<?php
if(!isset($_SESSION)){
  session_start();    
}
include("../../config.php");
$con=connect();
extract($_POST);

$sql_occupied=$con->query("SELECT * FROM ((((`lot_owners` 
LEFT JOIN `deceased_persons` 
ON lot_owners.lot_owner_id=deceased_persons.lot_owner_id) 
INNER JOIN `tbl_lots` 
ON lot_owners.lot_id=tbl_lots.lot_id) 
INNER JOIN `tbl_blocks` 
ON tbl_lots.block_id=tbl_blocks.block_id) 
INNER JOIN `tbl_sites` 
ON tbl_lots.site_id=tbl_sites.site_id) 
WHERE `site_name`='$site_name' 
AND `sector`='$sector' 
AND deceased_persons.deceased_id IS NOT NULL;");

$sql_available=$con->query("SELECT * FROM ((((`lot_owners` 
LEFT JOIN `deceased_persons` 
ON lot_owners.lot_owner_id=deceased_persons.lot_owner_id) 
INNER JOIN `tbl_lots` 
ON lot_owners.lot_id=tbl_lots.lot_id) 
INNER JOIN `tbl_blocks` 
ON tbl_lots.block_id=tbl_blocks.block_id) 
INNER JOIN `tbl_sites` 
ON tbl_lots.site_id=tbl_sites.site_id) 
WHERE `site_name`='$site_name' 
AND `sector`='$sector' 
AND deceased_persons.deceased_id IS NULL;");

$output="";
$output2="";

while($row=$sql_occupied->fetch_array()){
  $output.="<div class='occupied-".explode(' ', trim($row["site_name"] ))[0]."-$row[sector]-block-$row[block_name]-lot-$row[lot_name]' title='Occupied'>
  </div>";
}
while($row=$sql_available->fetch_array()){
  $output.="<div class='vacant-".explode(' ', trim($row["site_name"] ))[0]."-$row[sector]-block-$row[block_name]-lot-$row[lot_name]' title='Vacant'>
  </div>";
}
echo $output;
echo $output2;