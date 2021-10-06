<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">İçerikler Tablosu</h3>

				<div class="card-tools">
					<a class="btn btn-sm btn-primary" href="<?php echo base_url("admin/contents/excel") ?>"><i class="fa fa-plus"></i> Excel</a>
					<a class="btn btn-sm btn-primary" href="<?php echo base_url("admin/contents/create") ?>"><i class="fa fa-plus"></i> Yeni İçerik</a>
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
						<?php foreach ($contents as $key => $content): ?>
							<tr>
								<td><img src="<?php echo base_url($content->content_image) ?>" style="height:30px;width:auto;"></td>
								<td><?php echo $content->content_title; ?></td>
								<td>
									<a class="btn btn-danger" href="<?php echo base_url("admin/contents/delete/$content->content_id") ?>">Sil</a>
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
