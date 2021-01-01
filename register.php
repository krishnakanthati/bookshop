<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>bookshop</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">bookshop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/login.php">Login</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown link
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">


    <h3>Please Register Here:</h3>
        <hr>
        <form action="" method="post">
            <div class="row">
            <div class="form-group col-md-5">
                <label for="inputEmail4">Name</label>
                <input type="text" class="form-control" name="name" id="inputName4" placeholder="Name">
            </div>
            <div class="form-group col-md-5">
                <label for="inputEmail4">Username</label>
                <input type="text" class="form-control" name="username" id="inputUsername4" placeholder="Username">
            </div>
            </div>
            <br>
            <div class="row">
                <div class="form-group col-md-5">
                <label for="inputEmail4">Email</label>
                <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group col-md-5">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" name ="password" id="inputPassword4" placeholder="Password">
                </div>
            </div>
            <br>
            <div class="form-group col-md-10">
                <label for="inputAddress2">Address</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <br>
            <div class="row">
                <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
                </div>
                <div class="form-group col-md-3">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" placeholder="City">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="inputZip" placeholder="ZIP Code">
                </div>
                <div class="form-group col-md-5">
                <br>
                <label for="phone">Phone</label>
                <input type="tel" class="form-control" id="phone" placeholder="Phone Number">
                </div>
            </div>
            <br>
                <button type="submit" class="btn btn-primary">Sign up</button>
        </form>
    
  </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>
