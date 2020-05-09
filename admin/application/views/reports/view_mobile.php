
<div class="row">
<div class="col-4 col-md-4">
</div>
<div class="col-8 col-md-8">
<table style="width:100%;">
  <tr>
    <th>Matrimony id</th>
    <th>total mobile views</th>
    <th>used mobile views</th>
  </tr>
<?php
$mobilecount=json_decode(json_encode($mobilecount),true);
foreach ($mobilecount as $row) { 
   
 //   print_r($row);
 //   echo '</pre>';
    
    
    ?> 

  <tr>
    <td><?= $row['matrimony_id']; ?></td>
    <td><?= $row['total_mobileview']; ?></td>
    <td><?= $row['total']; ?></td>
  </tr>


    <?php } ?>
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