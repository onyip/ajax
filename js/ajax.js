
function getSiswa() {
	$.ajax({
		type 	 :'POST',
		url 	 : base_url+'siswa/get_siswa',
		dataType :'json',
		success  :function(data){

			var row = '';
			var no  = 1;
			for (var i = 0; i < data.length; i++) {
				row += '<tr>'+
				'<td class="text-center">'+ no++ +'</td>'+
				'<td class="text-center">'
				+'<div class="btn-group"><button class="btn btn-sm btn-warning editData" data-toggle="modal" data-target="#form" onclick="submit('+ data[i].id +')"><i class="fa fa-pencil-square-o"></i></button><button class="btn btn-sm btn-danger" onclick="hapus('+ data[i].id +')"><i class="fa fa-trash-o"></i></button></div>'  +
				'</td>'+
				'<td>'+ data[i].fullname +'</td>'+
				'<td>'+ data[i].username +'</td>'+
				'<td>'+ data[i].is_active +'</td>'+
				'</tr>';

			}

			$('#siswa').html(row);
		}
	})
}



function submit(e){

	if (e == 'tambah') {
		$('#t-tambah').show();
		$('#t-ubah').hide();
		$('#hModal').html('Tambah Data Siswa');

		$('[name="fullname"]').val("");
		$('[name="username"]').val("");
		$('[name="password"]').val("");
		$('[name="religion"]').val("");
		$('#gender1').prop('checked', false);
		$('#gender2').prop('checked', false);
		$('#status').prop('checked', false);
		$('[name="alamat"]').val("");
		
	} else {

		$('#t-tambah').hide();
		$('#t-ubah').show();
		$('#hModal').html('Ubah Data Siswa');

		$.ajax({
			type 	 : 'POST',
			url  	 : base_url+'siswa/get_byID',
			data 	 : {id:e},
			dataType : 'json',
			success  : function(byId){
				console.log(byId);
				$('[name="id"]').val(byId.id);
				$('[name="fullname"]').val(byId.fullname);
				$('[name="username"]').val(byId.username);
				$('[name="password"]').val(byId.password);
				$('[name="religion"]').val(byId.religion);
				$('[name="alamat"]').val(byId.address);
				
				if (byId.is_active == 1) {
					$('#status').prop('checked', true);
				}

				if (byId.gender == 'L') {
					$('#gender1').prop('checked', true);
				}else{
					$('#gender2').prop('checked', true);
				}
			}

		});
	}

}


function update(){

	var id 		 =$("[name='id']").val();
	var fullname =$("[name='fullname']").val();
	var username =$("[name='username']").val();
	var password =$("[name='password']").val();
	var status	 =$("[name='status']").val();
	var religion =$("[name='religion']").val();
	var alamat	 =$("[name='alamat']").val();

	if (document.getElementById('gender2').checked) {
		gender = document.getElementById('gender2').value;
	}else{
		gender = document.getElementById('gender1').value;
	}

	if (document.getElementById('status').checked) {
		status = document.getElementById('status').value;
	}else{
		status = 0;
	}

	
	$.ajax({
		type 	 : 'POST',
		url  	 : base_url+'siswa/update',
		dataType : 'json',
		data 	 : {id:id , fullname:fullname, username:username, password:password, religion:religion, alamat:alamat, gender:gender, status:status},
		success	 : function(mesage){

			$('#form').modal('hide');
			getSiswa();

		}
	});
}

function add(){

	var fullname =$("[name='fullname']").val();
	var username =$("[name='username']").val();
	var password =$("[name='password']").val();
	var religion =$("[name='religion']").val();
	var alamat   =$("[name='alamat']").val();

	if (document.getElementById('gender2').checked) {
		gender = document.getElementById('gender2').value;
	}else{
		gender = document.getElementById('gender1').value;
	}

	if (document.getElementById('status').checked) {
		status = document.getElementById('status').value;
	}else{
		status = 0;
	}

	$.ajax({
		type 	 : 'POST',
		url  	 : base_url+'siswa/tambah',
		dataType : 'json',
		data 	 : {fullname:fullname, username:username, password:password, religion:religion, alamat:alamat, gender:gender, status:status},
		success	 : function(mesage){

			$('#form').modal('hide');
			getSiswa();
		}
	});
}


function hapus(e){

	var tanya = confirm('apakah anda yakin ingin menghapus data ini ini ?');
	if (tanya) {


		$.ajax({
			type 	 : 'POST',
			url  	 : base_url+'siswa/hapus',
			data 	 : {id:e},
			dataType : 'json',
			success  : function(mesage){
				getSiswa();
			}
		});
	}
}

