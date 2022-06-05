<h1 class="font-bold text-3xl mb-3">Ini halaman mahasiswa</h1>

<a href="" class="bg-blue-500 text-white py-1 px-2 rounded-md my-5 hover:font-bold hover:bg-blue-600">Tambah Data</a>
<div class="w-1/2 bg-white rounded-lg shadow-lg lg:w-1/2 p-5">
	<ul class="divide-y-2 divide-gray-400">
		<?php foreach ($students as $student) : ?>
			<li class="flex justify-between p-3 hover:bg-gray-50 hover:font-bold">
				<?= $student->nama ?>
				<div class="flex justify-between gap-2">
					<a href="<?= BASEURL . '/mahasiswa/show/' . $student->id ?>" class="bg-blue-400 text-white py-1 px-2 rounded">
						Detail
					</a>
					<a href="<?= BASEURL . '/mahasiswa/show/' . $student->id ?>" class="bg-red-400 text-white py-1 px-2 rounded">
						Delete
					</a>
					<a href="<?= BASEURL . '/mahasiswa/show/' . $student->id ?>" class="bg-green-400 text-white py-1 px-2 rounded">
						Edit
					</a>
				</div>
			</li>
		<?php endforeach ?>
	</ul>
</div>