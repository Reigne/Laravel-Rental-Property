@extends('layouts.base')
@section('body')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('partials.navbar')
        <hr class="horizontal dark mt-0">
        <div class="container-fluid py-4">
            <div class="row">
                @foreach ($properties as $property)
                    <div class="col-md-4">
                        <div class="card card-blog card-plain">
                            <div class="position-relative">
                                <a class="d-block blur-shadow-image">
                                    <img src="{{ asset($property->imagePath) }}" class="img-fluid shadow border-radius-lg">
                                </a>
                            </div>
                            <div class="card-body px-1 pt-3">
                                <p class="text-gradient text-primary mb-2 text-sm">{{ $property->area }} • {{ $property->bedroom }} Bedroom • {{ $property->bathroom }} Bathroom • {{ $property->garage }} Garage</p>
                                <a href="javascript:;">
                                    <h5>
                                        {{ $property->city }}, {{ $property->state }}
                                    </h5>
                                </a>
                                <p>
                                  {{ $property->description }}
                                </p>
                                <button type="button" class="btn btn-outline-primary btn-sm">Price: ₱{{ number_format($property->rent, 2, '.', ',') }}</button>
                            </div>
                        </div>
                    </div>
                @endforeach

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
    </main>
@endsection
