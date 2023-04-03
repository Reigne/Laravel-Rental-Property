@extends('layouts.base')
@section('body')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('partials.navbar')
        <hr class="horizontal dark mt-0">

        <div class="container-fluid">
            @if (count($errors) > 0)
                @include('layouts.flash-messages')
            @else
                @include('layouts.flash-messages')
            @endif
        </div>

            <div class="container-fluid">
                <div class="page-header min-height-300 border-radius-xl mt-4"
                    style="background-image: url('../../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
                    <span class="mask bg-gradient-primary opacity-6"></span>
                </div>
                <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                    <div class="row gx-4">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                <img src="../../assets/img/bruce-mars.jpg" alt="profile_image"
                                    class="w-100 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    Alec Thompson
                                </h5>
                                <p class="mb-0 font-weight-bold text-sm">
                                    CEO / Co-Founder
                                </p>
                            </div>
                        </div>
                        {{-- <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                            <div class="nav-wrapper position-relative end-0">
                                <ul class="nav nav-pills nav-fill p-1 bg-transparent flex-column on-resize"
                                    role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab"
                                            href="javascript:;" role="tab" aria-selected="true">
                                            <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42"
                                                version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF"
                                                        fill-rule="nonzero">
                                                        <g transform="translate(1716.000000, 291.000000)">
                                                            <g transform="translate(603.000000, 0.000000)">
                                                                <path class="color-background"
                                                                    d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                                                                </path>
                                                                <path class="color-background"
                                                                    d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z"
                                                                    opacity="0.7"></path>
                                                                <path class="color-background"
                                                                    d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z"
                                                                    opacity="0.7"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="ms-1">App</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;"
                                            role="tab" aria-selected="false" tabindex="-1">
                                            <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44"
                                                version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>document</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF"
                                                        fill-rule="nonzero">
                                                        <g transform="translate(1716.000000, 291.000000)">
                                                            <g transform="translate(154.000000, 300.000000)">
                                                                <path class="color-background"
                                                                    d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"
                                                                    opacity="0.603585379"></path>
                                                                <path class="color-background"
                                                                    d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="ms-1">Messages</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;"
                                            role="tab" aria-selected="false" tabindex="-1">
                                            <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40"
                                                version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>settings</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF"
                                                        fill-rule="nonzero">
                                                        <g transform="translate(1716.000000, 291.000000)">
                                                            <g transform="translate(304.000000, 151.000000)">
                                                                <polygon class="color-background" opacity="0.596981957"
                                                                    points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                                </polygon>
                                                                <path class="color-background"
                                                                    d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"
                                                                    opacity="0.596981957"></path>
                                                                <path class="color-background"
                                                                    d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="ms-1">Settings</span>
                                        </a>
                                    </li>
                                    <div class="moving-tab position-absolute nav-link"
                                        style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 74px;">
                                        <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab"
                                            href="javascript:;" role="tab" aria-selected="true">-</a></div>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-4">
                        <div class="card blur shadow-blur max-height-vh-70 overflow-auto overflow-x-hidden mb-5 mb-lg-0">
                            <div class="card-header p-3">
                                <h6>Friends</h6>
                                <input type="email" class="form-control" placeholder="Search Contact"
                                    aria-label="Email" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="card-body p-2">
                                <a href="javascript:;" class="d-block p-2 border-radius-lg bg-gradient-primary">
                                    <div class="d-flex p-2">
                                        <img alt="Image" src="../../assets/img/team-2.jpg" class="avatar shadow">
                                        <div class="ms-3">
                                            <div class="justify-content-between align-items-center">
                                                <h6 class="text-white mb-0">Charlie Watson
                                                    <span class="badge badge-success"></span>
                                                </h6>
                                                <p class="text-white mb-0 text-sm">Typing...</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:;" class="d-block p-2">
                                    <div class="d-flex p-2">
                                        <img alt="Image" src="../../assets/img/team-1.jpg" class="avatar shadow">
                                        <div class="ms-3">
                                            <h6 class="mb-0">Jane Doe</h6>
                                            <p class="text-muted text-xs mb-2">1 hour ago</p>
                                            <span class="text-muted text-sm col-11 p-0 text-truncate d-block">Computer
                                                users and programmers</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:;" class="d-block p-2">
                                    <div class="d-flex p-2">
                                        <img alt="Image" src="../../assets/img/team-3.jpg" class="avatar shadow">
                                        <div class="ms-3">
                                            <h6 class="mb-0">Mila Skylar</h6>
                                            <p class="text-muted text-xs mb-2">24 min ago</p>
                                            <span class="text-muted text-sm col-11 p-0 text-truncate d-block">You can
                                                subscribe to receive weekly...</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:;" class="d-block p-2">
                                    <div class="d-flex p-2">
                                        <img alt="Image" src="../../assets/img/team-5.jpg" class="avatar shadow">
                                        <div class="ms-3">
                                            <h6 class="mb-0">Sofia Scarlett</h6>
                                            <p class="text-muted text-xs mb-2">7 hours ago</p>
                                            <span class="text-muted text-sm col-11 p-0 text-truncate d-block">It’s an
                                                effective resource regardless..</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:;" class="d-block p-2">
                                    <div class="d-flex p-2">
                                        <img alt="Image" src="../../assets/img/team-4.jpg" class="avatar shadow">
                                        <div class="ms-3">
                                            <div class="justify-content-between align-items-center">
                                                <h6 class="mb-0">Tom Klein</h6>
                                                <p class="text-muted text-xs mb-2">1 day ago</p>
                                            </div>
                                            <span class="text-muted text-sm col-11 p-0 text-truncate d-block">Be sure to
                                                check it out if your dev pro...</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card blur shadow-blur max-height-vh-70">
                            <div class="card-header shadow-lg">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="d-flex align-items-center">
                                            <img alt="Image" src="../../assets/img/team-2.jpg" class="avatar">
                                            <div class="ms-3">
                                                <h6 class="mb-0 d-block">Charlie Watson</h6>
                                                <span class="text-sm text-dark opacity-8">last seen today at 1:53am</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1 my-auto pe-0">
                                        <button class="btn btn-icon-only shadow-none text-dark mb-0 me-3 me-sm-0"
                                            type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="" data-bs-original-title="Video call">
                                            <i class="ni ni-camera-compact"></i>
                                        </button>
                                    </div>
                                    <div class="col-1 my-auto ps-0">
                                        <div class="dropdown">
                                            <button class="btn btn-icon-only shadow-none text-dark mb-0" type="button"
                                                data-bs-toggle="dropdown">
                                                <i class="ni ni-settings"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end me-sm-n2 p-2"
                                                aria-labelledby="chatmsg">
                                                <li>
                                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                                        Profile
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                                        Mute conversation
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                                        Block
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                                        Clear chat
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-radius-md text-danger"
                                                        href="javascript:;">
                                                        Delete chat
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card-body overflow-auto overflow-x-hidden">
                                <div class="row justify-content-start mb-4">
                                    <div class="col-auto">
                                        <div class="card ">
                                            <div class="card-body py-2 px-3">
                                                <p class="mb-1">
                                                    It contains a lot of good lessons about effective practices
                                                </p>
                                                <div class="d-flex align-items-center text-sm opacity-6">
                                                    <i class="ni ni-check-bold text-sm me-1"></i>
                                                    <small>3:14am</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end text-right mb-4">
                                    <div class="col-auto">
                                        <div class="card bg-gray-200">
                                            <div class="card-body py-2 px-3">
                                                <p class="mb-1">
                                                    Can it generate daily design links that include essays and data
                                                    visualizations ?<br>
                                                </p>
                                                <div
                                                    class="d-flex align-items-center justify-content-end text-sm opacity-6">
                                                    <i class="ni ni-check-bold text-sm me-1"></i>
                                                    <small>4:42pm</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12 text-center">
                                        <span class="badge text-dark">Wed, 3:27pm</span>
                                    </div>
                                </div>
                                <div class="row justify-content-start mb-4">
                                    <div class="col-auto">
                                        <div class="card ">
                                            <div class="card-body py-2 px-3">
                                                <p class="mb-1">
                                                    Yeah! Responsive Design is geared towards those trying to build web apps
                                                </p>
                                                <div class="d-flex align-items-center text-sm opacity-6">
                                                    <i class="ni ni-check-bold text-sm me-1"></i>
                                                    <small>4:31pm</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end text-right mb-4">
                                    <div class="col-auto">
                                        <div class="card bg-gray-200">
                                            <div class="card-body py-2 px-3">
                                                <p class="mb-1">
                                                    Excellent, I want it now !
                                                </p>
                                                <div
                                                    class="d-flex align-items-center justify-content-end text-sm opacity-6">
                                                    <i class="ni ni-check-bold text-sm me-1"></i>
                                                    <small>4:42pm</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-start mb-4">
                                    <div class="col-auto">
                                        <div class="card ">
                                            <div class="card-body py-2 px-3">
                                                <p class="mb-1">
                                                    You can easily get it; The content here is all free
                                                </p>
                                                <div class="d-flex align-items-center text-sm opacity-6">
                                                    <i class="ni ni-check-bold text-sm me-1"></i>
                                                    <small>4:42pm</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end text-right mb-4">
                                    <div class="col-auto">
                                        <div class="card bg-gray-200">
                                            <div class="card-body py-2 px-3">
                                                <p class="mb-1">
                                                    Awesome, blog is important source material for anyone who creates apps?
                                                    <br>
                                                    Beacuse these blogs offer a lot of information about website
                                                    development.
                                                </p>
                                                <div
                                                    class="d-flex align-items-center justify-content-end text-sm opacity-6">
                                                    <i class="ni ni-check-bold text-sm me-1"></i>
                                                    <small>4:42pm</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-start mb-4">
                                    <div class="col-5">
                                        <div class="card ">
                                            <div class="card-body p-2">
                                                <div class="col-12 p-0">
                                                    <img src="https://images.unsplash.com/photo-1602142946018-34606aa83259?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1762&amp;q=80"
                                                        alt="Rounded image" class="img-fluid mb-2 border-radius-lg">
                                                </div>
                                                <div class="d-flex align-items-center text-sm opacity-6">
                                                    <i class="ni ni-check-bold text-sm me-1"></i>
                                                    <small>4:47pm</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end text-right mb-4">
                                    <div class="col-auto">
                                        <div class="card bg-gray-200">
                                            <div class="card-body py-2 px-3">
                                                <p class="mb-0">
                                                    At the end of the day … the native dev apps is where users are
                                                </p>
                                                <div
                                                    class="d-flex align-items-center justify-content-end text-sm opacity-6">
                                                    <i class="ni ni-check-bold text-sm me-1"></i>
                                                    <small>4:42pm</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-start">
                                    <div class="col-auto">
                                        <div class="card ">
                                            <div class="card-body py-2 px-3">
                                                <p class="mb-0">
                                                    Charlie is Typing...
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            @if(Illuminate\Support\Facades\Auth::user()->role == 'tenant')
                            <div class="card-body overflow-auto overflow-x-hidden">
                                <div class="row justify-content-end text-right mb-4">
                                    <div class="col-auto">
                                        <div class="card bg-gray-200">
                                            <div class="card-body py-2 px-3">
                                                <p class="mb-0">
                                                    <div id="chat-window">
                                                    </div>
                                                </p>
                                                <div
                                                    class="d-flex align-items-center justify-content-end text-sm opacity-6">
                                                    <i class="ni ni-check-bold text-sm me-1"></i>
                                                    <small>4:42pm</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @elseif(Illuminate\Support\Facades\Auth::user()->role_id_fk == 3)
                            @endif
                            <div class="card-footer d-block">
                                <form class="align-items-center">
                                    <div class="d-flex">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Type here"
                                                aria-label="Message example input" onfocus="focused(this)"
                                                onfocusout="defocused(this)">
                                        </div>
                                        <button class="btn bg-gradient-primary mb-0 ms-2">
                                            <i class="ni ni-send"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="footer pt-3  ">
                    <div class="container-fluid">
                        <div class="row align-items-center justify-content-lg-between">
                            <div class="col-lg-6 mb-lg-0 mb-4">
                                <div class="copyright text-center text-sm text-muted text-lg-start">
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script>2023,
                                    made with <i class="fa fa-heart" aria-hidden="true"></i> by
                                    <a href="https://www.creative-tim.com" class="font-weight-bold"
                                        target="_blank">Creative Tim</a>
                                    for a better web.
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                            target="_blank">Creative Tim</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                            target="_blank">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                            target="_blank">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                            target="_blank">License</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <div class="ps__rail-x" style="left: 0px; bottom: -176px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 176px; height: 959px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 149px; height: 810px;"></div>
            </div>

    </main>
     <!--====== Javascripts & Jquery ======-->
     <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
     <script src="{{ asset('js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
     <script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
     <script src="{{ asset('js/magnific-popup.min.js') }}"></script>
     <script src="{{ asset('js/main.js') }}"></script>
     <!-- smodel script -->
     <script>
        var username = "{{ \Illuminate\Support\Facades\Auth::id() }}";

        function clickX() {
            sendMessage();
        }


        function sendMessage() {
            var dt = new Date();
            var time = dt.toLocaleString('en-US', {
                hour: 'numeric',
                minute: 'numeric',
                hour12: true
            })
            var month = dt.toLocaleString("en-us", {
                month: "long"
            });
            var date = dt.getDate() + " " + month;
            var msg = $('#msg').val();
            $('#msg').val('');
            if (msg != "") {

                $('#chat-window').append(
                    
                    msg 

                );


            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('sendmessage') }}",
                data: {
                    id1: username,
                    id2: {{ $id }},
                    message: msg,
                },
                success: function(data) {
                    // notTyping();
                    console.log(data);
                },
            });
        }

        function retrieveUnSeenChatMessages() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('readunseenmessage') }}",
                data: {
                    id1: username,
                    id2: {{ $id }}
                },
                success: function(data) {
                    console.log(data);
                    if (data.length > 0) {
                        for (var i = 0; i < data[0].length; i++) {
                            if (username == data[1][i]) {
                                // '+time+'    |    '+date+'

                                $('#chat-window').append(
                                    '<div class="Area"> <div class="R"><a href="https://twitter.com/MariamMassadeh"><img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSxU35znsBhAWQd5BouLIVtH1P4WNa0JZ_XXpyViHOIARbM2igbNgC6_kp5"/><div class="tooltip">Mariam Massadeh - 23 Years<br/>Computer Engineer<br/>Jordan</div></a></div><div class="text L textL">' +
                                    data[0][i] + '<span style="float:right;">' + data[1][i] + '    |    ' +
                                    data[2][i] + '</span></div></div>');
                            } else {
                                $('#chat-window').append(
                                    '<div class="Area"><div class="L"><a href="https://twitter.com/SamiMassadeh"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrEyVlaWx0_FK_sz86j-CnUC_pfEqw_Xq_xZUm5CMIyEI_-X2hRUpx1BHL"/><div class="tooltip">Sami Massadeh - 28 Years<br/>Doctor <br/>Jordan</div></a></div><div class="text R textR">' +
                                    data[0][i] + '  <span style="float:right;">' + data[1][i] +
                                    '    |    ' + data[2][i] + '</span></div></div>');

                            }

                        }
                        var messageBody = document.querySelector('#chat-window');
                        messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
                    }
                },
            });
        }

        function retrieveChatMessages(numberofmessages) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('readusermessage') }}",
                data: {
                    id1: username,
                    id2: {{ $id }},
                    numberofmessages: numberofmessages
                },
                success: function(data) {

                    console.log("Data is This " + data);
                    $('#chat-window').empty();
                    if (data.length > 0) {
                        for (var i = 0; i < data[0].length; i++) {
                            if (username == data[1][i]) {
                                $('#chat-window').append(
                                    '<div class="Area"> <div class="R"><a href="https://twitter.com/MariamMassadeh"><img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSxU35znsBhAWQd5BouLIVtH1P4WNa0JZ_XXpyViHOIARbM2igbNgC6_kp5"/><div class="tooltip">Mariam Massadeh - 23 Years<br/>Computer Engineer<br/>Jordan</div></a></div><div class="text L textL">' +
                                    data[0][i] + '<span style="float:right;">' + data[2][i] + '    |    ' +
                                    data[3][i] + '</span></div></div>');

                            } else {
                                $('#chat-window').append(
                                    '<div class="Area"><div class="L"><a href="https://twitter.com/SamiMassadeh"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrEyVlaWx0_FK_sz86j-CnUC_pfEqw_Xq_xZUm5CMIyEI_-X2hRUpx1BHL"/><div class="tooltip">Sami Massadeh - 28 Years<br/>Doctor <br/>Jordan</div></a></div><div class="text R textR">' +
                                    data[0][i] + '  <span style="float:right;">' + data[2][i] +
                                    '    |    ' + data[3][i] + '</span></div></div>');

                            }

                        }
                    }
                },
            });
        }

        retrieveChatMessages(1000);
        pullData();

        function pullData() {
            retrieveUnSeenChatMessages();
            setTimeout(pullData, 3000);
            console.log("This is in Pull Data");
        }
    </script>

    @include('partials.footer')
@endsection
