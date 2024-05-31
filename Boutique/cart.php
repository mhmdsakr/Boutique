<?php
session_start();
@$user_id = $_SESSION['login_id'];
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Boutique | Ecommerce bootstrap template</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <!-- Lightbox-->
  <link rel="stylesheet" href="vendor/lightbox2/css/lightbox.min.css">
  <!-- Range slider-->
  <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
  <!-- Bootstrap select-->
  <link rel="stylesheet" href="vendor/bootstrap-select/css/bootstrap-select.min.css">
  <!-- Owl Carousel-->
  <link rel="stylesheet" href="vendor/owl.carousel2/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="vendor/owl.carousel2/assets/owl.theme.default.css">
  <!-- Google fonts-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/favicon.png">
  <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
  <div class="page-holder">
    <!-- navbar-->
    <header class="header bg-white">
      <div class="container px-0 px-lg-3">
        <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.php"><span class="font-weight-bold text-uppercase text-dark">Boutique</span></a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <!-- Link--><a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <!-- Link--><a class="nav-link active" href="shop.php">Shop</a>
              </li>
              <li class="nav-item">
                <!-- Link--><a class="nav-link" href="detail.php">Product detail</a>
              </li>
              <li class="nav-item">
                <!-- Link--><a class="nav-link" href="contact.php">Contact Us</a>
              </li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                <div class="dropdown-menu mt-3" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="index.html">Homepage</a><a class="dropdown-item border-0 transition-link" href="shop.html">Category</a><a class="dropdown-item border-0 transition-link" href="detail.html">Product detail</a><a class="dropdown-item border-0 transition-link" href="cart.html">Shopping cart</a><a class="dropdown-item border-0 transition-link" href="checkout.html">Checkout</a></div>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="nav-link" href="cart.php"> <i class="fas fa-dolly-flatbed mr-1 text-gray"></i>Cart<small class="text-gray">(
                    <?php
                    $sum = 0;
                    if (isset($_SESSION['login_id'])) {
                      include "fun/conn.php";
                      $id_con = $_SESSION['login_id'];
                      $select_con = "SELECT * FROM cart WHERE user_id = $id_con";
                      $query_con = $conn->query($select_con);

                      while ($row = $query_con->fetch_assoc()) {
                        $num = $row['quantity'];
                        $sum += $num;
                      }
                    } else {
                      echo "0";
                    }
                    echo $sum;
                    ?>
                    )</small></a></li>
              <li class="nav-item"><a class="nav-link" href="#"> <i class="far fa-heart mr-1"></i><small class="text-gray"> (0)</small></a></li>
              <li class="nav-item"><a class="nav-link" href="login.php"> <i class="fas fa-user-alt mr-1 text-gray"></i>
                  <?php
                  if (isset($_SESSION['login_id'])) {
                    echo "Logout";
                  } else {
                    echo "Login";
                  }
                  ?>
                </a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!--  Modal -->
    <div class="modal fade" id="productView" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="row align-items-stretch">
              <div class="col-lg-6 p-lg-0"><a class="product-view d-block h-100 bg-cover bg-center" style="background: url(img/product-5.jpg)" href="img/product-5.jpg" data-lightbox="productview" title="Red digital smartwatch"></a><a class="d-none" href="img/product-5-alt-1.jpg" title="Red digital smartwatch" data-lightbox="productview"></a><a class="d-none" href="img/product-5-alt-2.jpg" title="Red digital smartwatch" data-lightbox="productview"></a></div>
              <div class="col-lg-6">
                <button class="close p-4" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <div class="p-5 my-md-4">
                  <ul class="list-inline mb-2">
                    <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                    <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                    <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                    <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                    <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                  </ul>
                  <h2 class="h4">Red digital smartwatch</h2>
                  <p class="text-muted">$250</p>
                  <p class="text-small mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</p>
                  <div class="row align-items-stretch mb-4">
                    <div class="col-sm-7 pr-sm-0">
                      <div class="border d-flex align-items-center justify-content-between py-1 px-3"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                        <div class="quantity">
                          <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                          <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                          <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-5 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href="cart.html">Add to cart</a></div>
                  </div><a class="btn btn-link text-dark p-0" href="#"><i class="far fa-heart mr-2"></i>Add to wish list</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <!-- HERO SECTION-->
      <section class="py-5 bg-light">
        <div class="container">
          <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
            <div class="col-lg-6">
              <h1 class="h2 text-uppercase mb-0">Cart</h1>
            </div>
            <div class="col-lg-6 text-lg-right">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="py-5">
        <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
        <div class="row">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <!-- CART TABLE-->
            <div class="table-responsive mb-4">
              <table class="table">
                <thead class="bg-light">
                  <tr>
                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Product</strong></th>
                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Price</strong></th>
                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Quantity</strong></th>
                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Total</strong></th>
                    <th class="border-0" scope="col"> </th>
                  </tr>
                </thead>
                <tbody>


                  <?php
                  include "fun/conn.php";
                  $select = "SELECT * FROM cart WHERE user_id = '$user_id'";
                  $query = $conn->query($select);
                  $total = [];
                  while ($row_cart = $query->fetch_assoc()) {
                    $pro_id = $row_cart['pro_id'];


                    $select_pro = "SELECT * FROM products WHERE id = '$pro_id'";
                    $query_pro = $conn->query($select_pro);
                    while ($pro = $query_pro->fetch_assoc()) {


                  ?>



                      <tr>
                        <th class="pl-0 border-0" scope="row">
                          <div class="media align-items-center"><a class="reset-anchor d-block animsition-link" href="detail.php?id=<?= $pro['id'] ?>"><img src="img/<?= $pro['image'] ?>" alt="..." width="70" /></a>
                            <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link" href="detail.php?id=<?= $pro['id'] ?>"><?= $pro['name'] ?></a></strong></div>
                          </div>
                        </th>
                        <td class="align-middle border-0">
                          <p class="mb-0 small">$<?= $pro['price'] ?></p>
                        </td>
                        <td class="align-middle border-0">
                          <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family"><?= $pro['count'] ?></span>
                            <div class="quantity">
                              <input class="form-control form-control-sm border-0 shadow-0 p-0" type="text" value="<?= $row_cart['quantity'] ?>" />
                            </div>
                          </div>
                        </td>
                        <td class="align-middle border-0">
                          <p class="mb-0 small">$
                            <?php
                            $q = $row_cart['quantity'];
                            $price = $pro['price'];
                            $sum = $q * $price;
                            echo $sum;
                            array_push($total, $sum);

                            ?>

                          </p>
                        </td>
                        <td class="align-middle border-0"><a class="reset-anchor" href="pages/delete_cart.php?id=<?= $row_cart['id'] ?>"><i class="fas fa-trash-alt small text-muted"></i></a></td>
                      </tr>

                  <?php
                    }
                  }
                  ?>



                </tbody>
              </table>
            </div>
            <!-- CART NAV-->
            <div class="bg-light px-4 py-3">
              <div class="row align-items-center text-center">
                <div class="col-md-6 mb-3 mb-md-0 text-md-left"><a class="btn btn-link p-0 text-dark btn-sm" href="shop.php"><i class="fas fa-long-arrow-alt-left mr-2"> </i>Continue shopping</a></div>
                <div class="col-md-6 text-md-right"><a class="btn btn-outline-dark btn-sm" href="checkout.php">Procceed to checkout<i class="fas fa-long-arrow-alt-right ml-2"></i></a></div>
              </div>
            </div>
          </div>
          <!-- ORDER TOTAL-->
          <div class="col-lg-4">
            <div class="card border-0 rounded-0 p-lg-4 bg-light">
              <div class="card-body">
                <h5 class="text-uppercase mb-4">Cart total</h5>
                <ul class="list-unstyled mb-0">
                  <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Subtotal</strong><span class="text-muted small">$
                      <?php

                      $num = array_sum($total);
                      echo $num;

                      ?>
                    </span></li>
                  <li class="border-bottom my-2"></li>
                  <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Total</strong><span>$<?= $num ?></span></li>
                  <li>
                    <form action="#">
                      <div class="form-group mb-0">
                        <input class="form-control" type="text" placeholder="Enter your coupon">
                        <button class="btn btn-dark btn-sm btn-block" type="submit"> <i class="fas fa-gift mr-2"></i>Apply coupon</button>
                      </div>
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php
    include "includes/footer.php";
    ?>