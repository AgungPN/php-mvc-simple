<?php view("templates/header.php",$data); ?>

<div class="bg-green-300 p-20 rounded shadow-lg w-1/3">
	<form action="<?= BASEURL ?>/mahasiswa/update" class="grid grid-cols-1 justify-center" method="post">
		<input type="hidden" name="id" value="<?= $student->id ?>">
		<h1 class="text-3xl mb-3 font-bold">Edit Mahasiswa</h1>
		<div class="mb-3">
			<label for="name" class="block">Nama Mahasiswa</label>
			<input type="text" name="name" value="<?= $student->nama ?>" class="rounded p-1 w-full" id="name" placeholder="nama mahasiswa">
		</div>
		<div class="mb-3">
			<label for="nim" class="block">NIM</label>
			<input type="number" name="nim" value="<?= $student->nim ?>" class="rounded p-1 w-full" id="nim" placeholder="nim mahasiswa">
		</div>
		<div class="mb-3">
			<label for="email" class="block">Email</label>
			<input type="email" name="email" value="<?= $student->email ?>" class="rounded p-1 w-full" id="email" placeholder="email mahasiswa">
		</div>
		<div class="mb-3">
			<label for="vocational" class="block">Jurusan</label>
			<select name="vocational" id="vocational" class="rounded p-1 w-full">
				<option value="TI" <?= $student->jurusan == "TI" ? "selected" : "" ?>>Teknik Informatika</option>
				<option value="SI" <?= $student->jurusan == "SI" ? "selected" : "" ?>>Sistem Informatika</option>
			</select>
		</div>
		<br>
		<input type="submit" value="edit" class="bg-green-500 p-2 rounded-md text-white">
	</form>
</div>

<?php view("templates/footer.php") ?>