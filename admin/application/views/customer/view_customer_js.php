<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script type="text/javascript">
	//https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js
	//https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js
	// https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js
	// https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js
	// https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js
	// https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js
	  var table;
		jQuery(function($){
			

						

				// datatable Intialization
				(function (){
					dataTableObj = $('#users_table').DataTable({ 
				
					    "processing": true, //Feature control the processing indicator.
					    "serverSide": true, //Feature control DataTables' server-side processing mode.
					    "order": [], //Initial no order.
					    "lengthMenu": [ [20,1, 5, 10, 25, 50, -1], [20,1, 5, 10, 25, 50, "All"] ],
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
	     	                       columns: [ 0, 1, 2, 3,4,5,6,7,8,9]
	     	                   }
	     	               },
	  			       	   {
	       	                   extend: 'copy',
	       	                   exportOptions: {
	       	                       columns: [ 0, 1, 2, 3,4,5,6,7,8,9]
	       	                   }
	       	               },
	  			       	   {
	       	                   extend: 'csv',
	       	                   exportOptions: {
	       	                       columns: [ 0, 1, 2, 3,4,5,6,7,8,9]
	       	                   }
	       	               },
	  			       	   {
	       	                   extend: 'pdf',
	       	                   exportOptions: {
	       	                       columns: [ 0, 1, 2, 3,4,5,6,7,8,9]
	       	                   }
	       	               },
	  			       	   {
	       	                   extend: 'print',
	       	                   exportOptions: {
	       	                       columns: [ 0, 1, 2, 3,4,5,6,7,8,9]
	       	                   }
	       	               }
	  			       	],
	  			     
					
					    // Load data for the table's content from an Ajax source
					    "ajax": {
					        "url": "<?php echo base_url('customer/view_members/');?>",
					        "type": "POST",
					        "data": function ( postData ) { 
					        	
					        	// delete postData.columns;  // delete column defination information if not needed

					        	/* Add Addition search param */
					        	postData.advance_searches ={};
						       // postData.advance_searches.extra_search1 = "ljl";
						        // postData.advance_searches.member_type = $('#member_type').val();
						        // postData.advance_searches.country = $('#country-selector').val();
						         postData.advance_searches.name = $('#name').val();
						         postData.advance_searches.relgion = $('#relgion').val();
						         postData.advance_searches.mother_tongue = $('#mother_tongue').val();
						         postData.advance_searches.email = $('#email').val();
						         postData.advance_searches.phone = $('#phone').val();
						        // postData.advance_searches.religion = $('#religion').val();
						        // postData.advance_searches.gender = $('#gender').val();
						        // postData.advance_searches.caste = $('#caste').val();
						       
						    }
					    },
					
					    //Set column definition initialisation properties.
					    "columnDefs": [
					    	{  "targets": [ 0 ], "orderable": false, "name": "serial", "className": "column-serial", "visible": false },
					    	{  "targets": [ 1 ], "orderable": true, "name": "matrmonial-id", "className": "column-matrmonial-id", "visible": true },
					    	{  "targets": [ 2 ], "orderable": true,  "name": "name", "className": "column-name", "visible": true },
					    	{  "targets": [ 3 ], "orderable": true, "name": "birthdate", "className": "column-birthdate", "visible": true },
					    	{  "targets": [ 4 ], "orderable": true, "name": "religion", "className": "column-religion", "visible": true },
					   		{  "targets": [ 5 ], "orderable": true, "name": "mother-tongue", "className": "column-mother-tongue", "visible": true },
					    	{  "targets": [ 6 ], "orderable": true, "name": "email", "className": "column-email", "visible": true },
					    	{  "targets": [ 7 ], "orderable": true, "name": "phone", "className": "column-phone", "visible": true },
					    	{  "targets": [ 8 ], "orderable": false, "name": "status", "className": "column-status", "visible": true },
					    	{  "targets": [ 9 ], "orderable": true, "name": "package", "className": "column-package", "visible": true },
					    	{  "targets": [ 10 ], "orderable": false, "name": "profile-link", "className": "column-profile-link", "visible": true },
					    	{  "targets": [ 11 ], "orderable": false, "name": "upgrade", "className": "column-upgrade", "visible": true },
					    	{  "targets": [ 12 ], "orderable": false, "name": "action", "className": "column-action", "visible": true },
					    	{  "targets": [ 13 ], "orderable": false, "name": "highlight", "className": "column-highlight", "visible": true },
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
			

			
		     //  	$(".religion-selector").on('change', function () {
			    //     var valueSelected = $(this).val();
			    //     var passdata_1 = 'rlgn_sel='+ valueSelected;

			    //     $.ajax({
			    //     type: "POST",
			    //     url : '<?php echo base_url(); ?>reports/getCaste',
			    //     data:  passdata_1,
			    //     success: function(data){
			    //             $(".caste-selector").html(data);
			    //         }
		     //    	});
	    		// });

			
			

		});
</script>
<style type="text/css">
	.ex-btn{position: relative;}
	.ex-btn .dt-buttons{position: absolute;right: 10px;}
</style>