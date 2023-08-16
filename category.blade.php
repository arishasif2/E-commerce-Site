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
                <h2 class="font">Add Category</h2>
                <form action="{{url('/add_category')}}" method="POST" class="align-items-center">
                    @csrf
                    <input type="text" name="name"  placeholder="Category Name" class="input" >
                    <br><br>
                    <input type="submit" value="Add Category" class="btn btn-primary">
                </form>
            </div>
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($category as $category)
                        <tr>
                            <td class="tablerow">{{$category->name}}</td>
                            <td class="tablerow"><a onclick="return confirm('Are you Sure?')" href={{url('delete',$category->id)}} class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    <!-- plugins:js -->
   @include('admin.js')
  </body>
</html>
