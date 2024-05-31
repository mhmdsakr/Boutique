
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
      <?php
      include "includes/header.php"
      ?>
      
      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Shop</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <div class="container p-0">
            <div class="row">
              <!-- SHOP SIDEBAR-->
              <?php
                include "includes/sidebar.php"
              ?>
              <!-- SHOP LISTING-->
              <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                <div class="row mb-3 align-items-center">
                  <div class="col-lg-6 mb-2 mb-lg-0">
                    <p class="text-small text-muted mb-0">Showing 1–12 of 53 results</p>
                  </div>
                  <div class="col-lg-6">
                    <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                      <li class="list-inline-item text-muted mr-3"><a class="reset-anchor p-0" href="#"><i class="fas fa-th-large"></i></a></li>
                      <li class="list-inline-item text-muted mr-3"><a class="reset-anchor p-0" href="#"><i class="fas fa-th"></i></a></li>
                      <li class="list-inline-item">
                        <select class="selectpicker ml-auto" name="sorting" data-width="200" data-style="bs-select-form-control" data-title="Default sorting">
                          <option value="default">Default sorting</option>
                          <option value="popularity">Popularity</option>
                          <option value="low-high">Price: Low to High</option>
                          <option value="high-low">Price: High to Low</option>
                        </select>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="row">
                  <!-- PRODUCT-->
                  <?php
                      
                      
                      $page= isset($_GET['page'] )? $_GET['page'] : 1;
                      $numDiv = 3;
                      $offset = ($page -1) * $numDiv;
                      @$cat_id = $_GET['id'];
                      $selectLimit ="SELECT * FROM products WHERE cat = $cat_id LIMIT $numDiv OFFSET $offset";

                      if(@$_GET['id'] == ""){
                        $_GET['id'] = "";
                        $selectLimit ="SELECT * FROM products LIMIT $numDiv OFFSET $offset";
                        
                        
                      }
                    
                    $queryLimit = $conn -> query($selectLimit);
                    foreach($queryLimit as $pro){

                    $pro_img = $pro['image'];
                    $pros = explode("," , $pro_img);
                    $pro1 = $pros[0];

                  ?>


                  <div class="col-lg-4 col-sm-6">
                    <div class="product text-center">
                      <div class="mb-3 position-relative">
                        <div class="badge text-white badge-"></div><a class="d-block" href="detail.php?id=<?=$pro['id']?>"><img class="img-fluid w-100" src="admin/fun/product/image/<?=$pro1?>" alt="..."></a>
                        <div class="product-overlay">
                          <ul class="mb-0 list-inline">
                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="pages/addCart.php?id=<?=$pro['id']?>">Add to cart</a></li>
                            <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-toggle="modal"><i class="fas fa-expand"></i></a></li>
                          </ul>
                        </div>
                      </div>
                      <h6> <a class="reset-anchor" href="detail.php?id=<?=$pro['id']?>"><?=$pro['name']?></a></h6>
                      <p class="small text-muted">$<?=$pro['price']?></p>
                    </div>
                  </div>

                    <?php } ?>

                </div>
                <!-- PAGINATION-->
                <?php
                if($_GET['id'] > 0){
                  $br=$_GET['id'];
                  $select_pag="SELECT * FROM products WHERE brand = '$br'";
                }else{
                  $select_pag="SELECT * FROM products";
                }
                  $query_pag = $conn -> query($select_pag);
                  $num = $query_pag -> num_rows;
                  $number= ceil($num/3);

                ?>






                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center justify-content-lg-end">
                    <?php
                    if(!isset($_GET['page'])){
                      $_GET['page'] = 1;
                      // @$x= $_GET['page'];
                      // $next = $x + 1; 
                      // $last = $x - 1;
                    }
                    $x= $_GET['page'];
                    $next = $x + 1; 
                    $last = $x - 1; 


                    if($x>1){
                      ?>
                      <li class="page-item"><a class="page-link" href="?page=<?=$last?>&id=<?=$_GET['id']?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                      <?php
                    }else{
                      echo "";
                    }
                  
                    for($i=1 ; $i<=$number ; $i++){

                    ?>


                      
                      <li class="page-item 
                      <?php
                        if($x == $i){
                          echo "active";
                        }
                      ?>
                      "><a class="page-link" href="?page=<?=$i?>&id=<?=$_GET['id']?>"><?=$i?></a></li>



                    <?php
                    
                    }
                    
                    
                    if($x != $number){
                      ?>
                      <li class="page-item"><a class="page-link" href="?page=<?=$next?>&id=<?=$_GET['id']?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                      <?php
                    }else{
                      echo "";
                    }
                    
                    ?>
                  </ul>
                </nav>








              </div>
            </div>
          </div>
        </section>
      </div>
      <?php
      include "includes/footer.php";
      ?>