<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="css/custome_index.css"> -->
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <script type="text/javascript" src="js/custome.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&family=Roboto:wght@500&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Roboto:wght@500&display=swap" rel="stylesheet">

    <title>Hello, world!</title>
  </head>
  <body>
    
    @if($message = Session::get('failed'))
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
        {{ $message }}
    </div>
    @endif
    @if($message = Session::get('success'))
      <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
        {{ $message }}
      </div>
    @endif

    <nav>
      <div class="left">
        <p id="self">Pengingat</p>
      </div>
      <div class="right">
        <ul id="nav" class="nav">
          <li>
            <a href="#" data-toggle="modal" data-target="#exampleModal">Login</a>
          </li>
        </ul>
      </div>
    </nav>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">LOGIN</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="/home/login">
              {{ csrf_field() }}
                <label>Username</label>
                <input type="text" name="username" placeholder="Username" class="form-control">
                <br>
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" class="form-control">
                <br>
                <input type="submit" name="submit" value="Login" class="btn-success btn1">
                <button type="button" class="btn1 btn-warning" data-dismiss="modal">Close</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    <div class="body_home">
      <div class="left">
        <p align="center">Mari Mengingat Bersama <br> PT. Mayaksa Mugi Mulia</p>
        <div class="center">
          <button class="btn" data-toggle="modal" data-target="#exampleModal">Login</button>
        </div>
      </div>
      <div class="right">
        <img src="image/flat.svg">
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  </body>
</html>