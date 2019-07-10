<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
     <link rel="icon" type="image/png" sizes="16x16" href="assets/admin/images/favicon.png">
    <title>Admin Penjualan</title>
    <link href="assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/admin/css/style.css" rel="stylesheet">
    <link href="assets/admin/css/colors/blue.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/datatable/css/jquery.dataTables.min.css">
</head>

<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
            <header class="topbar">
                    <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="index.html">
                                <span style="color: white">Penjualan Admin</span> </a>
                        </div>
                        <div class="navbar-collapse">
                            <ul class="navbar-nav mr-auto mt-md-0">
                                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                            </ul>
                            <ul class="navbar-nav my-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hai {{$nama}}</a><a href="log_out" class="link" data-toggle="tooltip" title="Logout" style="color: white;font-size: 18px"><i class="mdi mdi-power"></i></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
                
                <aside class="left-sidebar">
                    <!-- Sidebar scroll-->
                    <div class="scroll-sidebar">
                        <!-- Sidebar navigation-->
                        <nav class="sidebar-nav">
                            <ul id="sidebarnav">
                                <li> <a class="waves-effect waves-dark" href="admin" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                                </li>
                                <li> <a class="waves-effect waves-dark" href="showProduk" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Daftar Produk</span></a>
                                </li>
                                <li> <a class="waves-effect waves-dark" href="showUser" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Daftar Pengguna</span></a>
                                </li>
                            </ul>
                        </nav>
                        <!-- End Sidebar navigation -->
                    </div>
                    <!-- End Sidebar scroll-->
                </aside>
                @yield('konten')
            </div>
            <footer class="footer"> © 2019 iqbalcakep </footer>
        </div>
    </div>
    <script src="assets/admin/plugins/jquery/jquery.min.js"></script>
    <script src="assets/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/admin/js/jquery.slimscroll.js"></script>
    <script src="assets/admin/js/waves.js"></script>
    <script src="assets/admin/js/sidebarmenu.js"></script>
    <script src="assets/admin/js/custom.min.js"></script>
    <script src="//cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script type="text/javascript" language="javascript" src="assets/datatables/js/jquery.dataTables.min.js"></script>
    @yield('script')
</body>

</html>
