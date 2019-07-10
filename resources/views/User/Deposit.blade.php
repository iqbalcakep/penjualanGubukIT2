@extends('User/Master')


        @section('main')
        <div class="row">
                <div class="col-md-12">
                    <center><p class="drescription">Deposit Saldo Anda</p></center>
                </div>
            </div>
            <div class="tiles">
                <div class="row">
                    <div class="form-group">
                        <label for="jumlah_deposit">Masukkan Jumlah Deposit </label>
                        <input type="text" placeholder="Jumlah Deposit" name="" id="jumlah_deposit" class="form-control form-control-line">
                    </div>
                    <div class="form-group">
                        <input type="button" id="tambahDeposit" value="Deposit Sekarang" class="btn btn-success form-control form-control-line">
                        <div id="hasil">

                        </div>
                    </div>
                </div>
            </div>
        @endsection

        @section('script')
        <script type="text/javascript">	
            $(document).ready(function(){
                var rupiah = document.getElementById("jumlah_deposit");
                rupiah.addEventListener("keyup", function(e) {
                rupiah.value = formatRupiah(this.value, "Rp. ");
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
    
                $("#tambahDeposit").click(function(e){
                    e.preventDefault();
                    var saldo_tambah = parseInt(rupiah.value.replace(/,.*|[^0-9]/g, ''), 10);
                    var id_user = "{{$id_user}}";
                    var nama_pengirim = "{{$nama}}";
                    $.ajax({
                        url:"user/addDeposit",
                        type:"post",
                        data:{id_user,nama_pengirim,saldo_tambah},
                        dataType:"json",
                        success:function(response){
                            if(response==="success"){
                                $("#jumlah_deposit").val("");
                                $("#hasil").html("<div class='alert alert-success' role='alert'>"+
                                    "Selamat Transaksi Berhasil"+
                                    "</div>"
                                )
                                setTimeout(() => {
                                    window.location="/user"
                                }, 1000);
                            }else{
                                $("#hasil").html("<div class='alert alert-danger' role='alert'>"+
                                    "Pembelian tidak dapat dilakukan saat ini coba lagi nanti"+
                                    "</div>"
                                )
                                setTimeout(() => {
                                    $("#hasil").html("");
                                    $("#jumlah_deposit").val("");
                                }, 1000);
                            }
                        },
                        error:function(xhr){
                            console.log(xhr.responseText);
                        }
                    })
    
                    
                })
                
            })
        </script>
        @endsection