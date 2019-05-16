<div class="container mt-5 ">
	<div class="row justify-content-center">
	<div class="card bg-light border-primary" style="width: 18rem;">
  <div class="card-body text-center">
  	<img src="<?= BASEURL; ?>/img/foto/<?= $data['mhs']['gambar'];  ?>" class="card-title rounded-circle" width="150" height="150" >
    <h5 class="card-title"><?= $data['mhs']['nama'];  ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?= $data['mhs']['npm'];  ?></h6>
    <p class="card-text"><?= $data['mhs']['email'];  ?></p>
    <p class="card-text"><?= $data['mhs']['jurusan'];  ?></p>
    <a href="<?= BASEURL;  ?>/mahasiswa" class="card-link">Kembali</a>
    
  </div>
  </div>
</div>
</div>