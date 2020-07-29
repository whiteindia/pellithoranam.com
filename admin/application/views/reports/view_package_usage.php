
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

//print_r($id['matrimony_id']);
print_r($this->Reports_model->get_package($id['matrimony_id']));
echo '<br>';

}

?>
29737Array ( [interest] => 0 [mails] => 0 [views] => 0 [sms] => 0
 [total_interest] => 5 [total_sendmail] => 2 [total_mobileview] => 10 [total_sms] => 0
  [membership_package] => 24 [membership_package_name] => PT-Welcome Offer July 2020 )
<table style="width:100%;" id="t01">
  <tr>
    <th>S.No</th>
    <th>Matrimony id</th>
    <th>interest</th>
    <th>mails</th>
    <th>views</th>
    <th>sms</th>
    <th>total mobile views</th>
    <th>membership package name</th>
  </tr>
<?php
$c=1;


print_r('matrimony_id');

foreach($matrimony_id AS $id){

//print_r($id['matrimony_id']);
$tc=$this->Reports_model->get_package($id['matrimony_id']);


//$mobilecount=json_decode(json_encode($mobilecount),true);
//foreach ($mobilecount as $row) { 
   
 //   print_r($row);
 //   echo '</pre>';
    /*
 29737Array ( [interest] => 0 [mails] => 0 [views] => 0 [sms] => 0
 [total_interest] => 5 [total_sendmail] => 2 [total_mobileview] => 10 [total_sms] => 0
  [membership_package] => 24 [membership_package_name] => PT-Welcome Offer July 2020 ) */
    ?> 

  <tr>
  <td><?= $c; ?></td>
    <td><?= $id['matrimony_id']; ?></td>
<td><?= $tc['interest']; ?>/<?= $tc['total_interest']; ?></td>
<td><?= $tc['mails']; ?>/<?= $tc['total_sendmail']; ?></td>
<td><?= $tc['views']; ?>/<?= $tc['total_mobileview']; ?></td>
<td><?= $tc['sms']; ?>/<?= $tc['total_sms']; ?></td>
<td><?= $tc['membership_package_name']; ?></td>
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