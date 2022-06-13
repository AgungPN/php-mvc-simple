<?php view("templates/header.php",$data); ?>

<div class="bg-blue-300 p-20 rounded shadow-lg w-1/3">
	<form action="<?= BASEURL ?>/mahasiswa/store" class="grid grid-cols-1 justify-center" method="post">
	 	<h1 class="text-3xl mb-3 font-bold">Tambah Mahasiswa</h1>
		<div class="mb-3">
			<label for="name" class="block">Nama Mahasiswa</label>
			<input type="text" name="name" class="rounded p-1 w-full" id="name" placeholder="nama mahasiswa">
		</div>
		<div class="mb-3">
			<label for="nim" class="block">NIM</label>
			<input type="number" name="nim" class="rounded p-1 w-full" id="nim" placeholder="nim mahasiswa">
		</div>
		<div class="mb-3">
			<label for="email" class="block">Email</label>
			<input type="email" name="email" class="rounded p-1 w-full" id="email" placeholder="email mahasiswa">
		</div>
		<div class="mb-3">
			<label for="vocational" class="block">Jurusan</label>
			<select name="vocational" id="vocational" class="rounded p-1 w-full">
				<option value="TI">Teknik Informatika</option>
				<option value="SI">Sistem Informatika</option>
			</select>
		</div>
		<br>
		<input type="submit" value="submit" class="bg-blue-500 p-2 rounded-md text-white">
	</form>
</div>

<?php view("templates/footer.php") ?>