

		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<center><img src="<?=base_url();?>images/logo.png" width="100" height="100" alt="Avatar"></center><br />
				<div class="auth-box lockscreen clearfix">
					<div class="content">
						<center><h4>Cloudnausor Technologies</h4></center>
						<div class="user text-center">
							<center><p class="text-success"><strong><?=isset($success) ? $success : ''?></strong></p></center>						
						</div>
						<form class="form-auth-small" action="<?=base_url();?>Admin/Addusers" method="post">
							<div class="form-group">
								<label for="signin-email" class="control-label sr-only">Fullname</label>
								<input type="text" class="form-control" id="u_name" name="u_name" placeholder="Enter Your Name" required>
							</div>
							<div class="form-group">
								<label for="signin-password" class="control-label sr-only">Email Id</label>
								<input type="email" class="form-control" id="u_email" name="u_email" placeholder="Enter Your Email Id" required>
							</div>
							<div class="form-group">
								<label for="signin-password" class="control-label sr-only">Password</label>
								<input type="password" class="form-control" id="u_password" name="u_password" placeholder="Enter Your Password" required>
							</div>
							<div class="form-group">
								<label for="signin-password" class="control-label sr-only">Mobile Number</label>
								<input type="text" class="form-control" id="u_number" name="u_number" placeholder="Enter Your Mobile Number" required>
							</div>
							<button type="submit" id="register" class="btn btn-primary btn-lg btn-block">REGISTER</button>
							<div class="bottom">
								<span class="helper-text">Already Registered ? <i class="fa fa-lock"></i> <a href="<?=base_url()?>Products/Userlogin">Login Here</a></span>
							</div>
							<br />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
