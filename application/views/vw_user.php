<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Creativeitem</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()?>assets/user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/user/css/shop-homepage.css" rel="stylesheet">

  </head>

  <body>
  <?php
  $type =  $this->session->userdata('user_type');

  ?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Recruitment Task</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url()?>logout/<?php echo $type;?>">Log out</a>
            </li>
          </ul>

        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Creativeitem</h1>
          <div class="list-group">
          <?php

          foreach ($category as $value2) {
            ?>

         <a href="#" class="list-group-item"><?php echo $value2->category_name?></a>

         <?php
          }

          ?>
   
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="<?php echo base_url()?>assets/img/2.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo base_url()?>assets/img/2.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo base_url()?>assets/img/3.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <div class="row">
            <?php
            foreach ($product as $value) {
            ?>
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">

                  <div class="card-body">
                    <h4 class="card-title">
                      <a href="#"><?php echo $value->product_title?></a>
                    </h4>
                    <h5>$<?php echo $value->product_selling_price?></h5>
                    <p class="card-text"><?php echo $value->product_description?></p>
                    <?php

                      $variant = json_decode($value->product_varient);

                      echo'<h5>Product Variant:</h5>';
                      if(count($variant)==0)
                      echo 'No Variant';
                      foreach ($variant as $key => $value){

                        echo'<div class="col-sm-12 form-group">
				        <label> '."$key: ".implode(",",$value) ." ".'</label>
				        </div>';
                      }


                    ?>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Kazi Naimul Hoque 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url()?>assets/user/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/user/vendor/popper/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/user/vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
