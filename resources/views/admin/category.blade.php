<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">
    .category{
     text-align: center;
     padding-top: 40px;
    }
    .h2-font{
      font-size: 30px;
      padding-bottom: 40px;
    }
    .center{
      margin:auto;
      width:50%;
      text-align: center;
      border:1px solid white;
      margin-top: 10px;
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
              
            <div class="category">
              <h2 class="h2-font">Add Category</h2>
            <form action="{{url('/add_category')}}" method ="POST">

              @csrf

              <input type="text" style="border-radius:10px; color:black;" name="category" placeholder="Write a Category Name">
              <input type="submit" class=" btn btn-primary" style="border-radius:10px;" name="submit" value="Add Category">

            </form>
            </div>

            <table class="center">
              <tr>
                <td>
                  Category Name 
                </td>
                <td>Action</td>
              </tr>
             @foreach ($data as $data)
             <tr>
              <td>{{$data->category_name}}</td>
              <td>
                <a onclick="return confirm('Are You Sure to Delete')" class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a>
              </td>
            </tr>
             @endforeach
             
            </table>

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