<h1 class="font-bold text-3xl mb-3">Ini halaman mahasiswa</h1>

<a href="<?= BASEURL . '/mahasiswa/create' ?>" class="bg-blue-500 text-white py-1 px-2 rounded-md hover:font-bold hover:bg-blue-600 mb-3">Tambah Data</a>
<div class="w-1/2 bg-white rounded-lg shadow-lg lg:w-1/2 p-5 mt-3">
	<form action="<?= BASEURL.'/mahasiswa/search/'?>" method="POST" class="w-full flex border-gray-500 mb-5">
		<input type="search" id="default-search" autocomplete="off" name="search" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ml-4 mr-5" placeholder="Search ..." >
		<input type="submit" value="search" class="p-1 px-2 text-white shadow bg-blue-500 rounded-lg hover:bg-blue-600 hover:shadow-lg">
	</form>
	
	<ul class="divide-y-2 divide-gray-400">
		<?php if ($students == null) : ?>
			<li class="font-bold text-red-500 text-center">Data kosong!</li>
		<?php else : ?>
			<?php foreach ($students as $student) : ?>
				<li class="flex justify-between p-3 hover:bg-gray-50 hover:font-bold">
					<?= $student->nama ?>
					<div class="flex justify-between gap-2">
						<a href="<?= BASEURL . '/mahasiswa/show/' . $student->id ?>" class="bg-blue-400 text-white py-1 px-2 rounded">
							Detail
						</a>
						<a href="<?= BASEURL . '/mahasiswa/destroy/' . $student->id ?>" class="bg-red-400 text-white py-1 px-2 rounded delete-student" data-confirm="<?= $student->nama ?>">
							Delete
						</a>
						<a href="<?= BASEURL . '/mahasiswa/edit/' . $student->id ?>" class="bg-green-400 text-white py-1 px-2 rounded">
							Edit
						</a>
					</div>
				</li>
			<?php endforeach ?>
		<?php endif ?>
	</ul>
</div>