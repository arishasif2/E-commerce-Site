<!DOCTYPE html>
<html lang="en">
  <head>
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
    <style>
        .input{
            color: black;
        }
        .table{
            margin:auto;
            width:75%;
            text-align: center;
            margin-top: 30px;
            border:3px solid gray;
            color: black;
        }
        .img-size{
           margin: auto;
        }
        .font{
            font-size: 30px;
            padding-bottom: 25px;
        }
        .div_center{
            text-align: center;
            padding-top: 20px;
        }

    </style>
  </head>
  <body>
    <div class="container-scroller">
      @include('home.header')
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="div_center">
            <h2 class="font">Your Cart</h2>
            <table class="table">
                <thead>
                    <th>Product Title</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Image</th>
                    <th>Total Cost</th>
                </thead>
                <tbody>
                    <?php $totalprice=0;?>
                    @foreach ($cart as $cart)
                        <tr>
                            <td class="tablerow">{{$cart->product_title}}</td>
                            <td class="tablerow">{{$cart->price}}</td>
                            <td class="tablerow">{{$cart->quantity}}</td>
                            <td class="tablerow"><img src="\product\{{$cart->image}}" alt="" width="50px" height="50px" class="img-size"></td>
                            <td class="tablerow">{{$cart->total_cost}}</td>
                            <td class="tablerow"><a href='{{route('deletecart',$cart->id)}}' class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php $totalprice+=$cart->total_cost?>
                    @endforeach
                </tbody>
            </table>
                <br>
                <h3 class="foot">Total Bill: <b>{{$totalprice}}</b></h3><br>
                <a href='{{route('cashmode')}}' class="btn btn-info" >Cash on Delivery</a>
                <a href='{{route('stripe',$totalprice)}}' class="btn btn-warning" >Pay using Card</a>
    </div>
    </div>
    </div>
    <br>
  @include('home.footer')
  <div class="cpy_">
      <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
        Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
      </p>
  </div>
<!-- jQuery -->
<script src="home/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="home/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="home/js/bootstrap.js"></script>
<!-- custom js -->
<script src="home/js/custom.js"></script>
</body>
</html>
