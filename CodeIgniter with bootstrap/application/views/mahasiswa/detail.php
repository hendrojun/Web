<div class="container ">
	<div class="row mt-3 ">
		<div class="col-md-6 ">
			<div class="card text-center">
			  <div class="card-header ">
			    Detail Data Mahasiswa
			  </div>
			  <div class="card-body">
			  	 <!-- <img src="" class="card-title rounded-circle" width="150" height="150" > --> 
			    <h5 class="card-title"><?= $mahasiswa['nama'];  ?></h5>
			    <h6 class="card-subtitle mb-2 text-muted"><?= $mahasiswa['npm'];  ?></h6>
			    <p class="card-text"><?= $mahasiswa['email'];  ?></p>
			        
			        <p class="card-text"><?= $mahasiswa['jurusan'];  ?></p>

			    <a href="<?= base_url(); ?>mahasiswa" class="btn btn-primary">Kembali</a>
			  </div>
			</div>
		</div>
	</div>
</div>