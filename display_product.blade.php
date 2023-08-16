<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .input{
            color: black;
        }
        .table{
            margin:auto;
            width: 50px;
            text-align: center;
            margin-top: 30px;
            border:3px solid green;
            color: white;
        }
        .tablerow:hover{
            color:#6c7293;
        }
        .img-size{
            width: 150px;
            height: 150px;
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
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
      @if (session()->has('message'))
      <div class="alert alert-success">
          <button type="button" class="close" data-dismiss='alert' aria-hidden="true">x</button>
          {{session()->get('message')}}
      </div>
  @endif
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="div_center">
            <h2 class="font">All Products</h2>
            <table class="table">
                <thead>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Discounted Price</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($product as $product)
                        <tr>
                            <td class="tablerow">{{$product->title}}</td>
                            <td class="tablerow">{{$product->description}}</td>
                            <td class="tablerow">{{$product->quantity}}</td>
                            <td class="tablerow">{{$product->price}}</td>
                            <td class="tablerow">{{$product->discount_price}}</td>
                            <td class="tablerow">{{$product->category}}</td>
                            <td class="tablerow"><img class="img-fluid" src="\product\{{$product->image}}" alt=""></td>
                            <td class="tablerow"><a  href='{{url('editproduct',$product->id)}}' class="btn btn-info">Edit</a>
                                <a onclick="return confirm('Are you Sure?')" href={{url('deleteproduct',$product->id)}} class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
  <!-- plugins:js -->
 @include('admin.js')
</body>
</html>
