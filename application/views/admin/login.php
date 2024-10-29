<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Admin Dashboard Templates - Galaxy Admin Template</title>

		<!-- Meta -->
		<meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="canonical" href="https://www.bootstrap.gallery/">
		<meta property="og:url" content="https://www.bootstrap.gallery">
		<meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
		<meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
		<meta property="og:type" content="Website">
		<meta property="og:site_name" content="Bootstrap Gallery">
		<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.svg') ?>" />

		<!-- *************
			************ CSS Files *************
		************* -->
		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="<?php echo base_url('assets/fonts/icomoon/style.css') ?>" />

		<!-- Main CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/main.css') ?>" />
	</head>

	<body>
		<!-- Container start -->
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-4 col-lg-5 col-sm-6 col-12">
                    <!--error message -->
                    <?php if($this->session->flashdata('error')){?>
                    <p style="color:red"><?php  echo $this->session->flashdata('error');?></p>	
                    <?php } ?>

					<form method="post" action="<?php echo base_url('admin/login'); ?>" class="my-5">
						<div class="card p-md-4 p-sm-3">
							<div class="login-form">
								<a href="index.html" class="mb-4 d-flex">
									<img src="<?php echo base_url('assets/images/logo.svg') ?>" class="img-fluid login-logo" alt="Admin & Dashboards" />
								</a>
								<h3 class="mt-5 mb-4">Login</h3>
								<div class="mb-3">
									<label class="form-label">Your Email</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" value="<?=set_value('username')?>" >

                                    <?php $username_err = form_error('username'); if(isset($username_err)) { ?>
                                    <span style="color:red"><?php echo $username_err; ?></span>
                                    <?php } ?>
								</div>
								<div class="mb-3">
									<label class="form-label">Your Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" value="<?=set_value('password')?>" >
                                    <?php $password_err = form_error('password'); if(isset($password_err)) { ?>
                                    <span style="color:red"><?php echo $password_err; ?></span>
                                    <?php } ?>
								</div>
								<!-- <div class="d-flex align-items-center justify-content-between">
									<div class="form-check m-0">
										
									</div>
									<a href="forgot-password.html" class="text-primary text-decoration-underline">Lost password?</a>
								</div> -->
								<div class="d-grid py-3 mt-3">
									<button type="submit" class="btn btn-lg btn-primary">
										LOGIN
									</button>
								</div>
								
								
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Container end -->
	</body>

</html>