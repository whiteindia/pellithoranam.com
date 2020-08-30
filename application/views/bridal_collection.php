<div class="container bridal-container"> <!-- Start Contaner -->
	<div class="row"> <!-- Start row -->
		<div class="col-md-12"> <!-- Start col-md-12 -->
		<h1 style="text-align: center;">Bridal Collection</h1>
			<div id="p-flex">
				<?php if($bridal_collection): ?>
				<?php foreach($bridal_collection as $bc): ?>
				<?php 
					$this->db->where('bridalcode', $$bc->bridalcode);
					$query1 = $this->db->get('bridalusers'); 
					//$count=$query1->num_rows();
					$row=$query1->row();

					?>
			    <div class="p-flex">
			    	<div class="p-flex-in" style="text-align: center;">
			        	<img class="p-img" src="<?php echo base_url()."assets/uploads/bridal/".$bc->img;?>"/>
			        	<div class="p-name">Product Name<?php echo $bc->title;?>  </div>
						<div class="p-name">Product code : <?= $bc->id; ?><?= $bc->bridalcode; ?><?= $bc->serialno; ?> </div>
			       		<!-- <div class="p-price"></div> -->
			        	<div class="p-desc">Description: <?php echo $bc->short_desc;?></div>
						<div class="p-name">Contact: <?php echo $row->contact;?>  </div>
			        	<!-- <button class="p-add">Add to Cart</button> -->
			      	</div>
			  	</div>
			  	<?php endforeach; ?>
			  	<?php else: ?>
			  		<h3>No Bridal Collection Available.</h3>
			  	<?php endif; ?>
			</div> <!-- End #p-flex -->
		</div> <!-- End col-md-12 -->
	</div> <!-- End row -->
</div> <!-- End Contaner -->

<style type="text/css">
	  .bridal-container{
		margin-top: 140px;
	  }
	  /* Flex container */
	  #p-flex {
	    max-width: 1200px;
	    margin: 0 auto;
	    display: flex;
	    flex-direction: row;
	    flex-wrap: wrap;
	  }
	  /* Product items */
	  div.p-flex {
	    width: 25%;
	  }
	  div.p-flex-in {
	    box-sizing: border-box;
	    margin: 5px; 
	    padding: 10px;
	    border: 1px solid #e7fcde;
	    background: #f6fff2;
	  }
	  img.p-img {
	    width: 100%;
	    height: auto;
	  }
	  div.p-name {
	    font-weight: bold;
	    font-size: 1.1em;
	  }
	  div.p-price {
	    color: #f44242;
	  }
	  div.p-desc {
	    color: #888;
	    font-size: 0.9em;
	  }
	  button.p-add {
	    background: #f46b41;
	    color: #fff;
	    border: none;
	    width: 100%;
	    padding: 10px;
	    margin: 10px 5px 5px 5px;
	    font-size: 1.1em;
	    font-weight: bold;
	    cursor: pointer;
	  }
	  /* Responsive */
	  @media only screen and (max-width: 1024px) {
	    div.p-flex { width: 33%; }
	  }
	  @media only screen and (max-width: 600px) {
	    div.p-flex { width: 50%; }
	  }
	  /* [DOES NOT MATTER] */
	  html, body {
	    padding: 0;
	    margin: 0;
	    font-family: arial, sans-serif;
	  }
    </style>
</style>