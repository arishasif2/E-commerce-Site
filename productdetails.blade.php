<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
    </head>
   <body>
      @include('home.header')
        <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width:50%; padding:30px;">
         <div class="box">
            <div class="img-box" style="padding: 30px;">
               <img src="\product\{{$product->image}}" alt="">
            </div>
            <div class="detail-box">
               <h5>
                    {{$product->title}}
               </h5>
               <h6>
                {{$product->description}}
                </h6>
                <h6>
                    Category:{{$product->category}}
                </h6><br>
                <h6>
                    In Stock:{{$product->quantity}}
                </h6><br>
                @if ($product->discount_price!=NULL)
                    <h6 style="color: red">
                        Rs.{{$product->discount_price}}
                    </h6>
                    <h6 style="text-decoration: line-through; color: blue">
                        Rs.{{$product->price}}
                    </h6>
                    @else
                    <h6 style="color: blue">
                        Rs.{{$product->price}}
                    </h6>
                @endif
               <br>
                <a href="" class="btn btn-primary">
                    Buy Now
                </a>
                <a href="" class="btn btn-danger"><i class="fas fa-shopping-cart"></i>
                    Add to Cart
                </a>
            </div>
      </div>
   </div>
    @include('home.footer')
        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
              Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
            </p>
        </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
