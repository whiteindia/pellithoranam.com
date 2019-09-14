<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src='<?php echo base_url(); ?>assets/js/moment.min.js'></script>
<script src='<?php echo base_url(); ?>assets/js/fullcalendar.min.js'></script>
 <script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>
 <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.theme.min.css"> -->
 <link href = "<?php echo base_url('assets/css/jquery-ui.css'); ?>" rel = "stylesheet">
<style type="text/css">
	.ui-datepicker-month option{ background: rgba(242,20,110,0.7);color: #fff; }
	.ui-datepicker-year option{ background: rgba(242,20,110,0.7); color: #fff;}
	.ui-datepicker-month {color:rgba(242,20,110,0.7);}
	.ui-datepicker-year {color:rgba(242,20,110,0.7);}
	.ui-widget-header { background: rgba(242,20,110,0.7)!important; color: #fff; }
</style>
<script type="text/javascript">
	//https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js
	//https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js
	// https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js
	// https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js
	// https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js
	// https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js
	  var table;
		jQuery(function($){
				$('#from_date').datepicker({
		          changeMonth: true,
		          changeYear: true,
		          dateFormat: "yy-mm-dd",
		          maxDate: new Date,
		      	});
				$('#to_date').datepicker({
		          changeMonth: true,
		          changeYear: true,
		          dateFormat: "yy-mm-dd",
		          maxDate: new Date,

		      	});
			

						

				// datatable Intialization
				(function (){
					dataTableObj = $('#inactive_users_table').DataTable({ 
				
					    "processing": true, //Feature control the processing indicator.
					    "serverSide": true, //Feature control DataTables' server-side processing mode.
					    "order": [], //Initial no order.
					    "lengthMenu": [ [1, 5, 10, 25, 50, -1], [1, 5, 10, 25, 50, "All"] ],
					    "pageLength": 25,
					    "pagingType": "full_numbers",
					    "filter": false,
			  			"destroy": true,
			  			"orderMulti": true,
			  			"bLengthChange": true,
			  			 "dom": "<'row'<'col-sm-6'l><'col-sm-6 ex-btn'B>>" +
			  			 		"<'row'<'col-sm-12'f>>" +
								"rtip",
	  			       	buttons: [
	  			       	   {
	       	                   extend: 'excel',
	       	                   exportOptions: {
	       	                       columns: [ 0, 1, 2, 3,4,5,6,7,8,10,11]
	       	                   }
	       	               },
	  			       	   {
	       	                   extend: 'copy',
	       	                   exportOptions: {
	       	                       columns: [ 0, 1, 2, 3,4,5,6,7,8,10,11]
	       	                   }
	       	               },
	  			       	   {
	       	                   extend: 'csv',
	       	                   exportOptions: {
	       	                       columns: [ 0, 1, 2, 3,4,5,6,7,8,10,11]
	       	                   }
	       	               },
	  			       	   {
	       	                   extend: 'pdf',
	       	                   exportOptions: {
	       	                       columns: [ 0, 1, 2, 3,4,5,6,7,8,10,11]
	       	                   }
	       	               },
	  			       	   {
	       	                   extend: 'print',
	       	                   exportOptions: {
	       	                       columns: [ 0, 1, 2, 3,4,5,6,7,8,10,11]
	       	                   }
	       	               }
	  			       	],
	  			     
					
					    // Load data for the table's content from an Ajax source
					    "ajax": {
					        "url": "<?php echo base_url('reports/view_inactive_user');?>",
					        "type": "POST",
					        "data": function ( postData ) { 
					        	
					        	// delete postData.columns;  // delete column defination information if not needed

					        	/* Add Addition search param */
					        	postData.advance_searches ={};
						       // postData.advance_searches.extra_search1 = "ljl";
						         postData.advance_searches.from_date = $('#from_date').val();
						         postData.advance_searches.to_date = $('#to_date').val();
						         postData.advance_searches.member_type = $('#member_type').val();
						        // postData.advance_searches.city = $('#city-selector').val();
						        // postData.advance_searches.religion = $('#religion').val();
						        // postData.advance_searches.gender = $('#gender').val();
						        // postData.advance_searches.caste = $('#caste').val();
						       
						    }
					    },
					
					    //Set column definition initialisation properties.
					    "columnDefs": [
					    	{  "targets": [ 0 ], "orderable": false, "name": "serial", "className": "column-serial", "visible": true },
					    	{  "targets": [ 1 ], "orderable": true,  "name": "name", "className": "column-name", "visible": true },
					    	{  "targets": [ 2 ], "orderable": true, "name": "birthdate", "className": "column-birthdate", "visible": true },
					    	{  "targets": [ 3 ], "orderable": false, "name": "gender", "className": "column-gender", "visible": true },
					   		{  "targets": [ 4 ], "orderable": false, "name": "email", "className": "column-email", "visible": true },
					    	{  "targets": [ 5 ], "orderable": false, "name": "phone", "className": "column-phone", "visible": true },
					    	{  "targets": [ 6 ], "orderable": false, "name": "membershp", "className": "column-membershp", "visible": true },
					    	{  "targets": [ 7 ], "orderable": false, "name": "expire", "className": "column-expire", "visible": true },
					    	{  "targets": [ 8 ], "orderable": false, "name": "profile-link2", "className": "column-profile-link2", "visible": false },
					    	{  "targets": [ 9 ], "orderable": false, "name": "profile-link", "className": "column-profile-link", "visible": true },
					    	{  "targets": [ 10 ], "orderable": true, "name": "registered", "className": "column-registered", "visible": true },
					    	{  "targets": [ 11 ], "orderable": false, "name": "status", "className": "column-status", "visible": true },
					    	//{  "targets": [ 7 ], "orderable": false, "name": "action", "className": "column-action", "visible": true }
					    ],

					    // Initialisation complete callback.
					    "initComplete": function (settings, json){

					    },

					    // Row draw callback
					    "rowCallback": function (row, data, index){

					    },
					    
					    // Function that is called every time DataTables performs a draw.
					    "drawCallback": function (settings ){
					    	 // if ($(".js-switch2")[0]) {

					    	 //     var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch2'));
					    	 //     elems.forEach(function (html) {
					    	 //         var switchery = new Switchery(html, {
					    	 //             color: '#26B99A',
					    	 //             secondaryColor    : '#ff0000'
					    	 //         });
					    	 //     });
					    	 // }
					    },
					
					});  
				})();

				// Uses this function to search submit
				function tableReload(){
					dataTableObj.draw();
				}

				$("#column_search").on("click",function(e){
					e.preventDefault();

					tableReload();
				});
			

			
		      	$(".religion-selector").on('change', function () {
			        var valueSelected = $(this).val();
			        var passdata_1 = 'rlgn_sel='+ valueSelected;

			        $.ajax({
			        type: "POST",
			        url : '<?php echo base_url(); ?>reports/getCaste',
			        data:  passdata_1,
			        success: function(data){
			                $(".caste-selector").html(data);
			            }
		        	});
	    		});

			
			

		});
</script>
<style type="text/css">
	.ex-btn{position: relative;}
	.ex-btn .dt-buttons{position: absolute;right: 10px;}
</style>