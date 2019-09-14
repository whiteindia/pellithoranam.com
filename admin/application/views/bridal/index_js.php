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
					dataTableObj = $('#collection_table').DataTable({ 
				
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
	     	                       columns: [ 0, 1, 2, 3]
	     	                   }
	     	               },
	  			       	   {
	       	                   extend: 'copy',
	       	                   exportOptions: {
	       	                       columns: [ 0, 1, 2, 3]
	       	                   }
	       	               },
	  			       	   {
	       	                   extend: 'csv',
	       	                   exportOptions: {
	       	                       columns: [ 0, 1, 2, 3]
	       	                   }
	       	               },
	  			       	   {
	       	                   extend: 'pdf',
	       	                   exportOptions: {
	       	                       columns: [ 0, 1, 2, 3]
	       	                   }
	       	               },
	  			       	   {
	       	                   extend: 'print',
	       	                   exportOptions: {
	       	                       columns: [ 0, 1, 2, 3]
	       	                   }
	       	               }
	  			       	],
	  			     
					
					    // Load data for the table's content from an Ajax source
					    "ajax": {
					        "url": "<?php echo base_url('bridal/index');?>",
					        "type": "POST",
					        "data": function ( postData ) { 
					        	
					        	// delete postData.columns;  // delete column defination information if not needed

					        	/* Add Addition search param */
					        	postData.advance_searches ={};
						        postData.advance_searches.title = $('#bc_title').val();
						    }
					    },
					
					    //Set column definition initialisation properties.
					    "columnDefs": [
					    	{  "targets": [ 0 ], "orderable": true, "name": "id", "className": "column-id", "visible": true },
					    	{  "targets": [ 1 ], "orderable": true,  "name": "title", "className": "column-title", "visible": true },
					    	{  "targets": [ 2 ], "orderable": false, "name": "desc", "className": "column-desc", "visible": true },
					    	{  "targets": [ 3 ], "orderable": false, "name": "img", "className": "column-img", "visible": true },
					   		{  "targets": [ 4 ], "orderable": false, "name": "action", "className": "column-action", "visible": true }
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
				$("body").on("click",".delete_btn",function(e){
					var r = confirm("Are you sure?");
					if(r){
						return true;
					}else{
						return false;
					}
				})
			});
</script>
<style type="text/css">
	.ex-btn{position: relative;}
	.ex-btn .dt-buttons{position: absolute;right: 10px;}
</style>