
<style>
table {
  width:100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
table#t01 tr:nth-child(even) {
  background-color: #eee;
}
table#t01 tr:nth-child(odd) {
 background-color: #fff;
}
table#t01 th {
  background-color: black;
  color: white;
}
</style>
<div class="row">
<div class="col-2 col-md-2">
</div>
<div class="col-10 col-md-10">
<?php 
print_r('matrimony_id');

foreach($matrimony_id AS $id){

print_r($id['matrimony_id']);
print_r($this->Reports_model->get_package($id['matrimony_id']));
echo '<br>';

}
exit();
?>

<table style="width:100%;" id="t01">
  <tr>
    <th>S.No</th>
    <th>Matrimony id</th>
    <th>total mobile views</th>
    <th>used mobile views</th>
  </tr>
<?php
$c=1;
$mobilecount=json_decode(json_encode($mobilecount),true);
foreach ($mobilecount as $row) { 
   
 //   print_r($row);
 //   echo '</pre>';
    
    
    ?> 

  <tr>
  <td><?= $c; ?></td>
    <td><?= $row['matrimony_id']; ?></td>
    <td><?= $row['total_mobileview']; ?></td>
    <td><?= $row['total']; ?></td>
  </tr>


    <?php $c++; } ?>
    </table>
    </div>
    </div>
    </div>
<!--    stdClass Object
(
    [matrimony_id] => 10969
    [total_mobileview] => 0 
    [total] => 0
)  -->