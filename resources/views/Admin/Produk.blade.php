@extends('Admin/Master')

    @section('konten')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor m-b-0 m-t-0">Daftar Produk</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Produk</li>
                    </ol>
                </div>
            </div>
            <div class="row">
            <div class="col-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="table-responsive">
                                <h2>Semua Produk</h2>
                                <table class="table" id="produk">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Gambar</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                            <th style="display:none">id_produk</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=1; ?>
                                    @foreach ($produk as $v) 
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $v->nama_produk }}</td>
                                        <td>{{ "Rp " . number_format($v->harga_produk,2,',','.')}}</td>
                                        <td>{{ $v->stok_produk }}</td>
                                        <td><img class="img-circle" src="assets/file/{{ $v->gambar_produk }}" height="150" width="200"></td>
                                        <td>{{ $v->deskripsi_produk }}</td>
                                        <td><button clas="btn btn-success" id="edit">Edit</button><button clas="btn btn-success" id="hapus">Hapus</button></td>
                                        <td style="display:none"><?= $v->id_produk; ?></td>
                                    </tr>
                                    <?php $no++; ?>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                
            <!-- FORM ADD -->
            <form id="formAdd" class="form-horizontal form-material">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-block">
                        <h4>Gambar Produk</h4>
                            <center class="m-t-30"> <img id="preview" class="img-circle" width="150" height="150px" />
                                <h4 class="card-title m-t-10"><input type="file" name="gambar_produk" id="gambar_produk"></h4>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <div class="card-block">
                        <h4>Detail Produk</h4>
                                <div class="form-group">
                                    <label class="col-md-12">Produk</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="nama produk" name="nama_produk" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Harga</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="harga" id="harga_produk" name="harga_palsu" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Stok</label>
                                    <div class="col-md-12">
                                        <input type="number" placeholder="masukkan stok" min="0" name="stok_produk" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Deskripsi</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" id="deskripsi_produk" name="deskripsi_produk" class="form-control form-control-line"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Tambah Produk</button>
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
            <input type="hidden" name="id_produk" id="id_produk2">
                <div class="col-lg-11 col-xlg-12 col-md-10">
                    <div class="card">
                        <div class="card-block">
                        <h4>Detail Produk</h4>
                                <div class="form-group">
                                    <label class="col-md-12">Produk</label>
                                    <div class="col-md-12">
                                        <input type="text" id="nama_produk" placeholder="nama produk" name="nama_produk" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Harga</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="harga" id="harga_produk2" name="harga_palsu" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Stok</label>
                                    <div class="col-md-12">
                                        <input type="number" placeholder="masukkan stok" id="stok_produk" min="0" name="stok_produk" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Deskripsi</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" id="deskripsi_produk2" name="deskripsi_produk" class="form-control form-control-line"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div id="previewedit"></div>
                                    <img id="preview2" style="display:none" class="img-circle" width="150" height="150px" />
                                    <h4 class="card-title m-t-10"><input type="file" name="gambar_produk" id="gambar_produk2"></h4>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Edit Produk</button>
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
       
    </div>
    @endsection
    @section('script')
            <script type="text/javascript">
                $(document).ready(function() {
                    
                    CKEDITOR.replace('deskripsi_produk', {
                                customConfig: '/config.js'
                        } );
                    CKEDITOR.replace('deskripsi_produk2', {
                                customConfig: '/config.js'
                        } );
                    var table = $('#produk').DataTable();//set dattable

                $('#produk tbody').on( 'click', '#edit', function () { //edit data
                    var data = table.row( $(this).parents('tr') ).data();
                    $("#formEdit").show();
                    $("#formAdd").hide();
                    $("#previewedit").html(data[4]);
                    $("#nama_produk").val(data[1]);
                    $("#harga_produk2").val(data[2]);
                    $("#stok_produk").val(data[3]);
                    $("#id_produk2").val(data[7]);
                    CKEDITOR.instances['deskripsi_produk2'].setData(data[5]);
                } );

                $('#produk tbody').on( 'click', '#hapus', function () { //hapus data
                    var confirm = window.confirm("Yakin Akan Menghapus ??");
                    var data = table.row( $(this).parents('tr') ).data();
                    if(confirm){
                        $(this).parents('tr').remove();
                        $.ajax({
                            url:'Produk/deleteProduk',
                            type:"post",
                            data:{id_produk:data[7]},
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

                    function readURL(input,id) { //set preview
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            if(id!=null){
                            $('#preview'+id).attr('src', e.target.result);
                            }else{
                            $('#preview').attr('src', e.target.result);
                            }
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }

                    $("#gambar_produk").change(function(e){
                        e.preventDefault();
                        readURL(this,null); //memanggil preview
                    })

                    $("#gambar_produk2").change(function(e){
                        e.preventDefault();
                        $("#previewedit").hide();
                        $("#preview2").show();
                        readURL(this,2); //memanggil preview
                    })

                    var rupiah = document.getElementById("harga_produk");
                    rupiah.addEventListener("keyup", function(e) {
                    rupiah.value = formatRupiah(this.value, "Rp. ");
                    });

                    var rupiah2 = document.getElementById("harga_produk2");
                    rupiah2.addEventListener("keyup", function(e) {
                    rupiah2.value = formatRupiah(this.value, "Rp. ");
                    });

                    function formatRupiah(angka, prefix) {
                    var number_string = angka.replace(/[^,\d]/g, "").toString(),
                        split = number_string.split(","),
                        sisa = split[0].length % 3,
                        rupiah = split[0].substr(0, sisa),
                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
                    if (ribuan) {
                        separator = sisa ? "." : "";
                        rupiah += separator + ribuan.join(".");
                    }
                    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
                    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
                    }

                
                } );


                $("#formAdd").submit(function(e){ //form add submit
                    e.preventDefault();
                    for ( instance in CKEDITOR.instances ) {
                        CKEDITOR.instances[instance].updateElement();
                    }
                    var rupiah = document.getElementById("harga_produk");
                    var formData = new FormData(this);
                    formData.append('harga_produk', parseInt(rupiah.value.replace(/,.*|[^0-9]/g, ''), 10));
                    $.ajax({
                            url:'Produk/saveProduk',
                            type:"post",
                            data:formData,
                            dataType:"json",
                            processData:false,
                            contentType:false,
                            cache:false,
                            success: function(response){
                                console.log(response);
                                if(response.status==="success"){
                                    $("#pesanbox").html("<div class='alert alert-"+response.status+"'><strong>Success!</strong> Produk Baru Telah Tersimpan</div>");
                                    setTimeout(() => {
                                       window.location = "/showProduk";
                                    }, 1000);
                                }else{
                                    $("#pesanbox").html("<div class='alert alert-"+response.status+"'><strong>GAGAL!</strong> Periksa Kembali Data Anda</div>");
                                    setTimeout(() => {
                                        window.location = "/showProduk";
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
                    for ( instance in CKEDITOR.instances ) {
                        CKEDITOR.instances[instance].updateElement();
                    }
                    var rupiah = document.getElementById("harga_produk2");
                    var formData = new FormData(this);
                    formData.append('harga_produk', parseInt(rupiah.value.replace(/,.*|[^0-9]/g, ''), 10));
                    formData.append('id_produk',$("#id_produk2").val());
                    $.ajax({
                            url:'Produk/updateProduk',
                            type:"post",
                            data:formData,
                            dataType:"json",
                            processData:false,
                            contentType:false,
                            cache:false,
                            success: function(response){
                                console.log(response);
                                if(response.status==="success"){
                                    $("#pesanbox2").html("<div class='alert alert-"+response.status+"'><strong>Success!</strong> Update Produk Telah Tersimpan</div>");
                                    setTimeout(() => {
                                        window.location = "/showProduk";
                                    }, 1000);
                                }else{
                                    $("#pesanbox2").html("<div class='alert alert-"+response.status+"'><strong>GAGAL!</strong> Periksa Kembali Data Anda</div>");
                                    setTimeout(() => {
                                        window.location = "/showProduk";
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