</div>
<?php if (isset($_SESSION["flash"])) App\Core\FlashMessage::getFlashMessage(); ?>
<script type="module" src="<?= BASEURL ?>//assets/js/script.js"></script>
</body>

</html>