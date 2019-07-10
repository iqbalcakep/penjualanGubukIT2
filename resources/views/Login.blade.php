<!DOCTYPE html>
<html>
<head>
    <title>Penjualan Produk GUBUK IT</title>
    <link rel="stylesheet" type="text/css" href={{url("/assets/css/bootstrap.min.css")}}>
    <link rel="stylesheet" type="text/css" href="assets/css/loginstyle.css">
   
</head>
<body>
    <!-- FORM LOGIN -->
<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Silahkan Login Terelbih Dahulu</h1>
           <div id="pesan"></div>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                <form class="form-signin">
                <input type="text" id="username" class="form-control" placeholder="Username" required autofocus>
                <input type="password" id="password" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="button" id="login">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END FORM -->
</body>
<script type="text/javascript" src="assets/js/jquery-3.1.0.min.js"></script>

<!-- FORM LOGIN ACTION -->
<script>
    $("#login").click(function(event){
        var username = $("#username").val();
        var password = $("#password").val();
        var url = "{{url('/login_aksi')}}"
        $.ajax({
            url:url,
            type:"POST",
            data:{username,password},
            success:function(response){
                if(response==="success"){
                $("#pesan").html(" <div class='alert alert-"+response+"'><strong>Success!</strong> Selamat Login Berhasil</div>")
                setTimeout(() => {
                    if(username === "admin"){
                        window.location="{{url('/admin')}}"
                    }else{
                        window.location="{{url('/user')}}"
                    }
                }, 1000);
            }else{
                $("#pesan").html(" <div class='alert alert-"+response+"'><strong>Gagal!</strong> Pastikan Data Sudah Benar</div>")
                setTimeout(() => {
                    $("#pesan").html("")
                }, 1000);
               }},
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        })
    })
</script>
<!-- END FORM LOGIN ACTION -->
</html>