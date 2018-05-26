<br>
<h1>Admin panel</h1>
<form method="POST">
  <button type="submit" name="exit" class="btn btn-primary exit-from-admin-panel">EXIT</button>
</form>
<br><br>
<div class="form-group select-table-to-edit "> 
  <select class="custom-select ">
    <option selected="">Select table to edit</option>
    <option value="1" data-id="1">Products</option>
    <option value="2" data-id="2">Categories</option>
    <!-- <option value="3">Three</option> -->
  </select>
</div>
<div class="form-group edit">
    <div class="select-items"></div>
    <div class="edit-items"></div>
</div> 
</div> 

<!-- {{output('admin/choose_table', ['tables'=>SQL::table('tables')->select()->execute()],0);}} -->

 <!-- if (isset($_POST["exit"])) { -->
  <!-- <script type="text/javascript" src="scripts/main.js"></script> -->

  <script type="text/javascript" src="scripts/admin.js"></script>
  <script src="scripts/jquery-3.2.1.min.js"></script>