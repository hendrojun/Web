<div class="container">
	
	<div class="row mt-3">
		<div class="col-md-6">

			<div class="card">
			  <div class="card-header">
			    Form Tambah Data Mahasiswa
			  </div>
			  <div class="card-body">
			  	

			  	<form action="" method="post">
				
				<div class="form-group">
				    <label for="nama">Nama</label>
				    <input type="nama" class="form-control" id="nama" name="nama">
				    <small class="form-text text-danger"><?= form_error('nama'); ?></small>
				  </div>
				  <div class="form-group">
				    <label for="npm">NPM</label>
				    <input type="text" class="form-control" id="npm" name="npm" >
				    <small class="form-text text-danger"><?= form_error('npm'); ?></small>
				  </div>
				  <div class="form-group">
				    <label for="email">Email</label>
				    <input type="text" class="form-control" id="email" name="email">
				    <small class="form-text text-danger"><?= form_error('email'); ?></small>
				  </div>
				 	<div class="form-group">
					    <label for="jurusan">Jurusan</label>
					    <select class="form-control" id="jurusan" name="jurusan">
					     <option value="Informatika">Informatika</option>
							<option value="Sistem Informasi">Sistem Informasi</option>
							<option value="Teknik Komputer">Teknik Komputer</option>
							<option value="Teknik Elektro">Teknik Elektro</option>
							<option value="Teknik Sipil">Teknik Sipil</option>
							<option value="Teknologi Informasi">Teknologi Informasi</option>
					    </select>
					    <small class="form-text text-danger"><?= form_error('jurusan'); ?></small>
					  </div>
					 <!--  <div class="form-group">
					    <label for="gambar">Upload Foto</label>
					   
					    <input type="file" class="form-control-file" id="gambar" name="gambar">
					   
					  </div> -->
					  	
				<button type="submit" value="upload" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
					  
			 </form>
			    
			  </div>
			</div>
			
		</div>

	</div>
</div>