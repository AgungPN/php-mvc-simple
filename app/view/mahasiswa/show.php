<?php /** @var object $student */ ?>
<h1 class="uppercase text-3xl text-center">detail data mahasiswa</h1>
<div class="mt-5 grid place-items-center w-full">
	<ul class="w-3/4 text-left">
		<li class="bg-white p-5 flex justify-evenly rounded shadow-lg my-4">
			<p>Nama</p>
			<strong>:</strong>
			<p><?= $student->nama ?></p>
		</li>
		<li class="bg-white p-5 flex justify-evenly rounded shadow-lg my-4">
			<p>NIM</p>
			<strong>:</strong>
			<p><?= $student->nim ?></p>
		</li>
		<li class="bg-white p-5 flex justify-evenly rounded shadow-lg my-4">
			<p>Email</p>
			<strong>:</strong>
			<p><?= $student->email ?></p>
		</li>
		<li class="bg-white p-5 flex justify-evenly rounded shadow-lg my-4">
			<p>Jurusan</p>
			<strong>:</strong>
			<p><?= $student->jurusan ?></p>
		</li>
		<li class="flex justify-end">
			<a href="<?= BASEURL ?>/mahasiswa" class="bg-blue-400 p-1 rounded-md text-white mr-auto">back to mahasiswa</a>
		</li>
	</ul>
</div>