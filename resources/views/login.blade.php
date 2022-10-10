<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

<div class="container" >
   
  <div class="card" style="margin-top:10%;width:50%;margin-left: auto;margin-right: auto;">
  <h5 class="card-header">LOGIN</h5>
  <div class="card-body">


      <div class="mb-3">
        <label for="exampleInputEmail1"  class="form-label">Email</label>
        <input type="email"  id="email" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1"  class="form-label">Password</label>
        <input type="password" id="password" class="form-control" id="exampleInputPassword1">
      </div>

      <div class="text-center">
      <button id="btnlogin" class="btn btn-primary ">LOGIN</button>
      </div>



  </div>
</div>

</div>
   
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>

  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var base_url = window.location.origin;


    $( "#btnlogin" ).click(function() {

      var email = $('#email').val();
      var password = $('#password').val();
      $.ajax({
        type:'POST',
        url: '/login/checkuser',
        dataType:"json",
        data:{
            email: $('#email').val(),
            password: $('#password').val(),
            _token: CSRF_TOKEN,
        },
        success:function(data)
        {



          if(data.error == true)
          {
          

              Swal.fire({
              icon: "error",
              title: "LOGIN",
              html: data.message,
              });

          }
          else {
              var new_url = base_url + "" + data.url;
              window.location.href = new_url;
          }

        
             
         
        }
    });
    
    });
   
  </script>

</html>