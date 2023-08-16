<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .font{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input{
            color: black;
        }
        label {
            display: inline-block;
            width:200px;
        }
        .div_design{
            padding-bottom: 15px;
        }
        .img-fluid{
            margin: auto;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')

      <div class="main-panel">
        <div class="content-wrapper">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss='alert' aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
            @endif
            <div class="div_center ">
                <h2 class="font">Update Product</h2>
                <form action="" method="POST" class="align-items-center" enctype="multipart/form-data">
                    @csrf
                    <div class="div_design"><label for="title">Title</label>
                    <input type="text" name="title" class="input" value="{{$product->title}}"></div>
                    <div class="div_design"><label for="description">Description</label>
                    <input type="text" name="description" class="input" value="{{$product->description}}"required></div>
                    <div class="div_design"><label for="quantity">Quantity</label>
                    <input type="number" name="quantity" class="input" value="{{$product->quantity}}"required></div>
                    <div class="div_design"><label for="price">Price</label>
                    <input type="text" name="price"  class="input" value="{{$product->price}}"required></div>
                    <div class="div_design"><label for="discount_price">Discounted Price</label>
                    <input type="text" name="discount_price"  class="input" value="{{$product->discount_price}}"required></div>
                    <div class="div_design"><label for="category">Category</label>
                        <select name="category" id="category" class="input">
                            <option value="{{$product->category}}" selected>{{$product->category}}</option>
                            @foreach ($category as $category)
                            <option>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="div_design"><label for="image">PresentImage</label>
                        <img class="img-fluid" height="100" width="100" src="\product\{{$product->image}}" alt="">
                    <br><div class="div_design"><label for="image">Upload Image</label>
                        <input type="file" name="image"></div>
                    <br><br>
                    <div class="div_design"><input type="submit" value="Update Product" class="btn btn-primary"></div>
                </form>
            </div>
        </div>
      </div>
    <!-- plugins:js -->
   @include('admin.js')
  </body>
</html>
