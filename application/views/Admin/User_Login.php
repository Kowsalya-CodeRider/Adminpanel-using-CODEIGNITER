


		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box lockscreen clearfix">
					<div class="content">
						<h1 class="sr-only">Cloudnausor Technologies</h1>
						<!--<div class="logo text-center"><img src="assets/img/logo-dark.png" alt="Klorofil Logo"></div>-->
						<div class="user text-center">
							<img src="<?=base_url();?>images/logo.png" width="100" height="100" alt="Avatar">
							<h2 class="name">User Login</h2>
							<center><p class="text-danger"><strong><?=isset($error) ? $error : ''?></strong></p></center>
						</div>
						<form class="form-auth-small" action="<?=base_url();?>Products/Userlogincheck" method="post">
							<div class="form-group">
								<label for="signin-email" class="control-label sr-only">Email Id</label>
								<input type="email" class="form-control" id="u_email" name="u_email" placeholder="Enter Your Email" required>
							</div>
							<div class="input-group">
								<label for="signin-password" class="control-label sr-only">Password</label>
								<input type="password" class="form-control" id="u_password" name="u_password" placeholder="Enter Your Password" required>
								<span class="input-group-addon" onclick="passview()"  data-toggle="tooltip" title="View Password"><i id="passwordview"  class="fa fa-eye-slash"></i></span>
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
							<div class="bottom">
								<span class="helper-text"><i class="fa fa-file"></i> <a href="<?=base_url()?>Admin/Register">Register Here</a></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
<script>
function passview()
{
	var data = document.getElementById("u_password").getAttribute("type");
	if(data=='password')
	{
		document.getElementById("u_password").setAttribute("type","text");
		document.getElementById("passwordview").setAttribute("class","fa fa-eye-slash");
	}
	else
	{
		document.getElementById("u_password").setAttribute("type","password");
		document.getElementById("passwordview").setAttribute("class","fa fa-eye");
	}
}
</script>