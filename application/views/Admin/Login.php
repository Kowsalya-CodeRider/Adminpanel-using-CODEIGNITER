


		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box lockscreen clearfix">
					<div class="content">
						<h1 class="sr-only">Cloudnausor Technologies</h1>
						<!--<div class="logo text-center"><img src="assets/img/logo-dark.png" alt="Klorofil Logo"></div>-->
						<div class="user text-center">
							<img src="<?=base_url();?>images/logo.png" width="100" height="100" alt="Avatar">
							<h2 class="name">Admin Panel</h2>
							<center><p class="text-danger"><strong><?=isset($error) ? $error : ''?></strong></p></center>
						</div>
						<form class="form-auth-small" action="<?=base_url();?>Admin/logincheck" method="post">
							<div class="form-group">
								<label for="signin-email" class="control-label sr-only">Admin User Id</label>
								<input type="email" class="form-control" id="a_email" name="a_email" placeholder="Admin User Id">
							</div>
							<div class="input-group">
								<label for="signin-password" class="control-label sr-only">Admin Password</label>
								<input type="password" class="form-control" id="a_password" name="a_password" placeholder="Admin User Password">
								<span class="input-group-addon" onclick="passview()"  data-toggle="tooltip" title="View Password"><i id="passwordview"  class="fa fa-eye-slash"></i></span>
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>	
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
	var data = document.getElementById("a_password").getAttribute("type");
	if(data=='password')
	{
		document.getElementById("a_password").setAttribute("type","text");
		document.getElementById("passwordview").setAttribute("class","fa fa-eye-slash");
	}
	else
	{
		document.getElementById("a_password").setAttribute("type","password");
		document.getElementById("passwordview").setAttribute("class","fa fa-eye");
	}
}
</script>