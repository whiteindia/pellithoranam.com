<div class="container custom-page-container"> <!-- Start Contaner -->
	<div class="row"> <!-- Start row -->
		<div class="col-md-12"> <!-- Start col-md-12 -->
				<?php if($page_content): ?>
					<h1 class="page-header"><?php echo $page_content[0]->title;?></h1>
					<div class="page-content">
						<?php echo $page_content[0]->content;?>
					</div>
				
			  	<?php else: ?>
			  		<h3>No Bridal Collection Available.</h3>
			  	<?php endif; ?>
		</div> <!-- End col-md-12 -->
	</div> <!-- End row -->
</div> <!-- End Contaner -->

<style type="text/css">
	  .custom-page-container{
		margin-top: 140px;
		padding-bottom: 100px;
	  }
	  
    </style>
</style>