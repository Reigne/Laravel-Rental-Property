<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="Type here...">
                </div>
            </div>

            <ul class="navbar-nav  justify-content-end">
                {{-- <li class="nav-item d-flex align-items-center">
            <a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard">Online Builder</a>
          </li> --}}
                @if (Auth::check())
                     @if (Auth::user()->role == 'tenant' or Auth::user()->role == 'landlord' or Auth::user()->role == 'admin')
                        <li class="nav-item d-flex align-items-center pe-md-3 d-flex align-items-center">
                            {{-- <a href="{{ route('user.logout') }}" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa-solid fa-person-running"></i>
                                <span class="d-sm-inline d-none">Logout</span>
                            </a> --}}
                        </li>

                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="d-sm-inline d-none">
                                    @if (Auth::user()->role === 'tenant')
                                        <img src="{{ asset(Auth::user()->tenants->imagePath) }}" alt="avatar"
                                            class="rounded-circle img-fluid" style="width: 25px;">
                                    @elseif (Auth::user()->role === 'landlord')
                                        <img src="{{ asset(Auth::user()->landlords->imagePath) }}" alt="avatar"
                                            class="rounded-circle img-fluid" style="width: 25px;">
                                    @elseif (Auth::user()->role === 'admin')
                                        <img src="{{ asset(Auth::user()->admins->imagePath) }}" alt="avatar"
                                            class="rounded-circle img-fluid" style="width: 25px;">
                                    @else
                                    @endif
                                </span> &nbsp; {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                {{-- <li><a class="dropdown-item" href="javascript:;">Landlord</a></li> --}}
                                <li>
                                    @if (Auth::user()->role === 'tenant')
                                        <a href="{{ route('tenant.profile') }}" class="dropdown-item">
                                        @elseif (Auth::user()->role === 'landlord')
                                            <a href="{{ route('landlord.profile') }}" class="dropdown-item">
                                            @else
                                            <a href="" class="dropdown-item">
                                    @endif
                                    <i class="fa-solid fa-circle-user"></i>
                                    <span class="d-sm-inline d-none"> &nbsp; Profile</span></a>
                                </li>
                                <li><a href="{{ route('user.logout') }}" class="dropdown-item">
                                        <i class="fa-solid fa-person-running"></i>
                                        <span class="d-sm-inline d-none"> &nbsp; Logout</span></a>
                                </li>
                                {{-- <li><a class="dropdown-item" href="javascript:;">Something else here</a></li> --}}
                            </ul>
                        </li>
                    @endif
                @else
                    <li class="nav-item d-flex align-items-center pe-md-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body font-weight-bold px-0" data-bs-toggle='modal'
                            data-bs-target='#signinModal'>
                            <span class="d-sm-inline d-none">
                                <i class="fa-solid fa-right-to-bracket"></i> Sign In
                            </span>
                        </a>
                    </li>

                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>

                    {{-- <li class="nav-item px-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0">
              <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
            </a>
          </li> --}}
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user-plus"></i>
                            <span class="d-sm-inline d-none">Register As</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#" data-bs-toggle='modal'
                                    data-bs-target='#myTModal'><i class="fa-solid fa-user"></i> &nbsp; Tenant</a></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle='modal'
                                    data-bs-target='#myLModal'><i class="fa-solid fa-people-roof"></i> &nbsp;
                                    Landlord</a></li>
                            {{-- <li><a class="dropdown-item" href="javascript:;">Something else here</a></li> --}}
                        </ul>
                    </li>
                @endif



            </ul>

        </div>
    </div>
</nav>
<!-- End Navbar -->
