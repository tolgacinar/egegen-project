<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Carousel Tablosu</h3>

				<div class="card-tools">
					<a class="btn btn-sm btn-primary" href="<?php echo base_url("admin/carousel/create") ?>"><i class="fa fa-plus"></i> Yeni Carousel</a>
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body table-responsive p-0">
				<table class="table table-hover table-striped text-nowrap">
					<thead>
						<tr>
							<th width="15%">Görsel</th>
							<th>Başlık</th>
							<th width="15%">İşlem</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($slides as $key => $slide): ?>
							<tr>
								<td><img src="<?php echo base_url($slide->slide_image) ?>" style="height:30px;width:auto;"></td>
								<td><?php echo $slide->slide_title; ?></td>
								<td>
									<a class="btn btn-danger" href="<?php echo base_url("admin/carousel/delete/$slide->slide_id") ?>">Sil</a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
</div>
<!-- /.row -->
