<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    <base href="/public">

    @include('admin.css')

    <style type="text/css">
    
    .div_center{
        text-align: center;
        padding-top: 30px;
    }
    .h2_font{
        font-size: 30px;
    }

    .color{
        color: black;
        padding-bottom: 20px;
    }

    label{
        display:inline-block;
        width:200px;
    }

    .div_design{
padding-bottom: 10px;
    }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
 @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">

                @if (session()->has('message'))
                <div class="alert alert-success">

                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                 {{session()->get('message')}}
                </div>                  
             @endif

<div class="div_center">
    <h2 class="h2_font ">Update Product</h2>

    <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">

        @csrf

    <div class="div_design">
        <label for="title">Product Title:</label>
        <input type="text" class="color" name="title" placeholder="Write A Product Name" required="" value="{{$product->title}}">
    </div>


    <div class="div_design">
        <label for="title">Product Description:</label>
        <input type="text" class="color" name="description" placeholder="Write A Product Descrption" value="{{$product->description}}" required="">
    </div>

    <div class="div_design">
        <label for="title">Product Price:</label>
        <input type="number" class="color" name="price" placeholder="Write A Product Price" value="{{$product->price}}" required="">
    </div>

    <div class="div_design">
        <label for="title">Discount Price:</label>
        <input type="number" class="color" name="discount_price" placeholder="Write A Discount Price" value="{{$product->discount_price}}">
    </div>

    <div class="div_design">
        <label for="title">Product Quantity:</label>
        <input type="number" class="color" min="0" name="quantity" placeholder="Write A Product Quantity" value="{{$product->quantity}}" required=""> 
    </div>

    <div class="div_design">
        <label for="title">Product Category:</label>
        <select class="color" name="category" required="">
            <option value="" selected="" value="{{$product->category}}">{{$product->category}}</option>

            @foreach ($category as $category)
            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
        @endforeach

        </select>
    </div class="div_design">

    <div class="div_design">

        <label for="">Current Product Image:</label>
        <img style="margin: auto;" height="100px" width="100px"  src="/product/{{$product->image}}" alt="">
    </div>

    <div class="div_design">

        <label for="">Change Product Image:</label>
        <input type="file" name="image" value="{{$product->image}}"
    </div>

    <div class="div_design">

        <input type="submit" name="submit" value="Update" class="btn btn-primary" >
    </div>

</form>

</div>

                </div>
            </div>

        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   @include('admin.script')
  </body>
</html>