<h1 class="font-bold text-3xl">Ini halaman mahasiswa</h1>
<ul class="list-item">
    <?php foreach ($mahasiswa as $m) : ?>
        <li><?= $m->nama; ?></li>
    <?php endforeach ?>
</ul>