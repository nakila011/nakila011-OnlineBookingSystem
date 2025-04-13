 <section id="" class="d-flex align-items-center">
<main id="main">

<style>
       body {
    background-image: url('./assets/img/bus terminal1.png');
    background-size: cover; 
    background-position: center;     
    background-repeat: no-repeat;   
    background-attachment: fixed;  
    
    
    height: 100vh;
    width: 100vw;

  
    background-color: rgba(0, 0, 0, 0.6); 
    background-blend-mode: overlay;      

    @media (max-width: 768px) {
    body {
        background-size: contain;  
    }
}

/* Responsive in mobile device */

table.dataTable td {
  white-space: normal !important;
  word-wrap: break-word;
}

@media (max-width: 768px) {
  .card .card-header .card-title {
    font-size: 18px;
  }

  .btn {
    font-size: 14px;
    padding: 8px 12px;
  }
}
.table-responsive {
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

#schedule-field {
  min-width: 1000px;
}
}
    </style>

	<div class="container-fluid">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-md-12">
					<button class="float-right btn btn-success btn-md" type="button" id="new_bus">Add New <i class="fa fa-plus"></i></button>
				</div>
			</div>
			<div class="row">
				&nbsp;
			</div>
			<div class="row">
				<div class="card col-md-12">
				<div class="card-header">
						<div class="card-title"><b>Bus List</b></div>
					</div>
					
					<div class="card-body">
						 <!-- Responsive in mobile device -->
						 <div class="table-responsive">
						<table class="table table-hover table-striped" id="bus-field">
						<thead class='thead-light'>
								<tr>
									<th class="text-center">No.</th>
									<th class="text-center">Bus No.</th>
									<th class="text-center">Bus Name</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</main>
</section>
<script>
	$('#new_bus').click(function(){
		uni_modal('Add New Bus','manage_bus.php')
	})
	window.load_bus = function(){
		$('#bus-field').dataTable().fnDestroy();
		$('#bus-field tbody').html('<tr><td colspan="4" class="text-center">Please wait...</td></tr>')
		$.ajax({
			url:'load_bus.php',
			error:err=>{
				console.log(err)
				alert_toast('An error occured.','danger');
			},
			success:function(resp){
				if(resp){
					if(typeof(resp) != undefined){
						resp = JSON.parse(resp)
							if(Object.keys(resp).length > 0){
								$('#bus-field tbody').html('')
								var i = 1 ;
								Object.keys(resp).map(k=>{
									var tr = $('<tr></tr>');
									tr.append('<td class="text-center">'+(i++)+'</td>')
									tr.append('<td class="text-center">'+resp[k].bus_number+'</td>')
									tr.append('<td>'+resp[k].name+'</td>')
									tr.append('<td><center><button class="btn btn-sm btn-info edit_bus mr-2" data-id="'+resp[k].id+'">Edit</button><button class="btn btn-sm btn-danger remove_bus" data-id="'+resp[k].id+'">Delete</button></center></td>')
									$('#bus-field tbody').append(tr)

								})

							}else{
								$('#bus-field tbody').html('<tr><td colspan="4" class="text-center"><b>THEREs NO DATA HERE!!</b>.</td></tr>')
							}
					}
				}
			},
			complete:function(){
				$('#bus-field').dataTable()
				manage();
			}
		})
	}
	function manage(){
		$('.edit_bus').click(function(){
		uni_modal('Edit New Bus','manage_bus.php?id='+$(this).attr('data-id'))

		})
		$('.remove_bus').click(function(){
		_conf('Are you sure to delete this data?','remove_bus',[$(this).attr('data-id')])

		})
	}
	function remove_bus($id=''){
		start_load()
		$.ajax({
			url:'delete_bus.php',
			method:'POST',
			data:{id:$id},
			error:err=>{
				console.log(err)
				alert_toast("An error occured","danger");
				end_load()
			},
			success:function(resp){
				if(resp== 1){
					alert_toast("Data succesfully deleted","success");
					end_load()
					$('.modal').modal('hide')
					load_bus()
				}
			}
		})
	}
	$(document).ready(function(){
		load_bus()
	})
	$('#schedule-field').DataTable({
  responsive: true
});
</script>