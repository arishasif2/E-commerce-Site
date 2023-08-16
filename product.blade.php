<section class="product_section layout_padding" id="product_section">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>Our <span>Products</span></h2>
        </div>
        <div class="row">
            @foreach ($product as $product)
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                        <a href="{{route('product_details',$product->id)}}" class="option2">
                            Details
                        </a>
                        <form action="{{route('addcart',$product->id)}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class=" col">
                                    <input type="number" name="quantity" id="" min="1" max="{{$product->quantity}}" value="1">
                                </div>
                                <div class=" col">
                                    <input type="submit" value="Add to Cart">
                                </div>
                            </div>
                        </form>
                   </div>
                </div>
                <div class="img-box">
                   <img src="\product\{{$product->image}}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                        {{$product->title}}
                   </h5>
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
                </div>
             </div>
          </div>
        @endforeach
       </div>
       <div class="btn-box">
          <a href="#product_section">
            View All products
          </a>
       </div>
    </div>
 </section>
 <!-- end product section -->
