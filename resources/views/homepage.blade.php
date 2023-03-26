@extends('layouts.base')
@section('body')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('partials.navbar')
        <hr class="horizontal dark mt-0">
        <div class="container-fluid py-4">
            <form method="GET" action="{{ route('search_property') }}">
                <div class="card">
                    <div class="m-3 mt-4">
                        <div class="d-flex">
                            {{-- <input type="hidden" name="property_id" value=""> --}}
                                <div class="col">
                                    <input name="rent" class="form-control" type="search" placeholder="Amount">
                                </div>
                                <div class="col">
                                    <input name="city" class="form-control" type="search" placeholder="City">
                                </div>
                                <div class="col">
                                    <select select class="form-control" name="state" id="state">
                                        <option value="">Choose state...</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->state }}">{{ $state->state }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <button class="btn bg-gradient-primary mb-0 ms-2">
                                {{-- <i class="ni ni-send"></i> --}}
                                 Search
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                @foreach ($properties as $property)
                    <div class="col-md-4 mt-4">
                        <div class="card">
                            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                <div class="position-relative">
                                    <a class="d-block blur-shadow-image">
                                        <img src="{{ asset($property->imagePath) }}"
                                            class="img-fluid shadow border-radius-lg">
                                    </a>
                                </div>
                                <div class="card-body px-1 pt-3">
                                    <p class="text-gradient text-primary mb-2 text-sm">{{ $property->area }} sqr •
                                        {{ $property->bedroom }} Bedroom • {{ $property->bathroom }} Bathroom •
                                        {{ $property->garage }} Garage</p>
                                    <a href="javascript:;">
                                        <h5>
                                            {{ $property->city }}, {{ $property->state }}
                                        </h5>
                                    </a>
                                    <p>
                                        {{ Str::limit($property->description, 150, '...') }}
                                    </p>
                                    <a href="{{ route('showProperty', $property->id) }}"
                                        class="btn bg-gradient-primary">Price:
                                        ₱{{ number_format($property->rent, 2, '.', ',') }}</a>
                                    {{-- <button type="button" class="btn btn-outline-primary btn-sm">Chat</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- @foreach ($properties as $property)
                <div class="col-md-4">
                    <div class="card">
                      <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                        <a href="javascript:;" class="d-block blur-shadow-image">
                          <img src="./assets/img/kit/pro/anastasia.jpg" class="img-fluid border-radius-lg">
                        </a>
                      </div>
                
                      <div class="card-body">
                        <div class="w-50 mx-auto">
                          <img src="./assets/img/kit/pro/anastasia.jpg" alt="" class="img-fluid">
                        </div>
                        <p class="card-description mb-5 mt-3">
                          "Use border utilities to quickly style the border and border-radius of an element. Great for images, buttons."
                        </p>
                        <div class="pull-left">
                          <span>―</span>
                          Collin Marcus
                        </div>
                        <a href="javascript:;" class="text-success icon-move-right pull-right">Read More
                          <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach --}}
                {{-- <div class="col-md-4">
                          <div class="card card-blog card-plain">
                            <div class="position-relative">
                              <a class="d-block blur-shadow-image">
                                <img src="https://images.unsplash.com/photo-1523217582562-09d0def993a6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                                alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                              </a>
                            </div>
                        <div class="card-body px-1 pt-3">
                            <p class="text-gradient text-primary mb-2 text-sm">Entire Apartment • 2 Guests • 1 Bed</p>
                            <a href="javascript:;">
                                <h5>
                                    Cozy Double Room Near Station
                                </h5>
                            </a>
                            <p>
                                Different people have different taste, and various types of music have many ways of leaving
                                an impact on someone.
                            </p>
                            <button type="button" class="btn btn-outline-primary btn-sm">From / Night</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-blog card-plain">
                        <div class="position-relative">
                            <a class="d-block blur-shadow-image">
                                <img src="https://images.unsplash.com/photo-1572120360610-d971b9d7767c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                                    alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                            </a>
                        </div>
                        <div class="card-body px-1 pt-3">
                            <p class="text-gradient text-primary mb-2 text-sm">Entire Apartment • 2 Guests • 1 Bed</p>
                            <a href="javascript:;">
                                <h5>
                                    Cozy Double Room Near Station
                                </h5>
                            </a>
                            <p>
                                Different people have different taste, and various types of music have many ways of leaving
                                an impact on someone.
                            </p>
                            <button type="button" class="btn btn-outline-primary btn-sm">From / Night</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-blog card-plain">
                        <div class="position-relative">
                            <a class="d-block blur-shadow-image">
                                <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2075&q=80"
                                    alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                            </a>
                        </div>
                        <div class="card-body px-1 pt-3">
                            <p class="text-gradient text-primary mb-2 text-sm">Entire Apartment • 2 Guests • 1 Bed</p>
                            <a href="javascript:;">
                                <h5>
                                    Cozy Double Room Near Station
                                </h5>
                            </a>
                            <p>
                                Different people have different taste, and various types of music have many ways of leaving
                                an impact on someone.
                            </p>
                            <button type="button" class="btn btn-outline-primary btn-sm">From / Night</button>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>

        @include('partials.footer')
    </main>
@endsection
