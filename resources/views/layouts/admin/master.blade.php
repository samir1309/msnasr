<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.blocks.head')
<body dir="rtl" >
@include('sweet::alert')
<div class="dashboard-main-wrapper">

@include('layouts.admin.blocks.header')

@include('layouts.admin.blocks.sidebar')
    

        <!-- ============ Body content start ============= -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
          
            @yield('content')
         
			   </div>
            </div>

            @include('layouts.admin.blocks.footer')
        </div>
        <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->
 </div>
    <!-- ============ Search UI Start ============= -->
  
    <!-- ============ Search UI End ============= -->
    @include('layouts.admin.blocks.script')
  
</body>

</html>