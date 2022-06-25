</div>


<script>
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
		didOpen: (toast) => {
			toast.addEventListener('mouseenter', Swal.stopTimer)
			toast.addEventListener('mouseleave', Swal.resumeTimer)
		}
	})
</script>
<?php
if (isset($_SESSION["flash"])) App\Core\FlashMessage::getFlashMessage();
if (isset($_SESSION['flashArray'])) App\Core\FlashMessage::getFlashMessageArray();
?>
<script type="module" src="<?= BASEURL ?>//assets/js/script.js"></script>
</body>

</html>