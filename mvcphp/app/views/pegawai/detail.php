		<div class="container my-3">
			<div class="row">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title"><?= $data['pgw']['nama'] ?></h5>
					<h6 class="card-subtitle mb-2 text-muted"><?= $data['pgw']['nip'] ?></h6>
					<p class="card-text"><?= $data['pgw']['email'] ?></p>
					<p class="card-text"><?= $data['pgw']['depart'] ?></p>
					<a href="<?= BASEURL; ?>/Pegawai" class="card-link btn btn-primary text-right btn-sm">Back</a>
				</div>
			</div>
			</div>
		</div>