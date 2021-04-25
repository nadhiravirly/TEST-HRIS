<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/products/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
								<?php $no = 1; ?>
									<tr>
										<th>No</th>
										<th>Tanggal Masuk</th>
										<th>Tanggal Pulang</th>
										<th>Lama Kerja (jam)</th>
										<th>Lokasi</th>
										<th>Device</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($products as $absen): ?>
									<tr>
										<td width="150">
											<?php echo $no ?>
										</td>
										<td>
											<?php echo $absen->in ?>
										</td>
										<td>
											<?php echo $absen->out ?>
										</td>
										<td class="small">
											<?php echo $absen->hour ?>
										<td>
											<?php echo $absen->location ?>
										</td>
										<td>
											<?php echo $absen->deviceid ?>
										</td>
										<td width="250">
											<a href="<?php echo site_url('admin/products/edit/'.$absen->id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/products/delete/'.$absen->id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php $no++; ?>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->


		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>
