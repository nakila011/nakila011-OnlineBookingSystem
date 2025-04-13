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
			<?php  if(isset($_SESSION['login_id'])): ?>
			<div class="row">
				<div class="col-md-12">
					
				</div>
			</div>
		<?php endif; ?>

			<div class="row">
			
				<div class="card col-md-12">

				<div class="card-header">
						<div class="card-title"><b>List of Reservations</b></div>
					</div>
					
					<div class="card-body">
						 <!-- Responsive in mobile device -->
						 <div class="table-responsive">
						<table class="table table-hover table-striped" id="booked-field">
							
							<thead class='thead-light'>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Ref. No.:</th>
									<th class="text-center">Name:</th>
									<th class="text-center">Quantity:</th>
									<th class="text-center">Total Amount:</th>
									<th class="text-center">Status:</th>
									<th class="text-center">Action:</th>
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
	$('#new_schedule').click(function(){
		uni_modal('Add New Schedule','manage_schedule.php')
	})
	window.load_booked = function(){
		$('#booked-field').dataTable().fnDestroy();
		$('#booked-field tbody').html('<tr><td colspan="7" class="text-center">Please wait...</td></tr>')
		$.ajax({
			url:'load_booked.php',
			error:err=>{
				console.log(err)
				alert_toast('An error occured.','danger');
			},
			success:function(resp){
				if(resp){
					if(typeof(resp) != undefined){
						resp = JSON.parse(resp)
							if(Object.keys(resp).length > 0){
								$('#booked-field tbody').html('')
								var i = 1 ;
								Object.keys(resp).map(k=>{
									var tr = $('<tr></tr>');
									tr.append('<td class="text-center">'+(i++)+'</td>')
									tr.append('<td class="">'+resp[k].ref_no+'</td>')
									tr.append('<td class="">'+resp[k].name+'</td>')
									tr.append('<td class="">'+resp[k].qty+'</td>')
									tr.append('<td class="">₱'+resp[k].amount+'</td>')
									tr.append('<td class="">'+(resp[k].status == 1 ? 'Paid' :'Unpaid')+'</td>')
									
										tr.append('<td><center><button class="btn btn-sm btn-info mr-2 text-white edit_booked" data-id="'+resp[k].schedule_id+'" data-bid="'+resp[k].id+'">Edit</button></center></td>')
									$('#booked-field tbody').append(tr)

								})

							}else{
								$('#booked-field tbody').html('<tr><td colspan="7" class="text-center"><b>THEREs NO DATA HERE!!</b></td></tr>')
							}
					}
				}
			},
			complete:function(){
				$('#booked-field').dataTable()
				$('.edit_booked').click(function(){
					uni_modal('Edit Reservation','customer_book.php?id='+$(this).attr('data-id')+'&bid='+$(this).attr('data-bid'),1)
				})
			}
		})
	}
	
	$(document).ready(function(){
		load_booked()
	})
	$('#schedule-field').DataTable({
  responsive: true
});
</script>