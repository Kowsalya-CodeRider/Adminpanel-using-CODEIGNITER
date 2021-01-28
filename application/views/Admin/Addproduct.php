
		
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">				
					<div class="row">
						<div class="col-md-12">
							<!-- BORDERED TABLE -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title text-center">Add Product Information</h3>
								</div>
								<div class="panel-body">
								<div class="col-md-3"></div>
								<div class="col-md-6">
								<form class="form-auth-small" id="product_register" action="<?=base_url();?>Admin/InsertProduct" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Product Name</label>
									<input type="text" class="form-control" id="p_name" name="p_name" placeholder="Product Name" required>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
										<label for="signin-password" class="control-label sr-only">SKU Code</label>
										<input type="text" class="form-control" id="p_sku" name="p_sku" placeholder="Product SKU Code" required>
										</div>
										<div class="col-md-6">
										<label for="signin-password" class="control-label sr-only">Product Stock</label>
										<input type="text" class="form-control" id="p_stock" name="p_stock" placeholder="Product Stock" required>
										</div>									
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
										<label for="signin-password" class="control-label sr-only">Product Price</label>
										<input type="number" class="form-control" id="p_price" name="p_price" placeholder="Product Price" required>
										</div>
										<div class="col-md-6">
										<label for="signin-password" class="control-label sr-only">Upload Product Image</label>
										<input type="file" class="form-control" id="p_image" name="p_image" placeholder="Product Image" required>
										</div>										
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
										<button type="button" onclick="formreset()" class="btn btn-danger btn-lg btn-block">Reset</button>
										</div>
										<div class="col-md-6">
										<button type="submit" class="btn btn-success btn-lg btn-block">Save</button>
										</div>
									</div>
								</div>
							
							</form>
							</div>
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
function formreset()
{	
   document.getElementById("product_register").reset();
}
</script>	

