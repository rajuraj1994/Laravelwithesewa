<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- fontawesome cdn link css -->
  <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Admin - @yield('title')</title>
</head>

<body>
  <div class="container-fluid">
    <div class="d-flex justify-content-end">
      <div class="col-md-1 mt-3">
        <button class="btn btn-success" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
          aria-controls="offcanvasRight">
          Menu
        </button>
        <div class="offcanvas offcanvas-end bg-dark text-white" tabindex="-1" id="offcanvasRight"
          aria-labelledby="offcanvasRightLabel" style="width:300px;">
          <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Admin Dashboard</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="list-unstyled">
              <li><a href="/admin/dashboard" class="text-decoration-none text-white">Dashboard</a></li>
              <li><a href="#" class="text-decoration-none text-white">Users</a></li>
              <li><a href="/productlist" class="text-decoration-none text-white">Products</a></li>
              <li><a href="/addproduct" class="text-decoration-none text-white"> Add Products</a></li>
              <li><a href="/categorylist" class="text-decoration-none text-white">Categories</a></li>
              <li><a href="/addcategory" class="text-decoration-none text-white"> Add Categories</a></li>
              <li><a href="/admin/allorder" class="text-decoration-none text-white">Orders</a></li>
            </ul>
          </div>
          <div class="offcanvas-body">
            <ul class="list-unstyled">
              <li><a href="#" class="text-decoration-none text-white">
                  <b>Name : </b> admin
                </a></li>
              <li><a href="#" class="text-decoration-none text-white">
                  <b>Email : </b> admin@gmail.com
                </a></li>
            </ul>
            <div class="img">
              <img
                src="https://thumbs.dreamstime.com/b/frontal-male-passport-photo-isolated-white-background-eu-standardization-frontal-male-passport-photo-isolated-white-149548031.jpg"
                alt="" class="img-fluid rounded-circle" width="200">
            </div>
            <a href="#" class="btn btn-warning text-decoration-none">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @yield('content-section')


  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>


</body>

</html>