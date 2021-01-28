
		
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
									<h3 class="panel-title text-center">View Product Information</h3>
								</div>
								<div class="panel-body">
								<form class="form-auth-small"  method="post" enctype="multipart/form-data">
								<div class="col-md-6">
								
								<div class="form-group">
									<label for="signin-email" class="control-label">Product Name</label>
									<input type="text" class="form-control" id="p_name" name="p_name" value="<?=$product->p_name;?>" required>
								</div>
								<div class="form-group">									
									<label for="signin-password" class="control-label">SKU Code</label>
									<input type="text" class="form-control" id="p_sku" name="p_sku" value="<?=$product->p_sku;?>" required>										
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
										<label for="signin-password" class="control-label">Product Stock</label>
										<input type="text" class="form-control" id="p_stock" name="p_stock" value="<?=$product->p_stock;?>" required>
										</div>
										<div class="col-md-6">
										<label for="signin-password" class="control-label">Product Price</label>
										<input type="number" class="form-control" id="p_price" name="p_price" value="<?=$product->p_price;?>" required>
										</div>										
									</div>
								</div>
								
							
							
								</div>
								<div class="col-md-6">
								<div class="form-group">
									<center><label for="signin-email" class="control-label">Product Image</label><br />
									<img src="<?=base_url();?>productimages/<?=$product->p_image;?>" width="250" height="250"></center>
								</div>
								</div>
							</form>
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


