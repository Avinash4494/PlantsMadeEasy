 

 
		<script src="scripts/datatables/jquery.dataTables.js"></script>
		<script type="text/javascript" src="scripts/downloadFile.js"></script> 
	<div id="example"></div>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="fa fa-chevron-left"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="fa fa-chevron-right"></i>');
		} );
		   
	</script>