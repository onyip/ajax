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
          <a class="detail" onclick="detail(<?=$row->id?>)" href=""><i class="fa fa-search text-primary btn btn-sm"></i></a>
          <a href="<?=base_url("upload/update/$row->id")?>"><i class="fa fa-pencil-square-o text-warning btn btn-sm"></i></a>
          <a href="<?=base_url("upload/delete/$row->id")?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="fa fa-times text-danger btn btn-sm"></i></a></td>

          <td><?=$row->fullname?></td>
          <td><?=$row->username?></td>
          <td><?=$row->address?></td>
          <td class="text-center"><?=$row->gender?></td>
          <td class="text-center"><?=$row->is_active?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       
     </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
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
<script type="text/javascript">
  $('.detail').click(function(e) {
    e.preventDefault();
    $('#detail').modal('show');
  });

  function detail(e){
    $.ajax({
      type   : 'POST',
      url    : base_url+'siswa/get_byID',
      data   : {id:e},
      dataType : 'json',
      success  : function(x){
        if (x.foto != "") {
        var foto = '<img src="<?=base_url()?>asset/img/'+x.foto+'">'
        $('.modal-body').html(foto);
        } else {
        var foto = '<h1>Foto Tidak Ditemukan</h1>'
        $('.modal-body').html(foto);
        }
      }
    });    
  }
</script>
</body>
</html>
