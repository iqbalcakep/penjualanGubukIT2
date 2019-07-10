@extends('Admin/Master')


        @section('konten')
        <div class="page-wrapper">
                <div class="container-fluid">
                    <div class="row page-titles">
                        <div class="col-md-5 col-8 align-self-center">
                            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-12">
                            <div class="card">
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <h2>Riwayat Transaksi</h2>
                                        <table class="table" id="riwayat_transaksi">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Pembeli</th>
                                                    <th>Produk</th>
                                                    <th>Jumlah</th>
                                                    <th>Total</th>
                                                    <th>Tanggal</th>
                                                </tr>
                                            </thead>
    
                                            <tbody>
                                            <?php $no=1; ?>
                                            @foreach ($riwayat as $v )
                                            <tr>
                                                    <td>{{$no}}</td>
                                                    <td>{{$v->nama_user }}</td>
                                                    <td>{{$v->nama_produk }}</td>
                                                    <td>{{$v->jumlah_transaksi }}</td>
                                                    <td>{{ "Rp " . number_format($v->total_harga,2,',','.') }}</td>
                                                    <td>{{$v->tanggal_transaksi }}</td>
                                                </tr>
                                                <?php $no++; ?>
                                                
                                            @endforeach
                                              
                                            </tbody>
    
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer"> © 2019 iqbalcakep </footer>
            </div>

        @endsection

        @section('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#riwayat_transaksi').DataTable();//set dattable
            } );
    </script>
        @endsection