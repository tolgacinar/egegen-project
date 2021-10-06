<div class="row">
	<div class="col-lg-12">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Horizontal Form</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form class="form-horizontal" method="post" action="<?php echo base_url("admin/news/create") ?>" enctype="multipart/form-data">
				<div class="card-body">
					<?php if (isset($error)): ?>
						<div class="form-group alert alert-danger">
							<?php echo $error; ?>		
						</div>
					<?php endif ?>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Haber Başlığı</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputEmail3" name="news_title">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPassword3" class="col-sm-2 col-form-label">Haber Görseli</label>
						<div class="col-sm-10">
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="news_image" id="customFile">
								<label class="custom-file-label" for="customFile">Görsel seçin</label>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Haber İçeriği</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="news_content"></textarea>
						</div>
					</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					<button type="submit" class="btn btn-info">Kaydet</button>
				</div>
				<!-- /.card-footer -->
			</form>
		</div>
	</div>
</div>