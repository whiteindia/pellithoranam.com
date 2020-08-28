    <!-- TOP-BANNER -->
    <div class="wed-wrapper">
    <div class="wed-member-ship-banner">
      <div class="container container-custom1">
        <div class="row">
          <div class="col-md-6">
            <div class="wed-member-details">
              <ul>
                <div class="wed-member-head">
                  <div class="wed-member-circle"><img src="<?php echo base_url();?>assets/img/m1.png"></div>
                  <h4>MEMBERSHIP DETAILS</h4>
                  <div class="clearfix"></div>
                </div>
                <br>
                <li>
                  <div class="wed-member-child1">Matrimony ID</div>
                  <div class="wed-member-child2">:</div>
                  <div class="wed-member-child3">T<?php echo $data->matrimony_id;?></div>
                  <div class="clearfix"></div>
                </li>
                 <?php if($data->membership_package==1){?>
                <li>
                  <div class="wed-member-child1">Membership Type</div>
                  <div class="wed-member-child2">:</div>                 
                  <div class="wed-member-child3"><?php echo $data->package_name;?></div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-member-child1">Membership Status</div>
                  <div class="wed-member-child2">:</div>
                  <div class="wed-member-child3">Active</div>
                  <div class="clearfix"></div>
                </li>
                
                <li>
                  <div class="wed-member-child1">Membership Validity</div>
                  <div class="wed-member-child2">:</div>
                  <div class="wed-member-child3">Unlimited</div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-member-child1">Renewal Due Date</div>
                  <div class="wed-member-child2">:</div>
                  <div class="wed-member-child3">Unlimited</div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-member-child1">Last Renewed</div>
                  <div class="wed-member-child2">:</div>
                  <div class="wed-member-child3">Unlimited </div>
                  <div class="clearfix"></div>
                </li>
                <?php }else { ?>
                     <li>
                  <div class="wed-member-child1">Membership Type</div>
                  <div class="wed-member-child2">:</div>                 
                  <div class="wed-member-child3"><?php echo $data->package_name;?></div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-member-child1">Membership Status</div>
                  <div class="wed-member-child2">:</div>
                  <div class="wed-member-child3">Active</div>
                  <div class="clearfix"></div>
                </li>
                
                <li>
                  <div class="wed-member-child1">Membership Validity</div>
                  <div class="wed-member-child2">:</div>
                  <div class="wed-member-child3"><?php echo ($data->month)*30;?> Days</div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-member-child1">Renewal Due Date</div>
                  <div class="wed-member-child2">:</div>
                  <div class="wed-member-child3"><?php echo date("d F Y", strtotime($data->membership_expiry));?></div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-member-child1">Last Renewed</div>
                  <div class="wed-member-child2">:</div>
                  <div class="wed-member-child3"><?php echo date("d F Y", strtotime($data->membership_purchase));?> </div>
                  <div class="clearfix"></div>
                </li>
                <?php } ?>
              </ul>
              <br>
               <ul>
                <div class="wed-member-head">
                  <div class="wed-member-circle"><img src="<?php echo base_url();?>assets/img/m1.png"></div>
                  <h4>ADD ON PACKAGES</h4>
                  <div class="clearfix"></div>
                </div>
                <br>
               
                    <?php if($data->addon_package==0){?>
                <li>
                  <div class="wed-member-child1">Package Validity</div>
                  <div class="wed-member-child2">:</div>
                  <div class="wed-member-child3">NA</div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-member-child1">Last Renewed</div>
                  <div class="wed-member-child2">:</div>
                  <div class="wed-member-child3">NA</div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-member-child1">Renewed Due Date</div>
                  <div class="wed-member-child2">:</div>
                  <div class="wed-member-child3">NA</div>
                  <div class="clearfix"></div>
                </li>
                <?php }else{ ?>
                 <h5><?php echo $data1->package_name;?></h5>
                    <li>
                  <div class="wed-member-child1">Package Validity</div>
                  <div class="wed-member-child2">:</div>
                  <div class="wed-member-child3"><?php echo ($data1->month)*30;?> Days</div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-member-child1">Last Renewed</div>
                  <div class="wed-member-child2">:</div>
                  <div class="wed-member-child3"><?php echo date("d F Y", strtotime($data1->addon_purchase));?></div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-member-child1">Renewed Due Date</div>
                  <div class="wed-member-child2">:</div>
                  <div class="wed-member-child3"><?php echo date("d F Y", strtotime($data1->addon_expiry));?></div>
                  <div class="clearfix"></div>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="col-md-6">
            <div class="wed-member-details">
              <ul>
                <div class="wed-member-head">
                  <div class="wed-member-circle"><img src="<?php echo base_url();?>assets/img/m2.png"></div>
                  <h4>Profile access information</h4>
                  <div class="clearfix"></div>
                </div>
                <br>
                <li>
                  <div class="wed-member-child1">Total Profile access </div>
                  <div class="wed-member-child2">:</div>
                  <div class="wed-member-child3"><?php echo $data->total_mobileview;?></div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-member-child1"> Profile accessed till now</div>
                  <div class="wed-member-child2">:</div>
                  <div class="wed-member-child3"><?php echo $mobileview_count_used; ?></div>
                  <div class="clearfix"></div>
                </li>
              </ul>
              <br>
          <!--    <ul>
                <div class="wed-member-head">
                  <div class="wed-member-circle"><img src="<?php echo base_url();?>assets/img/m3.png"></div>
                  <h4>SMS COUNT </h4>
                  <div class="clearfix"></div>
                </div>
                <br>
                <li>
                  <div class="wed-member-child1">Total Count</div>
                  <div class="wed-member-child2">:</div>
                  <div class="wed-member-child3"><?php echo $data->total_sms;?></div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-member-child1">Count Left</div>
                  <div class="wed-member-child2">:</div>
                
                  <div class="wed-member-child3"><?php echo $sms_count; ?></div>
                
                  <div class="clearfix"></div>
                </li>
              </ul> -->
            </div>
          </div>
        </div>

      </div>
    </div>
    <br><br>
  <div class="wed-help-div">
    <div class="wed-help-assistance">
      <p>Need help? Here's one click assistance!   </p>
      <p><a href="#">Click here</a>and we will get in touch with you right away.</p>
    </div>
  </div>
  <div class="wed-space">
  </div>
</div>