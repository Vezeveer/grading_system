<!DOCTYPE html>
<html>

<?php include 'globals/header.php' ?>

<div>
  <div class="login-form">
    <form>
      <div class="form-group">
        <input onClick="document.location.href='view.php'" type="submit" name="submit" value="View" class="btn btn-primary btn-block">
      </div>
      <div class="form-group">
        <input onClick="document.location.href='create.php'" type="submit" name="submit" value="Create" class="btn btn-primary btn-block">
      </div>
      <div class="form-group">
        <input onClick="document.location.href='delete.php'" type="submit" name="submit" value="Delete" class="btn btn-primary btn-block">
      </div>
      <div class="form-group">
        <input onClick="document.location.href='update.php'" type="submit" name="submit" value="Update" class="btn btn-primary btn-block">
      </div>
    </form>
  </div>
</div>

<?php include 'globals/footer.php' ?>

</html>