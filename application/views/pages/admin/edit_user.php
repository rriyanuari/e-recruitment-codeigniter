<div class="row">
  <div class="col-md-6">
  <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" value=<?=$user['username']?>>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="text" class="form-control" id="password" name="password" value=<?=$user['password']?>>
    </div>
    <div class="form-group">
      <label for="role">Status</label>
      <select class="form-control" id="role">
        <option value="1" <?php if ($user['role'] == 1 ) echo "selected"; ?>>User</option>
        <option value="2" <?php if ($user['role'] == 2 ) echo "selected"; ?>>Admin</option>
      </select>
    </div>
    <div class="form-group">
      <button type="button" class="btn btn-outline-success btn-block tmb_edit_user" id="<?=$user['id_user']?>">
        <b>Simpan</b>
      </button>  
    </div>
  </div>
</div>