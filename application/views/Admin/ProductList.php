
		
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
				<h3 class="page-title"><a class="btn btn-primary" href="<?=base_url();?>Admin/AddProduct" title="Add to Product" ><i class="fa fa-plus"></i> <span>ADD TO PRODUCT</span></a></h3>
					<div class="row">
						<div class="col-md-12">
							<!-- BORDERED TABLE -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">All Product List</h3>
								</div>
								<div class="panel-body">
									<table id="example" class="display nowrap table-responsive" style="width:100%">
        <thead>
            <tr>
                <th>Product name</th>                
                <th>Product SKU Code</th> 
				<th>Price</th>
				<th>Options</th>
            </tr>
        </thead>
        <tbody>
              <?php
			  if(!empty($product))
			  {
				  foreach($product as $product)
				  {
					  ?>
					  <tr>
					  <td><?=$product['p_name'];?></td>
					  <td><?=$product['p_sku'];?></td>
					  <td><?=$product['p_price'];?></td>
					  <td>
					  <a href="<?=base_url();?>Admin/ViewProduct/<?=$product['p_id'];?>" class="btn btn-info">View</a>
					  <a href="<?=base_url();?>Admin/EditProduct/<?=$product['p_id'];?>" class="btn btn-warning">Edit</a>
					  <a href="#" onclick="deleteproduct(<?=$product['p_id'];?>)" class="btn btn-danger">Delete</a>
					  </td>
					  </tr>
					  <?php
				  }
			  }
			  ?>
        </tbody>
    </table>
								</div>
							</div>
							<!-- END BORDERED TABLE -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
<script>
function deleteproduct(p_id)
{
	var confirmation = confirm("Are you sure you want to remove the item?");
	if(confirmation)
	{
		$.ajax({
				type: 'post',
				url: '<?=base_url();?>Admin/deleteproduct',
				data: {p_id:p_id},
				success: function (result) {
				  alert('Product Deleted Successfully');
				  location.reload();
				}
			  });
	}
}
</script>		


