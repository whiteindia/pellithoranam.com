
						
						<!-- REPLY-SEND-TAB -->
<div class="appendreply" >
						
	<div class="wed-inbox-top">

								<div class="wed-inbox-top-left">
									<div class="wed-custom-msg">
										<input id="check1" type="checkbox" name="check" value="check1">
										<label for="check1">Select all</label>
										<div class="clearfix"></div>
									</div>
									<!--<span class="wed-btn-top">Mark as read</span>-->
								
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
										<div class="close"></div>
										<div class="web-search-photo">
											<div class="web-search-pic">
												<img src="<?php echo base_url().$img; ?>">
											</div>
											<h5><?php echo $msgs->profile_name ?></h5>
											<p><?php echo $id_prefix.$msgs->matrimony_id ?></p>
											<br>
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
														<div class="childs2"><?php echo $msgs->star_name ?></div>
														<div class="clearfix"></div>
													</li>
													<li>
														<div class="childs1">Location</div>
														<div class="childs2"><?php echo $msgs->city ?></div>
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
					</div>

</div>
	

<script type="text/javascript">

	

	
	


</script>
