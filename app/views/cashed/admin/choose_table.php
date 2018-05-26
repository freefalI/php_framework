<h2>Choose table</h2>

<?php foreach ($tables as $table): ?>
    <button  class="btn btn-primary"><?= $table['name'] ?></button><br><br>
    <button   name="<?= $table['name'] ?>" class="btn btn-primary"><?= $table['name'] ?></button><br><br>
<?php  endforeach; ?>
