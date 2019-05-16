
<div class="container">
	<div class="row mt-3 mb-3">
		<div class="col">
		<a href="<?= base_url();  ?>mahasiswa" class="card-link">Kembali</a>
		</div>
	</div>


	<div class="row justify-content-center">
		
		<div class="card-deck ">

		<?php foreach($mahasiswa as $mhs) :?>

			<div class="col-md mb-3">
			<div class="card  bg-light border-dark" style="width: 18rem;">
				
		  <div class="card-body text-center">
		  	 <!-- <img src="" width="150" height="150" class=" mb-1 rounded-circle" >  -->
		    <h5 class="card-title"><?= $mhs['nama'];  ?></h5>
		    <h6 class="card-subtitle mb-2 text-muted"><?= $mhs['npm'];  ?></h6>
		    <p class="card-text"><?= $mhs['email'];  ?></p>
		    <p class="card-text"><?= $mhs['jurusan'];  ?></p>
		    
		    
		  
		    </div>

		</div>
		</div>
		<?php endforeach; ?>

		
		</div>
</div>
</div>