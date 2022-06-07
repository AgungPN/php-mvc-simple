<div class="bg-gray-200">
	<form action="<?= BASEURL?>/mahasiswa/store" method="post">
		<label for="name">Nama Mahasiswa</label>
		<input type="text" name="name" id="name" placeholder="nama mahasiswa">
		<br>
		<label for="nim">NIM</label>
		<input type="number" name="nim" id="nim" placeholder="nim mahasiswa">
		<br>
		<label for="email">Email</label>
		<input type="email" name="email" id="email" placeholder="email mahasiswa">
		<br>
		<select name="vocational" id="">
			<option value="TI">Teknik Informatika</option>
			<option value="SI">Sistem Informatika</option>
		</select>
	<br>
	<input type="submit" value="submit">
	</form>
</div>