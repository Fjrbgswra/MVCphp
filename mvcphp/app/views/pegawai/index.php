	<div class="container mt-3">
		<div class="row">
			<div class="col-lg-7">
				<?php Flasher::flash(); ?>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-lg-7">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">Tambah Pegawai
			</button>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-lg-7">
				<form action="<?= BASEURL; ?>/Pegawai/cari" method="post">
			 	<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="Cari Pegawai.." name="keyword" id="keyword" onautocomplete="off">
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
					</div>
				</div>
				</form>
			</div>
		</div>


	<div class="row">
		<div class="col-7 my-1">
			<h3>Daftar Pegawai</h3>
			<!-- mengambil data -->
			<ul class="list-group">
				<?php foreach ($data['pgw'] as $pgw): ?>
				<li class="list-group-item ">
					<?= $pgw['nama'];?>
					<!-- java script hapus onclick -->
					<a href="<?= BASEURL ?>/Pegawai/hapus/<?= $pgw['id']; ?>" class="btn btn-danger text-right btn-sm float-right ml-2" onclick="return confirm('Apakah anda ingin menghapus Data');">Hapus</a>
					<!-- menangkap id dengan jquery -->
					<a href="<?= BASEURL ?>/Pegawai/ubah/<?= $pgw['id']; ?>" class="btn btn-warning text-right btn-sm float-right ml-2 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?=$pgw['id']; ?>">Edit</a>

					<a href="<?= BASEURL ?>/Pegawai/detail/<?= $pgw['id']; ?>" class="btn btn-primary text-right btn-sm float-right">Detail</a>
				</li>
				<?php endforeach ?>
			</ul>
			<!-- <ul>
				<li><?= $pgw['nama'];?></li>
				<li><?= $pgw['nip'];?></li>
				<li><?= $pgw['email'];?></li>
				<li><?= $pgw['depart'];?></li>
			</ul>	 -->			
		</div>
	</div>
	


	<!-- Modal -->
	<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="judulModalLabel">Tambah Data Pegawai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
					<form action="<?= BASEURL; ?>/Pegawai/tambah" method="post">
					<input type="hidden" name="id" id="id">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
					</div>
					<div class="form-group">
						<label for="nip">NIP</label>
						<input type="number" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email">
					</div>	
					<div class="form-group">
						<label for="depart">Department</label>
						<select class="form-control" id="depart" name="depart">
							<option value="Teknik">Teknik</option>
							<option value="Admin">Admin</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambah Data</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	</div>