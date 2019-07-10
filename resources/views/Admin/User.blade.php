@extends('Admin/Master')

@section('konten')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Daftar user</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Daftar user</li>
                </ol>
            </div>
        </div>
        <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-block">
                        <div class="table-responsive">
                            <h2>Semua user</h2>
                            <table class="table" id="user">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Saldo</th>
                                        <th>Aksi</th>
                                        <th style="display:none">id_user</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no=1;?>
                                @foreach ($user as $v)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$v->nama_user }}</td>
                                    <td>{{$v->username_user }}</td>
                                    <td>{{ "Rp " . number_format($v->saldo_user,2,',','.')}}</td>
                                    <td><button clas="btn btn-success" id="edit">Edit</button><button clas="btn btn-success" id="hapus">Hapus</button></td>
                                    <td style="display:none">{{ $v->id_user}}</td>
                                </tr>
                                <?php $no++;?>
                                @endforeach
                               
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            
        <!-- FORM ADD -->
        <form id="formAdd" class="form-horizontal form-material">
            <div class="col-lg-11 col-xlg-12 col-md-10">
                <div class="card">
                    <div class="card-block">
                    <h4>Detail user</h4>
                            <div class="form-group">
                                <label class="col-md-12">Nama User</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="nama user" name="nama_user" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Username</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="username" id="username" name="username_user" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12"></label>
                                <div class="col-md-12">
                                    <input type="password" placeholder="password" name="password_user" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Tambah user</button>
                                </div>
                            <div id="pesanbox"></div>
                            </div>
                    </div>
                </div>
            </div>
            </form>  
       <!-- END FORM ADD -->
       <!-- Form Edit -->
        <form id="formEdit" style="display:none" class="form-horizontal form-material">
        <input type="hidden" name="id_user" id="id_user2">
        <div class="col-lg-11 col-xlg-12 col-md-10">
                <div class="card">
                    <div class="card-block">
                    <h4>Detail user</h4>
                            <div class="form-group">
                                <label class="col-md-12">Nama User</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="nama user" id="nama_user2" name="nama_user" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Username</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="username" readonly id="username_user2" name="username_user" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Password Baru</label>
                                <div class="col-md-12">
                                    <input type="password" placeholder="password" name="password_user" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Edit user</button>
                                </div>
                            <div id="pesanbox2"></div>
                            </div>
                    </div>
                </div>
            </div>
            </form>
       <!-- END FORM Edit -->
    </div>
</div>
@endsection





@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#user').DataTable();//set dattable

    $('#user tbody').on( 'click', '#edit', function () { //edit data
        var data = table.row( $(this).parents('tr') ).data();
        $("#formEdit").show();
        $("#formAdd").hide();
        $("#nama_user2").val(data[1]);
        $("#username_user2").val(data[2]);
        $("#password_user2").val("");
        $("#id_user2").val(data[5]);
    } );

    $('#user tbody').on( 'click', '#hapus', function () { //hapus data
        var confirm = window.confirm("Yakin Akan Menghapus ??");
        var data = table.row( $(this).parents('tr') ).data();
        if(confirm){
            $(this).parents('tr').remove();
            $.ajax({
                 url:'user/deleteUser',
                 type:"post",
                 data:{id_user:data[5]},
                 dataType:"json",
                  success: function(response){
                      console.log(response);
                      if(response.status==="success"){
                       alert("sukses");
                      }
               },
               error:function(xhr){
                   console.log(xhr.responseText);
               }
             });
            
        }
    });
    
    } );


    $("#formAdd").submit(function(e){ //form add submit
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('saldo_user', parseInt(1000));
        $.ajax({
                 url:'user/saveUser',
                 type:"post",
                 data:formData,
                 dataType:"json",
                 processData:false,
                 contentType:false,
                 cache:false,
                  success: function(response){
                      console.log(response);
                      if(response.status==="success"){
                        $("#pesanbox").html("<div class='alert alert-"+response.status+"'><strong>Success!</strong> user Baru Telah Tersimpan</div>");
                        setTimeout(() => {
                            window.location = "/showUser";
                        }, 1000);
                      }else{
                        $("#pesanbox").html("<div class='alert alert-"+response.status+"'><strong>GAGAL!</strong> Periksa Kembali Data Anda</div>");
                        setTimeout(() => {
                            window.location = "/showUser";
                        }, 1000);
                      }
               },
               error:function(xhr){
                   console.log(xhr.responseText);
               }
             });

    })


    $("#formEdit").submit(function(e){ //form edit
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('id_user',$("#id_user2").val());
        $.ajax({
                 url:'user/updateUser',
                 type:"post",
                 data:formData,
                 dataType:"json",
                 processData:false,
                 contentType:false,
                 cache:false,
                  success: function(response){
                      console.log(response);
                      if(response.status==="success"){
                        $("#pesanbox2").html("<div class='alert alert-"+response.status+"'><strong>Success!</strong> Update user Telah Tersimpan</div>");
                        setTimeout(() => {
                            window.location = "/showUser";
                        }, 1000);
                      }else{
                        $("#pesanbox2").html("<div class='alert alert-"+response.status+"'><strong>GAGAL!</strong> Periksa Kembali Data Anda</div>");
                        setTimeout(() => {
                            window.location = "/showUser";
                        }, 1000);
                      }
               },
               error:function(xhr){
                   console.log(xhr.responseText);
               }
             });

    })
</script>
@endsection