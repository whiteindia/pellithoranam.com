<?php
$settings = get_setting();
$id_prefix = $settings->id_prefix;
?>
<!-- TOP-BANNER -->

<div class="wed-settings-bay">
	<div class="container container-custom">
		<h3>Messages</h3>
		<div class="wed-setting-tab-bay1">
			<ul>
				<li class="active">
					<a data-toggle="tab" href="#inbox" id="inbox_click" onclick="update_url('?inbox');">
						<div class="wed-img-bg">
							<img src="<?php echo base_url(); ?>assets/img/inbox.png">
						</div>
						<p>
							Inbox
						</p>
					</a>
					<div class="arrow-up"></div>
				</li>
				<li>
					<a data-toggle="tab" href="#send" id="sent_click" onclick="update_url('?send');">
						<div class="wed-img-bg">
							<img src="<?php echo base_url(); ?>assets/img/send.png">
						</div>
						<p>
							Send
						</p>
					</a>
					<div class="arrow-up"></div>
				</li>
            <!--<li>
				<a data-toggle="tab" href="#chat">
				<div class="wed-img-bg">
					<img src="<?php echo base_url(); ?>assets/img/chat.png">
				</div>
				<p>
					Chat
				</p>
				</a>
				<div class="arrow-up"></div>
			</li>-->
            <!--<li>
              <a data-toggle="tab" href="#filtered">
              <div class="wed-img-bg">
                <img src="<?php echo base_url(); ?>assets/img/filtered.png">
              </div>
              <p>
                Filtered
              </p></a>
                <div class="arrow-up"></div>
            </li>-->
            <li>
            	<a data-toggle="tab" href="#trash" id="trash_click" onclick="update_url('?trash');">
            		<div class="wed-img-bg">
            			<img src="<?php echo base_url(); ?>assets/img/trash.png">
            		</div>
            		<p>
            			Trash
            		</p>
            	</a>
            	<div class="arrow-up"></div>
            </li>
            <div class="clearfix"></div>
        </ul>
    </div>
</div>
</div>
<div class="wed-setting-tab-content-bay">
	<div class="container container-custom">
		<div class="tab-content">

			<!-- INBOX-TAB -->

			<div id="inbox" class="tab-pane fade in active animated slideInUp">
				<div class="wed-acpt-bay">
					<ul>
						<li class="active" data-toggle="tab" href="#pending">Pending</li>
						<li data-toggle="tab" href="#accept">Accepted</li>
						<li data-toggle="tab" href="#decline">Declined</li>
					</ul>
				</div>
				<div class="wed-acpt-content">
					<div class="tab-content">
						<p>This folder contains all communication that you haven't responded to.</p>

						<!-- PENDING-INBOX -->

						<div id="pending" class="tab-pane fade in active animated fadeInUp">
						<form method="POST" id="inboxpendingform" >	
							<div class="wed-inbox-top">
								<div class="wed-inbox-top-left">
									<div class="wed-custom-msg">
										<input id="check2" type="checkbox" name="check" value="check1">
										<label for="check2">Select all</label>
										<div class="clearfix"></div>
									</div>
									<!--<span class="wed-btn-top">Mark as read</span>-->
									<span class="wed-btn-top alldelete">Delete</span>
									
								</div>
								<div class="wed-inbox-top-right">
									<div class="dropdown">
										<button class="wed-inbox-select dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
											All
										</button>
										<ul class="dropdown-menu wed-filter-msg-menu" aria-labelledby="dropdownMenu1">
											<li>
												<div class="wed-custom-msg">
													<input id="check21" type="checkbox" name="check" value="check1">
													<label for="check21">Option One</label>
													<div class="clearfix"></div>
												</div>
											</li>
											<li>
												<div class="wed-custom-msg">
													<input id="check22" type="checkbox" name="check" value="check1">
													<label for="check22">Option One</label>
													<div class="clearfix"></div>
												</div>
											</li>
											<li>
												<div class="wed-custom-msg">
													<input id="check23" type="checkbox" name="check" value="check1">
													<label for="check22">Option One</label>
													<div class="clearfix"></div>
												</div>
											</li>
											<li>
												<button class="wed-filter-submit">Submit</button>
											</li>
										</ul>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<?php if(!empty($inbox_pending)) { foreach($inbox_pending as $msgsd) { //print_r($msgsd);
								$msgs = $msgsd; 
								$arr = end($msgsd->history); ?>
								
							<div class="wed-search-listing">
							<span class="wed-btn-top delete" data-id="<?php echo $msgs->matrimony_id;?>">Delete</span>
								<ul>
									 <?php if($msgs->profile_photo == "") { 
									 	$img = "assets/img/pic4.png"; } 
									 else if($msgs->profile_photo != "" && $msgs->profile_preference==0) { 
									 	$img = $msgs->profile_photo; } 
									 else if($msgs->profile_photo != "" && $msgs->profile_preference==1) { 
									 	$img = $msgs->profile_photo_blured; } 
									 ?>
									<li class="ind-divi" data-toggle="modal" data-mid="<?php echo $msgs->matrimony_id ?>" data-typ="1" data-nme="<?php echo $msgs->profile_name ?>" data-pic="<?php echo $img ?>"  data-target="#msgthread">
										<div class="close"></div>
										<div class="web-search-photo">
											<!-- <div class="web-search-pic">
												<?php if($msgs->profile_photo =="") { ?>
												<img src="<?php echo base_url(); ?>assets/img/pic4.png">
												<?php } else { ?>
												<img src="<?php echo base_url().$msgs->profile_photo;?>">
												<?php } ?>
											</div> -->
											<div class="web-search-pic">
					                          	<img src="<?php echo base_url().$img; ?>">
					                        </div>
											<h5><?php echo $msgs->profile_name ?></h5>
											<p><?php echo $id_prefix.$msgs->matrimony_id ?></p>
											<br>
											<input type="hidden" name="matid[]" value="<?php echo $msgs->matrimony_id ?>" >
											<!-- <span><img src="<?php echo base_url(); ?>assets/img/online.png">Online</span> -->
										</div>
										<div class="web-search-detail">

											<div class="wed-msg-top">
												<!-- <div class="wed-premium">Premium member</div> -->
												<!--<div class="wed-msg-top-left">
													<span><img src="<?php echo base_url(); ?>assets/img/mob.png"></span><span><img src="<?php echo base_url(); ?>assets/img/dot.png"></span>
												</div>-->
												<div class="wed-msg-top-right">
													<span class="msg-alert">MESSAGE RECEIVED</span>
													<span class="msg-date"><?php echo $arr->history_datetime; ?></span>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="list">
												<ul>
													<li>
														<div class="childs1">Age</div>
														<div class="childs2"><?php echo $msgs->age ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Height</div>
														<div class="childs2"><?php echo $msgs->height ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Religion</div>
														<div class="childs2"><?php echo $msgs->religion_name ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Caste,Sub Caste</div>
														<div class="childs2"><?php echo $msgs->caste_name.", ".$msgs->sub_caste_name ?></div>
														<div class="clearfix"></div>
													</li>
												</ul>
											</div>
											<div class="list">
												<ul>
													<li>
														<div class="childs1">Star</div>
														<div class="childs2"><?php echo $msgs->star_name ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Location</div>
														<div class="childs2"><?php echo $msgs->city_name; ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Education</div>
														<div class="childs2"><?php echo $msgs->education ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Profession</div>
														<div class="childs2"><?php echo $msgs->occupation ?></div>
														<div class="clearfix"></div>
													</li>
												</ul>
											</div>
											<div class="clearfix"></div>
											<div class="wed-msg-box">
												<?php if($arr->history_message != "") { ?>
													<h6>MESSAGE RECEIVED</h6>
													<p><?php echo $arr->history_message." <b> +".count($msgsd->history)." Conversations.</b>"?></p>
												<?php } else { 
													if($arr->history_type == "INTEREST_SENT") { ?>
														<h6><?php echo "INTEREST RECEIVED" ?></h6>
													<?php } else { ?>
														<h6><?php echo "ADD PHOTO REQUEST" ?></h6>
													<?php } ?>
												<p><?php echo "+ ".count($msgsd->history)." Conversations.</b>"?></p>
												<?php } ?>
											</div>
											<div class="wed-msg-box-bottom">
												<p>Would you like to communicate further?</p>
												<div class="wed-msg-box-right">
													<span class="yes">Yes</span>
													<span class="ntinterested">Not Interested</span>
												</div>
												<div class="clearfix"></div>
											</div>

										</div>
										<div class="clearfix"></div>
									</li>
								</ul>
							</div>
							
							<?php } } else { ?>
							<div class="wed-search-listing">
			                    <ul>
			                        <li class="no_records">
										<span class="msg-alert">EMPTY</span>
									</li>
								</ul>
							</div>
							<?php } ?>
						</div>
				</form>

						

						<!-- ACCEPT-INBOX -->

						<div id="accept" class="tab-pane fade animated fadeInUp">
						<form method="POST" id="inboxacceptform" >	
							<div class="wed-inbox-top">
								<div class="wed-inbox-top-left">
									<div class="wed-custom-msg">
										<input id="check1" type="checkbox" name="check" value="check1">
										<label for="check1">Select all</label>
										<div class="clearfix"></div>
									</div>
									<!--<span class="wed-btn-top">Mark as read</span>-->
									<span class="wed-btn-top alldelete">Delete</span>
								</div>
								<div class="wed-inbox-top-right">
									<div class="dropdown">
										<button class="wed-inbox-select dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
											All
										</button>
										<ul class="dropdown-menu wed-filter-msg-menu" aria-labelledby="dropdownMenu1">
											<li>
												<div class="wed-custom-msg">
													<input id="check21" type="checkbox" name="check" value="check1">
													<label for="check21">Option One</label>
													<div class="clearfix"></div>
												</div>
											</li>
											<li>
												<div class="wed-custom-msg">
													<input id="check22" type="checkbox" name="check" value="check1">
													<label for="check22">Option One</label>
													<div class="clearfix"></div>
												</div>
											</li>
											<li>
												<div class="wed-custom-msg">
													<input id="check23" type="checkbox" name="check" value="check1">
													<label for="check22">Option One</label>
													<div class="clearfix"></div>
												</div>
											</li>
											<li>
												<button class="wed-filter-submit">Submit</button>
											</li>
										</ul>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<?php if(!empty($inbox_accepted)) { foreach($inbox_accepted as $msgsd) { $msgs = $msgsd; $arr = end($msgsd->history); ?>
							<span class="wed-btn-top delete" data-id="<?php echo $msgs->matrimony_id;?>">Delete</span>
							<div class="wed-search-listing">
								<ul>
									<?php if($msgs->profile_photo == "") { 
									 	$img = "assets/img/pic4.png"; } 
									 else if($msgs->profile_photo != "" && $msgs->profile_preference==0) { 
									 	$img = $msgs->profile_photo; } 
									 else if($msgs->profile_photo != "" && $msgs->profile_preference==1) { 
									 	$img = $msgs->profile_photo_blured; } 
									 ?>
									<li class="ind-divi" data-toggle="modal" data-mid="<?php echo $msgs->matrimony_id ?>" data-typ="2" data-pic="<?php echo $img ?>"  data-target="#msgthread" data-nme="<?php echo $msgs->profile_name ?>">
										<div class="close"></div>
										<div class="web-search-photo">
											<div class="web-search-pic">
												<img src="<?php echo base_url().$img; ?>">
											</div>
											<h5><?php echo $msgs->profile_name ?></h5>
											<p><?php echo $id_prefix.$msgs->matrimony_id ?></p>
											
											<br>
											<input type="hidden" name="matid[]" value="<?php echo $msgs->matrimony_id ?>" >
											<!-- <span><img src="<?php echo base_url(); ?>assets/img/online.png">Online</span> -->
										</div>
										<div class="web-search-detail">
											<div class="wed-msg-top">
												<!-- <div class="wed-premium">Premium member</div> -->
												<!--<div class="wed-msg-top-left">
													<span><img src="<?php echo base_url(); ?>assets/img/mob.png"></span><span><img src="<?php echo base_url(); ?>assets/img/dot.png"></span>
												</div>-->
												<div class="wed-msg-top-right">
													<span class="msg-date"><?php echo $arr->history_datetime; ?></span>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="list">
												<ul>
													<li>
														<div class="childs1">Age</div>
														<div class="childs2"><?php echo $msgs->age ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Height</div>
														<div class="childs2"><?php echo $msgs->height ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Religion</div>
														<div class="childs2"><?php echo $msgs->religion_name ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Caste,Sub Caste</div>
														<div class="childs2"><?php echo $msgs->caste_name.", ".$msgs->sub_caste_name ?></div>
														<div class="clearfix"></div>
													</li>
												</ul>
											</div>
											<div class="list">
												<ul>
													<li>
														<div class="childs1">Star</div>
														<div class="childs2"><?php echo $msgs->star_name ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Location</div>
														<div class="childs2"><?php echo $msgs->city_name; ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Education</div>
														<div class="childs2"><?php echo $msgs->education ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Profession</div>
														<div class="childs2"><?php echo $msgs->occupation ?></div>
														<div class="clearfix"></div>
													</li>
												</ul>
											</div>
											<div class="clearfix"></div>
													<?php if($arr->history_type == "INTEREST_SENT") { ?>
														<span class="interest-accept">
															<?php echo "INTEREST ACCEPTED" ?>
														</span>
													<?php } else if($arr->history_type=="MESSAGE_SENT") { ?>
														<span class="interest-accept">
															<?php echo "REPLIED TO MESSAGE" ?>
														</span>
													<?php } else { ?>
														<span class="interest-accept">
															<?php echo "PHOTO REQUEST ACCEPTED" ?>
														</span>
													<?php } ?>
												<p><?php echo "+ ".count($msgsd->history)." Conversations.</b>"?></p>
											<div class="wed-msg-box-bottom">
												<div class="wed-msg-box-right">
													<span class="yes">Send mail</span>
													<span class="yes">Call now</span>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
										<div class="clearfix"></div>
									</li>
								</ul>
							</div>
							<?php } } else { ?>
								<div class="wed-search-listing">
			                    <ul>
			                        <li class="no_records">
										<span class="msg-alert">EMPTY</span>
									</li>
								</ul>
							</div>
							<?php } ?>
					</form>
						</div>

						<!-- DECLINE-INBOX -->

						<div id="decline" class="tab-pane fade animated fadeInUp">
						<form method="POST" id="inboxdeclineform" >	
							<div class="wed-inbox-top">
								<div class="wed-inbox-top-left">
									<div class="wed-custom-msg">
										<input id="check14" type="checkbox" name="check" value="check1">
										<label for="check14">Select all</label>
										<div class="clearfix"></div>
									</div>
									<!--<span class="wed-btn-top">Mark as read</span>-->
									<span class="wed-btn-top alldelete">Delete</span>
								</div>
								<div class="wed-inbox-top-right">
									<div class="dropdown">
										<button class="wed-inbox-select dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
											All
										</button>
										<ul class="dropdown-menu wed-filter-msg-menu" aria-labelledby="dropdownMenu1">
											<li>
												<div class="wed-custom-msg">
													<input id="check21" type="checkbox" name="check" value="check1">
													<label for="check21">Option One</label>
													<div class="clearfix"></div>
												</div>
											</li>
											<li>
												<div class="wed-custom-msg">
													<input id="check22" type="checkbox" name="check" value="check1">
													<label for="check22">Option One</label>
													<div class="clearfix"></div>
												</div>
											</li>
											<li>
												<div class="wed-custom-msg">
													<input id="check23" type="checkbox" name="check" value="check1">
													<label for="check22">Option One</label>
													<div class="clearfix"></div>
												</div>
											</li>
											<li>
												<button class="wed-filter-submit">Submit</button>
											</li>
										</ul>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							
							<?php if(!empty($inbox_declined)) { foreach($inbox_declined as $msgsd) { $msgs = $msgsd; $arr = end($msgsd->history); ?>
							<span class="wed-btn-top delete" data-id="<?php echo $msgs->matrimony_id;?>">Delete</span>
							<div class="wed-search-listing">
								<ul>
									<?php if($msgs->profile_photo == "") { 
									 	$img = "assets/img/pic4.png"; } 
									 else if($msgs->profile_photo != "" && $msgs->profile_preference==0) { 
									 	$img = $msgs->profile_photo; } 
									 else if($msgs->profile_photo != "" && $msgs->profile_preference==1) { 
									 	$img = $msgs->profile_photo_blured; } 
									 ?>
									<li class="ind-divi" data-toggle="modal" data-mid="<?php echo $msgs->matrimony_id ?>" data-typ="3" data-pic="<?php echo $img ?>"  data-target="#msgthread" data-nme="<?php echo $msgs->profile_name ?>">
										<div class="close"></div>
										<div class="web-search-photo">
											<div class="web-search-pic">
												<img src="<?php echo base_url().$img; ?>">
											</div>
											<h5><?php echo $msgs->profile_name ?></h5>
											<p><?php echo $id_prefix.$msgs->matrimony_id ?></p>
											<br>
											<input type="hidden" name="matid[]" value="<?php echo $msgs->matrimony_id ?>" >
											<!-- span><img src="<?php echo base_url(); ?>assets/img/online.png">Online</span> -->
										</div>
										<div class="web-search-detail">
											<div class="wed-msg-top">
												<!-- <div class="wed-premium">Premium member</div> -->
												<!--<div class="wed-msg-top-left">
													<span><img src="<?php echo base_url(); ?>assets/img/mob.png"></span><span><img src="<?php echo base_url(); ?>assets/img/dot.png"></span>
												</div>-->
												<div class="wed-msg-top-right">
													<span class="msg-date"><?php echo $arr->history_datetime; ?></span>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="list">
												<ul>
													<li>
														<div class="childs1">Age</div>
														<div class="childs2"><?php echo $msgs->age ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Height</div>
														<div class="childs2"><?php echo $msgs->height ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Religion</div>
														<div class="childs2"><?php echo $msgs->religion_name ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Caste,Sub Caste</div>
														<div class="childs2"><?php echo $msgs->caste_name.", ".$msgs->sub_caste_name ?></div>
														<div class="clearfix"></div>
													</li>
												</ul>
											</div>
											<div class="list">
												<ul>
													<li>
														<div class="childs1">Star</div>
														<div class="childs2"><?php echo $msgs->star_name ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Location</div>
														<div class="childs2"><?php echo $msgs->city_name; ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Education</div>
														<div class="childs2"><?php echo $msgs->education ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Profession</div>
														<div class="childs2"><?php echo $msgs->occupation ?></div>
														<div class="clearfix"></div>
													</li>
												</ul>
											</div>
											<div class="clearfix"></div>
											<?php if($arr->history_type == "INTEREST_SENT") { ?>
														<span class="interest-accept">
															<?php echo "INTEREST DECLINED" ?>
														</span>
												<?php } else if($arr->history_type=="MESSAGE_SENT") { } else { ?>
														<span class="interest-accept">
															<?php echo "PHOTO REQUEST DECLINED" ?>
														</span>
												<?php } ?>
											<p><?php echo count($msgsd->history)." Conversations.</b>"?></p>
											<div class="wed-msg-box-bottom">
												<div class="clearfix"></div>
											</div>

										</div>
										<div class="clearfix"></div>
									</li>
								</ul>
							</div> 
							<?php } } else { ?>
							<div class="wed-search-listing">
			                    <ul>
			                        <li class="no_records">
										<span class="msg-alert">EMPTY</span>
									</li>
								</ul>
							</div>
							<?php } ?>
						</form>
						</div>
					</div>
				</div>
			</div>

			<!-- SEND-TAB -->

			<div id="send" class="tab-pane fade animated slideInUp">
				<div class="wed-acpt-bay">
					<ul>
						<li class="active" data-toggle="tab" href="#allsent">All Sent</li>
						<li data-toggle="tab" href="#reply">Awaiting Reply</li>
					</ul>
				</div>
				<div class="wed-acpt-content">
					<div class="tab-content">
						<p>This folder contains all communication that have been sent.</p>

						<!-- ALL-SEND-SEND-TAB -->

						
						<div id="allsent" class="tab-pane fade in active animated fadeInUp">
							<form method="POST" id="inboxallsentform">	
							<div class="wed-inbox-top">

								<div class="wed-inbox-top-left">
									<div class="wed-custom-msg">
										<input id="check27" type="checkbox" name="check" value="check1">
										<label for="check27">Select all</label>
										<div class="clearfix"></div>
									</div>
									<!--<span class="wed-btn-top">Mark as read</span>-->
									<span class="wed-btn-top alldelete">Delete</span>
								</div>
								<div class="wed-inbox-top-right">
									<select class="wed-inbox-select">
										<option>All</option>
									</select>
								</div>
								<div class="clearfix"></div>
							</div>
							<?php if(!empty($sent_all)) { foreach($sent_all as $msgsd) { $msgs = $msgsd; $arr = end($msgsd->history); ?>
							<span class="wed-btn-top delete" data-id="<?php echo $msgs->matrimony_id;?>">Delete</span>
							<div class="wed-search-listing">
								<ul>
									<?php if($msgs->profile_photo == "") { 
									 	$img = "assets/img/user.jpg"; } 
									 else if($msgs->profile_photo != "" && $msgs->profile_preference==0) { 
									 	$img = $msgs->profile_photo; } 
									 else if($msgs->profile_photo != "" && $msgs->profile_preference==1) { 
									 	$img = $msgs->profile_photo_blured; } 
									 ?>
									<li class="ind-divi" data-toggle="modal" data-mid="<?php echo $msgs->matrimony_id ?>" data-typ="4" data-pic="<?php echo $img ?>"  data-target="#msgthread" data-nme="<?php echo $msgs->profile_name ?>">
										<div class="close delete" data-id="<?php echo $msgs->matrimony_id;?>"></div>
										<div class="web-search-photo">
											<div class="web-search-pic">
												<img src="<?php echo base_url().$img; ?>">
											</div>
											<h5><?php echo $msgs->profile_name ?></h5>
											<p><?php echo $id_prefix.$msgs->matrimony_id ?></p>
											<br>
												<input type="hidden" name="matid[]" value="<?php echo $msgs->matrimony_id ?>" >
											<!-- <span><img src="<?php echo base_url(); ?>assets/img/online.png">Online</span> -->
										</div>

										<div class="web-search-detail">
											<div class="wed-msg-top">
												<!-- div class="wed-premium">Premium member</div> -->
												<!--<div class="wed-msg-top-left">
													<span><img src="<?php echo base_url(); ?>assets/img/mob.png"></span><span><img src="<?php echo base_url(); ?>assets/img/dot.png"></span>
												</div>-->
												<div class="wed-msg-top-right">
													<span class="msg-date"><?php echo $arr->history_datetime; ?></span>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="list">
												<ul>
													<li>
														<div class="childs1">Age</div>
														<div class="childs2"><?php echo $msgs->age ?> Yrs</div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Height</div>
														<div class="childs2"><?php echo $msgs->height ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Religion</div>
														<div class="childs2"><?php echo $msgs->religion_name ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Caste,Sub Caste</div>
														<div class="childs2"><?php echo $msgs->caste_name.", ".$msgs->sub_caste_name ?></div>
														<div class="clearfix"></div>
													</li>
												</ul>
											</div>
											<div class="list">
												<ul>
													<li>
														<div class="childs1">Star</div>
														<div class="childs2"><?php echo $msgs->star_name ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Location</div>
														<div class="childs2"><?php echo $msgs->city_name; ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Education</div>
														<div class="childs2"><?php echo $msgs->education ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Profession</div>
														<div class="childs2"><?php echo $msgs->occupation ?></div>
														<div class="clearfix"></div>
													</li>
												</ul>
											</div>
											<div class="clearfix"></div>
											<div class="wed-msg-box">
												<?php if($arr->history_type == "INTEREST_SENT") { ?>
														<h6><?php echo "INTEREST SENT" ?></h6>
												<?php } else if($arr->history_type=="MESSAGE_SENT") { ?>
														<h6><?php echo "MESSAGE SENT" ?></h6>
												<?php } else { ?>
														<h6><?php echo "ADD PHOTO REQUESTED" ?></h6>
												<?php } ?>
											<p><?php echo count($msgsd->history)." Conversations.</b>"?></p>
											</div>
											<div class="wed-msg-box-bottom">
												<!-- <p><strong>+2</strong> More Conversations</p> -->
												<div class="wed-msg-box-right">
													<span class="yes">Send mail</span>
													<span class="yes">Call now</span>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
										<div class="clearfix"></div>
									</li>
								</ul>
							</div>
							<?php } } else { ?>
							<div class="wed-search-listing">
			                    <ul>
			                        <li class="no_records">
										<span class="msg-alert">EMPTY</span>
									</li>
								</ul>
							</div>
							<?php } ?>
							</form>
						</div>
						
						<!-- REPLY-SEND-TAB -->

						<div id="reply" class="tab-pane fade in animated fadeInUp">
						<div class="appendreply"></div>
						<form method="POST" id="inboxawaitform" >	
						<div id="replydiv">
							<div class="wed-inbox-top">

								<div class="wed-inbox-top-left">
									<div class="wed-custom-msg">
										<input id="check26" type="checkbox" name="check" value="check1">
										<label for="check26">Select all</label>
										<div class="clearfix"></div>
									</div>
									<!--<span class="wed-btn-top">Mark as read</span>-->
								<span class="wed-btn-top alldelete">Delete</span>
								</div>
								<div class="wed-inbox-top-right">
									<select class="wed-inbox-select">
										<option>All</option>
									</select>
								</div>
								<div class="clearfix"></div>
							</div>


							<?php if(!empty($sent_awaiting)) { foreach($sent_awaiting as $msgsd) { $msgs = $msgsd; $arr = end($msgsd->history); ?>
							<span id="deletereply" class="wed-btn-top" data-id="<?php echo $msgs->matrimony_id;?>">Delete</span>
							<div class="wed-search-listing">
								<ul>
									<?php if($msgs->profile_photo == "") { 
									 	$img = "assets/img/pic4.png"; } 
									 else if($msgs->profile_photo != "" && $msgs->profile_preference==0) { 
									 	$img = $msgs->profile_photo; } 
									 else if($msgs->profile_photo != "" && $msgs->profile_preference==1) { 
									 	$img = $msgs->profile_photo_blured; } 
									 ?>
									<li class="ind-divi" data-toggle="modal" data-mid="<?php echo $msgs->matrimony_id ?>" data-typ="5" data-pic="<?php echo $img ?>"  data-target="#msgthread" data-nme="<?php echo $msgs->profile_name ?>">
										<span id="deletereply" class="close" data-id="<?php echo $msgs->matrimony_id;?>"></span>
										<div class="web-search-photo">
											<div class="web-search-pic">
												<img src="<?php echo base_url().$img; ?>">
											</div>
											<h5><?php echo $msgs->profile_name ?></h5>
											<p><?php echo $id_prefix.$msgs->matrimony_id ?></p>
											<br>
											<input type="hidden" name="matid[]" value="<?php echo $msgs->matrimony_id ?>" >
											<!-- <span><img src="<?php echo base_url(); ?>assets/img/online.png">Online</span> -->
										</div>
										<div class="web-search-detail">
											<div class="wed-msg-top">
												<!-- <div class="wed-premium">Premium member</div> -->
												<!--<div class="wed-msg-top-left">
													<span><img src="<?php echo base_url(); ?>assets/img/mob.png"></span><span><img src="<?php echo base_url(); ?>assets/img/dot.png"></span>
												</div>-->
												<div class="wed-msg-top-right">
													<span class="msg-date"><?php echo $arr->history_datetime; ?></span>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="list">
												<ul>
													<li>
														<div class="childs1">Age</div>
														<div class="childs2"><?php echo $msgs->age ?> Yrs</div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Height</div>
														<div class="childs2"><?php echo $msgs->height ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Religion</div>
														<div class="childs2"><?php echo $msgs->religion_name ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Caste,Sub Caste</div>
														<div class="childs2"><?php echo $msgs->caste_name.", ".$msgs->sub_caste_name ?></div>
														<div class="clearfix"></div>
													</li>
												</ul>
											</div>
											<div class="list">
												<ul>
													<li>
														<div class="childs1">Star</div>
														<div class="childs2"><?php echo $msgs->star_name; ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Location</div>
														<div class="childs2"><?php echo $msgs->city_name; ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Education</div>
														<div class="childs2"><?php echo $msgs->education; ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Profession</div>
														<div class="childs2"><?php echo $msgs->occupation; ?></div>
														<div class="clearfix"></div>
													</li>
												</ul>
											</div>
											<div class="clearfix"></div>
											<div class="wed-msg-box">
												<?php if($arr->history_type == "INTEREST_SENT") { ?>
														<h6><?php echo "INTEREST SENT" ?></h6>
												<?php } else if($arr->history_type=="MESSAGE_SENT") { ?>
														<h6><?php echo "MESSAGE SENT" ?></h6>
												<?php } else { ?>
														<h6><?php echo "ADD PHOTO REQUESTED" ?></h6>
												<?php } ?>
											</div>
											<div class="wed-msg-box-bottom">
												<p><?php echo count($msgsd->history)." Conversations.</b>"?></p>
												<div class="wed-msg-box-right">
													<span class="yes">Send mail</span>
													<span class="yes">Call now</span>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
										<div class="clearfix"></div>
									</li>
								</ul>
							</div>
							<?php } } else { ?>
							<div class="wed-search-listing">
			                    <ul>
			                        <li class="no_records">
										<span class="msg-alert">EMPTY</span>
									</li>
								</ul>
							</div>
							<?php } ?>
						</div>
						</form>
					</div></div>
				</div>
			</div>

			<!-- CHAT-TAB -->
        <!--
				<div id="chat" class="tab-pane fade animated slideInUp">
				chat
			</div> -->

			<!-- FILTER-TAB -->

			<div id="filtered" class="tab-pane fade animated slideInUp">
				filtered
			</div>

			<!-- TRASH-TAB -->
 
			<div id="trash" class="tab-pane fade animated slideInUp">
				<div class="wed-acpt-content">
					<div class="tab-content">
						<p>This folder contains all communication that you haven't responded to.</p>
						<div class="wed-inbox-top">
							<div class="wed-inbox-top-left">
								<div class="wed-custom-msg">
									<input id="check3" type="checkbox" name="check" value="check1">
									<label for="check3">Select all</label>
									<div class="clearfix"></div>
								</div>
								<span class="wed-btn-top" id="allrestore">Restore</span>
							</div>
							<div class="clearfix"></div>
						</div>
					<form method="POST" id="trashform" >	
					<?php 
					if(!empty($trash)) { foreach($trash as $msgsd) { 
					$msgs = $msgsd;  
					?>
					
						 <div class="wed-search-listing">
							<ul>
							<?php if($msgs->profile_photo == "") { 
									 	$img = "assets/img/pic4.png"; } 
									 else if($msgs->profile_photo != "" && $msgs->profile_preference==0) { 
									 	$img = $msgs->profile_photo; } 
									 else if($msgs->profile_photo != "" && $msgs->profile_preference==1) { 
									 	$img = $msgs->profile_photo_blured; } 
									 ?>
								<li>
									<div class="close"></div>
									<div class="web-search-photo">
										<div class="web-search-pic">
											<div class="web-search-pic">
												<img src="<?php echo base_url().$img; ?>">
											</div>
											<h5><?php echo $msgs->profile_name ?></h5>
											<p><?php echo $id_prefix.$msgs->matrimony_id ?></p>
											<input type="hidden" name="matid[]" value="<?php echo $msgs->matrimony_id ?>" >
											<br>
											<!-- <span><img src="<?php echo base_url(); ?>assets/img/online.png">Online</span> -->
										</div>
									</div>
									<div class="web-search-detail">
										<div class="wed-msg-top">
											<div class="wed-premium">Premium member</div>
											<div class="wed-msg-top-left">
												<span><img src="<?php echo base_url(); ?>assets/img/mob.png"></span><span><img src="<?php echo base_url(); ?>assets/img/dot.png"></span>
											</div>
											<div class="wed-msg-top-right">
											<span class="msg-date">
												<?php 
												$arr = end($msgsd->history);
												echo $arr->history_datetime; 
												?>
											</span>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="list">
											<ul>
												<li>
													<div class="childs1">Age</div>
													<div class="childs2"><?php echo $msgs->age ?> Yrs</div>
													<div class="clearfix"></div>
												</li>
												<li>
													<div class="childs1">Height</div>
														<div class="childs2"><?php echo $msgs->height ?></div>
													<div class="clearfix"></div>
												</li>
												<li>
													<div class="childs1">Religion</div>
													<div class="childs2"><?php echo $msgs->religion_name ?></div>
													<div class="clearfix"></div>
												</li>
												<li>
													<div class="childs1">Caste,Sub Caste</div>
														<div class="childs2"><?php echo $msgs->caste_name.", ".$msgs->sub_caste_name ?></div>
													<div class="clearfix"></div>
												</li>
											</ul>
										</div>
										<div class="list">
											<ul>
												<li>
													<div class="childs1">Star</div>
													<div class="childs2"><?php echo $msgs->star_name ?></div>
													<div class="clearfix"></div>
												</li>
												<li>
													<div class="childs1">Location</div>
													<div class="childs2"><?php echo $msgs->city_name; ?></div>
													<div class="clearfix"></div>
												</li>
												<li>
													<div class="childs1">Education</div>
													<div class="childs2"><?php echo $msgs->education ?></div>
													<div class="clearfix"></div>
												</li>
												<li>
													<div class="childs1">Profession</div>
													<div class="childs2"><?php echo $msgs->occupation ?></div>
													<div class="clearfix"></div>
												</li>
											</ul>
										</div>
										<div class="clearfix"></div>
										<div class="wed-msg-box">
											<button class="wed-restore restore" data-id="<?php echo $msgs->matrimony_id;?>">
													Restore
											</button>
										</div>

									</div>
									<div class="clearfix"></div>
								</li>
							</ul>
						</div> 	
						
							<?php  } } else {?>
								<div class="wed-search-listing">
													<ul>
														<li class="no_records">
															<span class="msg-alert">Empty Trash</span>
														</li>
													</ul>
												</div>
								<?php } ?>
								</form>
					</div>
				</div>
			</div>
		
				<!-- MESSAGE-THREADS -->
										
			<div id="msgthread" class="modal fade"  role="dialog">
			  <div class="modal-dialog wed-msg-thread-modal">
			  

				<!-- Modal content-->
				<div class="modal-content wed-msg-thread-modal-content">
				
					<div class="modal-body wed-msg-thread-modal-body">
					
					<ul>
				
					
					<div class="clearfix"></div>
					
						<li><button type="button" class="close" style="z-index:99;color:#a8a8a8 !important;" data-dismiss="modal">×</button>
						
							<div class="row">
							
								<div class="col-md-12">
								
									<div class="wed-thread-left">
										<div class="wed-thread-pic">
										<img id="pop_img" src="">
										</div>
										<div class="wed-thread-details">
										<h5 id="pop_name"></h5>
										<p id="pop_matr"></p>
										<!-- <div class="wed-premium">Premium member</div> -->
										<div class="wed-msg-top-left">
				  <!--<span><img src="<?php echo base_url(); ?>assets/img/mob.png"></span>
				  <span><img src="<?php echo base_url(); ?>assets/img/dot.png"></span>-->
				</div>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="wed-thread-box">
									<div class="wed-preloader" style="text-align:center;">
									<span><img src="<?php echo base_url(); ?>assets/img/preloader.gif" style="width:80px;"></span>
									</div>

										<!-- <div class="wed-thread-right sender">
											<div class="wed-thread-message">Hallod
												<span class="msg-date">17-Dec-2016</span>
											</div><br>
											<div class="clearfix"></div>
										</div>
										<br>
										<br>
										<div class="wed-thread-right receiver">	
											<div class="wed-thread-message">Hallo
												<span class="msg-date">17-Dec-2016</span>
											</div><br>
											<div class="clearfix"></div>
										</div> -->
									</div>
								</div>
							</div>
						</li>
					</ul>
					</div>
				</div>

			  </div>
			</div>

		</div>

	</div>
</div>




<script type="text/javascript">
    jQuery(function($){
    	var base_url = <?php echo json_encode(base_url()) ?>;
         $('li.ind-divi').click(function(ev){
             ev.preventDefault();
             var uid = $(this).data('mid');
             var typ = $(this).data('typ');
             var nme = $(this).data('nme');
             var mat = $(this).data('mid');
             var pic = $(this).data('pic');
             $('#pop_name').html(nme);
             $('#pop_matr').html('T'+mat);
             $('#pop_img').attr('src',base_url+pic);
             $.get(base_url+'Profile/load_messages?id=' +uid+ '&type='+ typ, function(html){
                 $('#msgthread .wed-thread-box').html(html);
                 $('#msgthread').modal('show');
             });
         });
    });

    $( document ).ready(function() {
	  var type = window.location.search.substring(1);
	  if(type!=''){ //alert(type);
	    if(type=="inbox"){
	      $('#inbox_click').click();
	    } else if(type=="send"){ 
	      $('#sent_click').click();
	    } else if(type=="trash"){
	      $('#trash_click').click();
	    }
		 else if(type=="awaitreply"){
	      $('#sent_click #reply').click();
	    }
	  }
	});
	
	$(".delete").on('click', function () {
		 var id = $(this).data('id');
		 var data = {id:id};
			$.ajax({
				type: "POST",
				url: base_url+'profile/trash_messages',
				data: data,

				success: function(data) {
					//alert(data);
					location.reload();
					window.location.href = base_url+"profile/inbox?inbox";
				  var hash = window.location.hash.substr(1);
				 alert(hash);
				if (hash== "inbox"){ 
				   $('#inbox_click').click();
				}
				}
			});
    });
	
	$(".deletesend").on('click', function () {
		 var id = $(this).data('id');
		 var data = {id:id};
			$.ajax({
				type: "POST",
				url: base_url+'profile/trash_messages',
				data: data,

				success: function(data) {
					//alert(data);
					location.reload();
					window.location.href = base_url+"profile/inbox?send";
				  var hash = window.location.hash.substr(1);
				 alert(hash);
				if (hash== "inbox"){ 
				   $('#send').click();
				}
				}
			});
    });
	$("#deletereply").on('click', function () { 
		 var id = $(this).data('id');
		 var data = {id:id};
			$.ajax({
				type: "POST",
				url: base_url+'profile/messages1',
				data: data,
				success: function(data) {
					location.reload();
					//$('#replydiv').hide();
					//$('.appendreply').html(result);
				}
			});
    });
	
	
	$(".restore").on('click', function (e) {
	 var id = $(this).data('id');
	 var data = {id:id};
		$.ajax({
			type: "POST",
			url: base_url+'profile/restore',
			data: data,
			success: function(data) {
				location.reload();
			}
		});
    });
	
	
function update_url(url) {
    history.pushState(null, null, url);
  }

	$("#allrestore").on('click', function (e) {
		if($("#check3").is(':checked')){
			var value=$('#trashform').serialize();
			var data = value;
			$.ajax({
				type: "POST",
				url: base_url+'profile/allrestore',
				data: data,
				success: function(data) { 
					location.reload();
				}
			});	
		}
	});
	
	
	
	
	
	$(".alldelete").on('click', function (e) {
		if($("#check2").is(':checked')){
			var value=$('#inboxpendingform').serialize();
			var data = value; 
			$.ajax({
				type: "POST",
				url: base_url+'profile/alldelete',
				data: data,
				success: function(data) { 
					location.reload();
				}
			});	
		}
		else if($("#check1").is(':checked')){
			var value=$('#inboxacceptform').serialize();
			var data = value; 
			$.ajax({
				type: "POST",
				url: base_url+'profile/alldelete',
				data: data,
				success: function(data) { 
					location.reload();
				}
			});	
		}
		else if($("#check14").is(':checked')){
			var value=$('#inboxdeclineform').serialize();
			var data = value; 
			$.ajax({
				type: "POST",
				url: base_url+'profile/alldelete',
				data: data,
				success: function(data) { 
					location.reload();
				}
			});	
		}
		else if($("#check26").is(':checked')){
			var value=$('#inboxawaitform').serialize();
			var data = value; 
			$.ajax({
				type: "POST",
				url: base_url+'profile/alldelete',
				data: data,
				success: function(data) { 
					location.reload();
					 //$('#reply').click();
				}
			});	
		}
		else if($("#check27").is(':checked')){
			var value=$('#inboxallsentform').serialize();
			var data = value; 
			$.ajax({
				type: "POST",
				url: base_url+'profile/alldelete',
				data: data,
				success: function(data) { 
					location.reload();
					// $('#reply').click();
				}
			});	
		}
	});

</script>
