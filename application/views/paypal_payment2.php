<div class= "container">
    <div class="col-lg-3 col-md-3 col-sm-2"></div>
    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
        <div class="section">
            <h2 class="section_head">PAYMENT SUCCESSFULLY COMPLETED</h2> 
            <form role="form" class='myform' id="" method="post">
                <div class="payment_page" style="">
                    <h3>Payment Details</h3>
                    <div class="section_det">
                        <div class="detail_list">
                            <div class="col-md-6"><b>Booking Id :</b></div>
                            <div class="col-md-6">: <?php echo $booked['txnid'];?></div>
                        </div>
                        <div class="detail_list">
                            <div class="col-md-6"><b>Name </b></div>
                            <div class="col-md-6">: <?php echo $user->profile_name;?></div>
                        </div>
                        <div class="detail_list">    
                            <div class="col-md-6"><b>Matrimoni Id </b></div>
                            <div class="col-md-6">: <?php echo $user->matrimony_id; ?></div>
                        </div>
                        <div class="detail_list">    
                            <div class="col-md-6"><b>Package Name </b></div>
                            <div class="col-md-6">: <?php echo $package->package_name; ?></div>
                        </div>
                        <div class="detail_list">    
                            <div class="col-md-6"><b>Amount</b></div>
                            <div class="col-md-6">: <?php echo $booked['purchase_amount']; ?></div>
                        </div>
                        <div class="detail_list">    
                            <div class="col-md-6"><b>Date</b></div>
                            <div class="col-md-6">: <?php echo $booked['purchase_date']; ?></div>
                        </div>
                    </div>
                </div>
           
            </form>
            <div class="home_cabin">
               <div class="btn home_btn"><a href="<?php echo base_url();?>search">HOME</a></div>
            </div>
        </div>
    <div class="col-lg-3 col-md-3 col-sm-2"></div>
    </div>
</div>