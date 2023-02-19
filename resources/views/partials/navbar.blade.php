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
                @if (Auth::check() and Auth::user()->role == 'tenant')
                    <li class="nav-item d-flex align-items-center pe-md-3 d-flex align-items-center">
                        <a href="{{ route('user.logout') }}" class="nav-link text-body font-weight-bold px-0">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span class="d-sm-inline d-none">Logout</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="d-sm-inline d-none">
                                @if (Auth::user()->role === 'tenant')
                                    <img src="{{ asset(Auth::user()->tenants->imagePath) }}"
                                        alt="avatar" class="rounded-circle img-fluid" style="width: 25px;">
                                @elseif (Auth::user()->role === 'landlord')
                                    <img src="{{ asset('/storage/' . Auth::user()->landlords->imagePath) }}"
                                        alt="avatar" class="rounded-circle img-fluid" style="width: 20px;">
                                @else
                                @endif
                              </span>
                              {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                            aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#" data-bs-toggle='modal'
                                    data-bs-target='#myTModal'>Tenant</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Landlord</a></li>
                            {{-- <li><a class="dropdown-item" href="javascript:;">Something else here</a></li> --}}
                        </ul>
                    </li>
                @else
                    <li class="nav-item d-flex align-items-center pe-md-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none" data-bs-toggle='modal' data-bs-target='#signinModal'>Sign
                                In</span>
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
                            <i class="fa fa-user me-sm-1 cursor-pointer"></i>
                            <span class="d-sm-inline d-none">Register As</span>
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                            aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#" data-bs-toggle='modal'
                                    data-bs-target='#myTModal'>Tenant</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Landlord</a></li>
                            {{-- <li><a class="dropdown-item" href="javascript:;">Something else here</a></li> --}}
                        </ul>
                    </li>
                @endif



            </ul>

        </div>
    </div>
</nav>
<!-- End Navbar -->
