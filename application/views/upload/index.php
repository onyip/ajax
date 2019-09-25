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
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="<?=base_url()?>">Ajax</a>
        <a class="nav-item nav-link" href="<?=base_url()?>upload/">Upload Gambar</a>
      </div>
    </div>
  </nav>

  <div class="jumbotron">
    <h1 class="text-center">SISWA HILANG</h1>
    <h2 class="text-center">HARAP LAPOR JIKA MENEMUKANNYA</h2>
  </div>

  <a href="<?=base_url('upload/add')?>"><button class="btn btn-sm btn-primary" >Tambah Siswa</button></a>

  <table class="table-striped table table-condensed">
    <thead>
      <tr>
        <th class="text-center" width="30px">No</th>
        <th class="text-center">Action</th>
        <th class="text-center">Full Name</th>
        <th class="text-center">Username</th>
        <th class="text-center">Alamat</th>
        <th class="text-center">Kelamin</th>
        <th class="text-center">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; foreach ($siswa as $row): ?>
      <tr>
        <td class="text-center"><?=$no++?></td>
        <td class="text-center">
         <a onclick="foto()"><i class="fa fa-search text-primary btn btn-sm"></i></a>
         <a href="<?=base_url("upload/update/$row->id")?>"><i class="fa fa-pencil-square-o text-warning btn btn-sm"></i></a>
         <a onclick=" if (confirm('apakah anda yakin ingin menghapus data ini ini ?')) {
          exit();
         } " href="<?=base_url("upload/delete/$row->id")?>"><i class="fa fa-times text-danger btn btn-sm" data-toggle="modal" data-target="#hapus"></i></a></td>

        <td><?=$row->fullname?></td>
        <td><?=$row->username?></td>
        <td><?=$row->address?></td>
        <td class="text-center"><?=$row->gender?></td>
        <td class="text-center"><?=$row->is_active?></td>
        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="hapus">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data ini?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Hapus<?=$row->id?></button>
              </div>
            </div>
          </div>
        </div>

      </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script
src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="<?=base_url()?>js/ajax.js"></script>
</body>
</html>
