<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/products/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url(" admin/product/edit") ?>" method="post"
							enctype="multipart/form-data" >

							<input type="hidden" name="id" value="<?php echo $product->id?>" />

							<div class="form-group">
								<label for="name">Tanggal Masuk*</label>
								<input class="form-control <?php echo form_error('in') ? 'is-invalid':'' ?>"
								 type="datetime-local" name="in" value="<?php echo date("Y-m-d\TH:i:s", strtotime($product->in)) ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('in') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Tanggal Keluar</label>
								<input class="form-control"
								 type="datetime-local" name="out" value="<?php 
								 if ($product->out != NULL){
								 	echo date("Y-m-d\TH:i:s", strtotime($product->out)); }
								 else echo date("Y-m-d\TH:i:s");
								 ?>" />
							</div>


							<div class="form-group">
								<label for="name">Location*</label>
								<input class="form-control <?php echo form_error('location') ? 'is-invalid':'' ?>"
								 type="text" name="location" placeholder="Location" value="<?php echo $product->location ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('location') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Device*</label>
								<input class="form-control <?php echo form_error('deviceid') ? 'is-invalid':'' ?>"
								 type="text" name="deviceid" placeholder="Device" value="<?php echo $product->deviceid ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('deviceid') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->

		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
