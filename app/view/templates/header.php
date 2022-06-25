<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title; ?></title>
	<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/tailwind.css">
	<script src="<?= BASEURL ?>//sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>

<body class="bg-gray-50">
	<nav class="bg-gray-800 mb-5">
		<div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
			<div class="relative flex items-center justify-between h-12">
				<div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
					<div class="hidden sm:block sm:ml-6">
						<div class="flex space-x-4" id="list-menu">
							<a class=" text-white text-4xs px-3 py-2  font-bold " aria-current="page">MVC PHP</a>
							<a href="<?= BASEURL ?>/mahasiswa" class="text-white hover:bg-gray-700 bg-gray-900 hover:text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Mahasiswa</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<div class="container mx-auto px-4">