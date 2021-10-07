<div class="row" id="menuBuilder">
	<div class="col-md-6">
		<div class="card mb-3">
			<div class="card-header">
				<h5 class="float-left">Menü</h5>
			</div>
			<div class="card-body">
				<ul id="myEditor" class="sortableLists list-group">
				</ul>
			</div>
			<div class="card-footer">
				<button type="button" id="btnSave" class="btn btn-primary"><i class="fas fa-save"></i> Menüyü Kaydet</button>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card border-primary mb-3">
			<div class="card-header bg-primary text-white">Menü Elemanı Düzenle</div>
			<div class="card-body">
				<form id="frmEdit" class="form-horizontal">
					<div class="form-group">
						<label for="text">Başlık</label>
						<div class="input-group">
							<input type="text" class="form-control item-menu" name="text" id="text" placeholder="Başlık">
							<div class="input-group-append">
								<button type="button" id="myEditor_icon" class="btn btn-outline-secondary"></button>
							</div>
						</div>
						<input type="hidden" name="icon" class="item-menu">
					</div>
					<div class="form-group">
						<label for="href">URL</label>
						<input type="text" class="form-control item-menu" id="href" name="href" placeholder="URL">
					</div>
					<div class="form-group">
						<label for="target">Target</label>
						<select name="target" id="target" class="form-control item-menu">
							<option value="_self">Self</option>
							<option value="_blank">Blank</option>
							<option value="_top">Top</option>
						</select>
					</div>
				</form>
			</div>
			<div class="card-footer">
				<button type="button" id="btnUpdate" class="btn btn-primary" disabled><i class="fas fa-sync-alt"></i> Elemanı Güncelle</button>
				<button type="button" id="btnAdd" class="btn btn-success"><i class="fas fa-plus"></i> Yeni Eleman Ekle</button>
			</div>
		</div>
	</div>
</div>
