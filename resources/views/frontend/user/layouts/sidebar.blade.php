<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('user.dashboard')}}">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">User</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li       class="nav-item active"   class="{{\Request::is('user/dashboard')?'active' :''}}">
      <a class="nav-link" href="{{route('user.dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Shop
        </div>
    <!--Orders -->
    <li class="nav-item"   class="{{\Request::is('user/order')?'active' :''}}">
       <a class="nav-link" href="{{route('user.order')}}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>Orders</span>
        </a>
    </li>



     <!--address -->
     <li    class="nav-item"    class="{{\Request::is('user/address')?'active' :''}}">
      <a class="nav-link" href="{{route('user.address')}}">
           <i class="fas fa-hammer fa-chart-area"></i>
           <span>Address</span>
       </a>
   </li>


      <!--profile -->
      <li class="nav-item"   class="{{\Request::is('user/account-detail')?'active' :''}}">
        <a class="nav-link" href="{{route('user.account')}}">
             <i class="fas fa-hammer fa-chart-area"></i>
             <span>Profile</span>
         </a>
     </li>
  

    <!-- Reviews -->
    {{--<li class="nav-item">
        <a class="nav-link" href="{{route('user.productreview.index')}}">
            <i class="fas fa-comments"></i>
            <span>Reviews</span></a>
    </li>
    

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Posts
    </div>
    <!-- Comments -->
    <li class="nav-item">
      <a class="nav-link" href="{{route('user.post-comment.index')}}">
          <i class="fas fa-comments fa-chart-area"></i>
          <span>Comments</span>
      </a>
    </li>--}}
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
