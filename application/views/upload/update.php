<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script type="text/javascript">
    var base_url = "<?=base_url()?>";
  </script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Siswa</title>
</head>
<body>


  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Ajax</a>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="<?=base_url()?>">Ajax</a>
          <a class="nav-item nav-link" href="<?=base_url()?>upload/">Upload Gambar</a>
        </div>
      </div>
    </nav>

    <div class="col-md-6">
      <form method="post" enctype="multipart/form-data" action="<?=base_url('upload/edit')?>" >
        <div class="modal-body">
          <div class="form-group">
            <label>Full Name</label>
            <input type="text" class="form-control" id="fullname" placeholder="Full Name" name="fullname" value="<?=$siswa->fullname?>">
            <input type="hidden" name="id" value="<?=$siswa->id?>">
            <input type="hidden" name="lasimg" value="<?=$siswa->foto?>">
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?=$siswa->username?>">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="<?=$siswa->password?>">
          </div>
          <div class="form-group">
            <div class="custom-control custom-radio custom-control-inline">
              <?php if ($siswa->gender == "L"): ?>
                <input type="radio" id="gender1" name="gender" class="custom-control-input rad" value="L" checked>
                <label class="custom-control-label" for="gender1">Laki-Laki</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="gender2" name="gender" class="custom-control-input rad" value="P">
                <label class="custom-control-label" for="gender2">Perempuan</label>
                <?php else: ?>
                  <input type="radio" id="gender1" name="gender" class="custom-control-input rad" value="L">
                  <label class="custom-control-label" for="gender1">Laki-Laki</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="gender2" name="gender" class="custom-control-input rad" value="P" checked>
                  <label class="custom-control-label" for="gender2">Perempuan</label>
                <?php endif ?>

              </div>
            </div>

            <div class="form-group" mt="5">
              <label>Religion</label>
              <select class="custom-select" name="religion" id="religion" value="<?=$siswa->religion?>">
                <option value="1">Islam</option>
                <option value="2">Kristen</option>
                <option value="3">Katolik</option>
                <option value="4">Hindu</option>
                <option value="5">Budha</option>
              </select>
            </div>

            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea class="form-control" id="alamat" rows="3" name="alamat"><?=$siswa->address?></textarea>
            </div>

            <div class="form-group">
              <label for="foto">Foto</label><br>
              <input type="file" name="foto"><br>
              <?php if ($siswa->foto != ""): ?>
                <img src="<?=base_url()?>/asset/img/<?=$siswa->foto?>" style="width: 100px">
              <?php endif ?>
            </div>

            <div class="form-group form-check" >
              <?php if ($siswa->is_active != 0): ?>
                <input type="checkbox" class="form-check-input" id="status" name="status" value="1" checked>
                <?php else: ?>
                  <input type="checkbox" class="form-check-input" id="status" name="status" value="1">
                <?php endif ?>
                <label class="form-check-label" for="status"  >Active</label>
              </div>

            </div>
            <div class="modal-footer">
              <a href="<?=base_url('upload')?>">  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button></a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>

      <script
      src="https://code.jquery.com/jquery-3.4.1.js"
      integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
      crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="<?=base_url()?>js/ajax.js"></script>

    </body>
    </html>