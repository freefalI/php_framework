<h2>ADMINKA</h2>
<form method="POST">
  <button type="submit" name="exit"     class="btn btn-primary">EXIT</button>
</form>
<?= output('admin/choose_table', ['tables'=>SQL::table('tables')->select()->execute()],0); ?>

 <!-- if (isset($_POST["exit"])) { -->