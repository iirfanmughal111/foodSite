<?php include'../parts/config.php'?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="css/style.css" />
    <script src="https://kit.fontawesome.com/3c6a48fcc7.js" crossorigin="anonymous"></script>

    <title>Admin Panel</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a
                      class="nav-link active"
                      aria-current="page"
                      href="index.php"
                      >Home</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="manage-admin.php">Admin</a>
                  </li>
                   
                  <li class="nav-item">
                    <a class="nav-link" href="manage-food.php">Food</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="manage-category.php">Categories</a>
                  </li>
                 <li class="nav-item">
                    <a class="nav-link" href="manage-order.php">Order</a>
                  </li>
                  <li class="nav-item">
                    <a class="mt-1 ms-2 btn btn-danger btn-sm " href="logout.php">Logout</a>
                  </li>
                  
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
