<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php echo isset($title) ? $title : 'Travel Website'; ?></title>

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

		<!-- ********* Vendor Css Files ************** -->

		<!-- Scrollbar CSS -->		
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/overlay-scroll/OverlayScrollbars.min.css') ?>" />
        <!-- Data Tables -->
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/datatables/dataTables.bs5.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/datatables/dataTables.bs5-custom.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/datatables/buttons/dataTables.bs5-custom.css') ?>" />
    </head>

	<body>
		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- Main container start -->
			<div class="main-container">

				<!-- Sidebar wrapper start -->
				<nav id="sidebar" class="sidebar-wrapper">
					
					<?php $this->load->view('admin/sidebar'); ?>

				</nav>
				<!-- Sidebar wrapper end -->

				<!-- App container starts -->
				<div class="app-container">

					<!-- App header starts -->
					<?php $this->load->view('admin/header'); ?>
					<!-- App header ends -->

					<!-- App body starts -->
					<div class="app-body">

						<!-- Container starts -->
						<?php echo $content; ?>
						<!-- Container ends -->

					</div>
					<!-- App body ends -->

					<!-- App footer start -->
					<?php $this->load->view('admin/footer'); ?>
					<!-- App footer end -->

				</div>
				<!-- App container ends -->

			</div>
			<!-- Main container end -->

		</div>
		<!-- Page wrapper end -->

		<!-- *************
			************ JavaScript Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
		<!-- <script src="assets/js/bootstrap.bundle.min.js"></script> -->

		<!-- *************
			************ Vendor Js Files *************
		************* -->

		<!-- Overlay Scroll JS -->
		<script src="<?php echo base_url('assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/vendor/overlay-scroll/custom-scrollbar.js') ?>"></script>

		<!-- Data Tables -->
		<script src="<?php echo base_url('assets/vendor/datatables/dataTables.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/vendor/datatables/custom/custom-datatables.js') ?>"></script>
		<!-- DataTable Buttons -->
		<script src="<?php echo base_url('assets/vendor/datatables/buttons/dataTables.buttons.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/vendor/datatables/buttons/jszip.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/vendor/datatables/buttons/dataTables.buttons.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/vendor/datatables/buttons/pdfmake.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/vendor/datatables/buttons/vfs_fonts.js') ?>"></script>
		<script src="<?php echo base_url('assets/vendor/datatables/buttons/buttons.html5.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/vendor/datatables/buttons/buttons.print.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/vendor/datatables/buttons/buttons.colVis.min.js') ?>"></script>

		<!-- Custom JS files -->
		<script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
		<script>
			var theme_color = '<?php echo get_settings_value('theme_color'); ?>';
			$('body').css('background', theme_color);

		</script>
	</body>

</html>