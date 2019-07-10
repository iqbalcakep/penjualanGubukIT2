@extends('User/Master')


        @section('main')
            <div class="row">
                    <div class="col-md-12">
                        <center><p class="drescription">DAFTAR PRODUK KAMI</p></center>
                    </div>
            <div class="tiles">
                    <div class="row">
                        @foreach ($produk as $v )                
                            <div class="col-md-6 col-xs-12">
                            <div class="a">
                            <a href="#test-popup-{{$v['id_produk']}}" class="open-popup-link">
                                    <img height="100%" width="100%"  src="assets/file/{{$v['gambar_produk']}}" class="img-responsive" alt="Responsive image" height="200px" width="500px">
                                    <div class="img-hover glass">
                                        <div class="c-table">
                                            <div class="ct-cell">
                                                <h3 class="img-title">{{$v['nama_produk']}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                
                        <div id="test-popup-{{$v['id_produk']}}" class="white-popup mfp-hide">
                                <div class="container-fluid">
                                  <div class="row">
                                      <div class="pop-up-color">
                                          <div class="col-md-5 p-l-0 p-r-0">
                                            <img style="margin:15px;" src="assets/file/{{$v['gambar_produk']}}" class="img-responsive" alt="Responsive image">
                                          </div>
                                          <div class="col-md-7">
                                              <div>
                                                  <h3 class="popup-head">{{$v['nama_produk']}}</h3>
                                              </div>
                                              <div>
                                                  <p class="popup-parapraph">
                                                  Stok <b>{{$v['stok_produk']}}</b><br>
                                                  Harga <b>{{ "Rp " . number_format($v["harga_produk"],2,',','.') }}</b>
                                                  <br><?= $v->deskripsi_produk;?><br><br>
                                                  <div class="form-group" style="margin-left:20px;">
                                                      <label for="jumlah_beli<?= $v->id_produk;?>">Pilih Jumlah Barang</label>
                                                          <select onchange="cekSaldo({{$v['id_produk']}},{{$v['harga_produk']}})" class="form-control form-control-line" id="jumlah_beli<?= $v->id_produk;?>">
                                                              <option value="0">Jumlah</option>
                                                              <?php for($i=1;$i<=$v["stok_produk"];$i++){?>
                                                              <option value="{{$i}}">{{$i}} Buah</option>
                                                              <?php } ?>
                                                          </select>
                                                  </div>
                                                  <div class="form-group" style="margin-left:20px;">
                                                      <button style="display:none;" id="pesanButton{{$v['id_produk']}}" type="button" onclick="checkOut(event,{{$v['id_produk']}},{{$v['harga_produk']}})" class=" btn btn-success form-control form-control-line">Pesan Sekarang</button>
                                                      <span id="hasil{{$v['id_produk']}}"></span>
                                                  </div>
                                              </p><br/>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        @endforeach
            </div>

        @endsection

        @section('script')
            <script type="text/javascript">

                cekSaldo=(id_produk,harga)=>{ //fungsi cek saldo
                    var jumlah_beli = $("#jumlah_beli"+id_produk+" :selected").val();
                    var saldo = "{{$saldo}}";
                    var totalHarga = Number(jumlah_beli) * Number(harga);
                    $("#hasil"+id_produk).html("");
                    if(totalHarga > saldo){
                        $("#pesanButton"+id_produk).hide();
                        $("#hasil"+id_produk).html("<div class='alert alert-danger' role='alert'>"+
                        "Saldo Anda Kurang, Silahkan Deposit Saldo <b><a href='/deposit' class='alert-link'>disini</a></b>"+
                        "</div>"
                        )
                    }else{
                        $("#hasil"+id_produk).html("Total "+convertToRupiah(totalHarga));
                        $("#pesanButton"+id_produk).show();
                    }
			    }

                checkOut=(e,id_produk,harga)=>{ // fungsi checkout
                        e.preventDefault();
                        $("#pesanButton"+id_produk).hide();
                        var jumlah_beli = $("#jumlah_beli"+id_produk+" :selected").val();
                        var totalHarga = Number(jumlah_beli) * Number(harga);
                        if(jumlah_beli==="0"){
                            $("#hasil"+id_produk).html("<div class='alert alert-danger' role='alert'>"+
                            "Jumlah Pembelian Tidak Boleh kosong"+
                            "</div>"
                            )
                            setTimeout(() => {
                                $("#hasil"+id_produk).html("");
                            }, 1000);
                        }else{
                        $.ajax({
                            url : "/user/checkOut",
                            type : "POST",
                            dataType : "json",
                            data:{jumlah_beli,id_produk,totalHarga},
                            success:function(response){
                                if(response==="success"){
                                    $("#hasil"+id_produk).html("<div class='alert alert-success' role='alert'>"+
                                        "Selamat Transaksi Berhasil"+
                                        "</div>"
                                    )
                                    setTimeout(() => {
                                        window.location="/user"
                                    }, 1000);
                                }else{
                                    $("#hasil"+id_produk).html("<div class='alert alert-danger' role='alert'>"+
                                        "Pembelian tidak dapat dilakukan saat ini coba lagi nanti"+
                                        "</div>"
                                    )
                                    setTimeout(() => {
                                        $("#hasil"+id_produk).html("");
                                    }, 1000);
                                }
                            },
                            error:function(xhr){
                                console.log(xhr.responseText);
                            }
                        })
                    }
                    }

                function convertToRupiah(angka)
				{
					var rupiah = '';		
					var angkarev = angka.toString().split('').reverse().join('');
					for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
					return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
				}

            </script>    
        @endsection