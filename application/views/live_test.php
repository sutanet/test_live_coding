<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>test</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css" />
	
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js" ></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" ></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js" ></script>


	<style>
		tfoot {
		     display: table-header-group;
		}
	</style>
</head>
<body>
	<br/>
	<div class="container">
		<table id="example" class="table table-striped table-bordered" style="width:100%">
		    <thead>
		        <tr>
		            <th>ID</th>
		            <th>Email</th>
		            <th>Nama</th>
		            <th>Status</th>
		        </tr>
		    </thead>
		    <tfoot>
		        <tr>
		            <th>ID</th>
		            <th>Email</th>
		            <th>Nama</th>
		            <th>Status</th>
		        </tr>
		    </tfoot>
		    <tbody>
		    </tbody>
		</table>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function() {
    	var sm = $('#example').DataTable({
    		"processing": true,
	        "serverSide": true,
		    "ajax" : {
		        url: "<?php echo base_url() ?>/index.php/TestLiveController/list_user",
		        dataFilter: function(data){
		            var json = jQuery.parseJSON( data );
		            json.recordsTotal = json.total;
		            json.recordsFiltered = json.total_filtered;
		            json.data = json.data;
		 			
		            return JSON.stringify( json ); // return JSON string
		        }
		    },
		    "lengthMenu" : [[2, 4, 6, -1], [2, 4, 6, "All"]],
	        "paging" : true,
	        "columns" :[
	          { "data": "userid", "className": "text-center" },
	          { "data": "email", "searchable" : true},
	          { "data": "nama", "searchable" : true},
	          { "data": "status"}
	        ]
	    });

	    $('#example tfoot th').each( function () {
     		var title = $(this).text();
     		$(this).html( '<input class="form-control" placeholder="Search '+title+'" />' );
 		});

 		sm.columns().every( function () {
		    var that = this;
		    $('input', this.footer() ).on( 'keyup change', function () {
		         if ( that.search() !== this.value ) {
		             that.search( this.value ).draw();
		         }
		    });
	 	});

	});
</script>
