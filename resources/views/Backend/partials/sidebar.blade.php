 
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
        
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/panel')) ? 'active' : '' }}" aria-current="page" href="{{route('dashboard')}}">
              <span data-feather="home"></span><i class="fa-solid fa-user-secret"></i>
               Admin
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin')) ? 'active' : '' }}" aria-current="page" href="{{route('admin')}}">
              <span data-feather="home"></span>
              <i class="fa-solid fa-house"></i> Dashboard
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/hotel*')) ? 'active' : '' }}" href="{{route('hotel')}}">
            <span data-feather="file"></span><i class="fa-solid fa-hotel"></i>
              Hotel
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/user*')) ? 'active' : '' }}" href="{{route('user')}}">
              <span data-feather="file"></span><i class="fa-solid fa-user-group"></i>
              Users
  
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/guest*')) ? 'active' : '' }}" href="{{route('guest')}}">
              <span data-feather="file"></span><i class="fa-solid fa-user-group"></i>
              Guest
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/room_type*')) ? 'active' : '' }}" href="{{route('room_type')}}">
              <span data-feather="file"></span>
              <i class="fa-solid fa-building-columns"></i>
              Room_type
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/rooms*')) ? 'active' : '' }}" href="{{route('rooms')}}">
              <span data-feather="file"></span>
              <i class="fa-solid fa-house-chimney"></i>
              Rooms
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/booking*')) ? 'active' : '' }}" href="{{route('booking')}}">
              <span data-feather="file"></span><i class="fa-solid fa-key"></i>
              Booking
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/amenities*')) ? 'active' : '' }}" href="{{route('amenities')}}">
              <span data-feather="file"><i class="fa-solid fa-gift"></i>
              Amenities
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/payment*')) ? 'active' : '' }}" href="{{route('payment')}}">
              <span data-feather="file"></span><i class="fa-solid fa-money-check-dollar"></i>
              Payment
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/reports*')) ? 'active' : '' }}" href="{{route('reports')}}">
              <span data-feather="file"></span><i class="fa-solid fa-file-export"></i>
              Reports
            </a>
          </li>
    </nav>