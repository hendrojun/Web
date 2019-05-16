$(function(){

	$('.tombolTambahData').on('click',function(){
		$('#judulModal').html('Tambah Data Mahasiswa');
		$('.modal-footer button[type=submit]').html('Tambah Data');
		  $('#nama').val('');
        $('#npm').val('');
        $('#email').val('');
        $('#jurusan').val('');
        $('#id').val('');
	});

	$('.tampilModalUbah').on('click', function(){

		$('#judulModal').html('Ubah Data Mahasiswa');
		$('.modal-footer button[type=submit]').html('Ubah Data');
		$('.modal-body form').attr('action', 'http://if18fx.epizy.com/mahasiswa/ubah');
		
		const id = $(this).data('id');

		$.ajax({
			url: 'http://if18fx.epizy.com/mahasiswa/getubah',
			data: {id : id},
			method: 'post',
			dataType: 'json',
			success: function(data){
				$('#nama').val(data.nama);
				$('#npm').val(data.npm);
				$('#email').val(data.email);
				$('#jurusan').val(data.jurusan);
				$('#gambar').val(data.gambar);
				$('#id').val(data.id);
			}
		});

	});
});