$(function() {
	//event tombol edit di klik jquery
	$('.tampilModalUbah').on('click', function(){

		$('#judulModalLabel').html('Ubah Data Pegawai');
		$('.modal-footer button[type=submit]').html('Ubah Data');
		//jquery untuk ganti method edit di modal
		$('.modal-body form').attr('action','http://localhost/mvcphp/public/Pegawai/ubah')

		const id = $(this).data('id');

		//menjalankan ajax
		$.ajax({
			//method getUbah mengembalikan data mahasiswa sesuai dengan id yg dikirim di const
			url: 'http://localhost/mvcphp/public/Pegawai/getUbah',
			//kirimkan kiri id data yg dikirimkan, kanan isi datanya
			data: {id : id},
			//dikirimkan menggunakan method
			type: 'POST',
			//type datanya apa
			dataType: 'json',
			//ketika sukses apa yg dilakukan setelah permintaan ajax berhasil 
			success: function(data){
				//mengganti data di modal dengan value objek dari javascript
				$('#nama').val(data.nama);
				$('#nip').val(data.nip);
				$('#email').val(data.email);
				$('#depart').val(data.depart);
				$('#id').val(data.id);
			}
		});
	});
});