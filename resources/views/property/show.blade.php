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

        <div class="container-fluid pt-3">
            <div class="row mt-4 removable">
                @foreach ($property as $property)
                    <div class="col-lg-8 col-md-6">
                        <div class="card">
                            <div class="card-header d-flex align-items-center border-bottom py-3">
                                <div class="d-flex align-items-center">
                                    <a href="javascript:;">
                                        <img src="{{ asset($property->landlords->imagePath) }}" class="avatar"
                                            alt="profile-image">
                                    </a>
                                    <div class="mx-3">
                                        <a href="javascript:;"
                                            class="text-dark font-weight-600 text-sm">{{ $property->landlords->first_name }}
                                            {{ $property->landlords->last_name }}</a>
                                        <small
                                            class="d-block text-muted">{{ $property->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                                <div class="text-end ms-auto">
                                    <button type="button" class="btn bg-gradient-primary mb-0">
                                        <i class="fa-solid fa-comment"></i> Chat
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="heading-small text-muted">About property</h6>
                                <p> {{ $property->description }} </p>
                                <img alt="Image placeholder" src="{{ asset($property->imagePath) }}"
                                    class="img-fluid border-radius-lg shadow-lg">
                                <div class="row align-items-center px-2 mt-4 mb-2">
                                    <div class="col-sm-6">
                                        <div class="d-flex">
                                            <div class="d-flex align-items-center">
                                                <i class="ni ni-like-2 me-1 cursor-pointer"></i>
                                                <span class="text-sm me-3 ">150</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <i class="ni ni-chat-round me-1 cursor-pointer"></i>
                                                <span class="text-sm me-3">36</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <i class="ni ni-curved-next me-1 cursor-pointer"></i>
                                                <span class="text-sm me-2">12</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 d-none d-sm-block">
                                        <div class="d-flex align-items-center justify-content-sm-end">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-toggle="tooltip" data-original-title="Jessica Rowland">
                                                    <img alt="Image placeholder" src="../../../assets/img/team-5.jpg"
                                                        class="">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-toggle="tooltip" data-original-title="Audrey Love">
                                                    <img alt="Image placeholder" src="../../../assets/img/team-2.jpg"
                                                        class="rounded-circle">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-toggle="tooltip" data-original-title="Michael Lewis">
                                                    <img alt="Image placeholder" src="../../../assets/img/team-1.jpg"
                                                        class="rounded-circle">
                                                </a>
                                            </div>
                                            <small class="ps-2 font-weight-bold">and 30+ more</small>
                                        </div>
                                    </div>
                                    <hr class="horizontal dark my-3">
                                </div>

                                <div class="mb-1">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <img alt="Image placeholder" class="avatar rounded-circle"
                                                src="../../../assets/img/bruce-mars.jpg">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="h5 mt-0">Michael Lewis</h6>
                                            <p class="text-sm">I always felt like I could do anything. That’s the main thing
                                                people are controlled by! Thoughts- their perception of themselves!</p>
                                            <div class="d-flex">
                                                <div>
                                                    <i class="ni ni-like-2 me-1 cursor-pointer"></i>
                                                </div>
                                                <span class="text-sm me-2">3 likes</span>
                                                <div>
                                                    <i class="ni ni-curved-next me-1 cursor-pointer"></i>
                                                </div>
                                                <span class="text-sm me-2">2 shares</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-3">
                                        <div class="flex-shrink-0">
                                            <img alt="Image placeholder" class="avatar rounded-circle"
                                                src="../../../assets/img/team-5.jpg">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="h5 mt-0">Jessica Stones</h6>
                                            <p class="text-sm">Society has put up so many boundaries, so many limitations on
                                                what’s right and wrong that it’s almost impossible to get a pure thought
                                                out.
                                                It’s like a little kid, a little boy.</p>
                                            <div class="d-flex">
                                                <div>
                                                    <i class="ni ni-like-2 me-1 cursor-pointer"></i>
                                                </div>
                                                <span class="text-sm me-2">10 likes</span>
                                                <div>
                                                    <i class="ni ni-curved-next me-1 cursor-pointer"></i>
                                                </div>
                                                <span class="text-sm me-2">1 share</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-4">
                                        <div class="flex-shrink-0">
                                            <img alt="Image placeholder" class="avatar rounded-circle me-3"
                                                src="../../../assets/img/team-4.jpg">
                                        </div>
                                        <div class="flex-grow-1 my-auto">
                                            <form>
                                                <textarea class="form-control" placeholder="Write your comment" rows="1"></textarea>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">

                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h6 class="mb-0">Transaction </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form>
                                    <h6 class="heading-small text-muted mb-4">Landlord information</h6>
                                    <div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-first-name">First
                                                        name</label>
                                                    <input type="text" id="input-first-name" class="form-control"
                                                        value="{{ $property->landlords->first_name }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-last-name">Last
                                                        name</label>
                                                    <input type="text" id="input-last-name" class="form-control"
                                                        value="{{ $property->landlords->last_name }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email address</label>
                                            <input type="email" id="input-email" class="form-control" value="{{ $user->email }} " readonly>
                                        </div>
                                    </div>
                                </div> --}}
                                    <hr class="horizontal dark my-4">
                                    <!-- Address -->
                                    <h6 class="heading-small text-muted mb-4">Property information</h6>
                                    <div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-address">Address</label>
                                                    <input id="input-address" class="form-control"
                                                        placeholder="Home Address" value="{{ $property->address }}"
                                                        type="text" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-city">City</label>
                                                    <input type="text" id="input-city" class="form-control"
                                                        placeholder="City" value="{{ $property->city }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-country">State</label>
                                                    <input type="text" id="input-country" class="form-control"
                                                        placeholder="Country" value="{{ $property->state }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-city">Area</label>
                                                    <input type="text" id="input-city" class="form-control"
                                                        placeholder="City" value="{{ $property->area }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-country">Bedroom</label>
                                                    <input type="text" id="input-country" class="form-control"
                                                        placeholder="Country" value="{{ $property->bedroom }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-country">Bathroom</label>
                                                    <input type="text" id="input-country" class="form-control"
                                                        placeholder="Country" value="{{ $property->bathroom }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="horizontal dark my-4">
                                    <!-- Description -->
                                    <h6 class="heading-small text-muted mb-4">Total ammount</h6>
                                    <div>
                                        <li class="d-flex">
                                            <p class="mb-0">Tax:</p>
                                            <p class="ms-auto"> ₱ 0.00</p>
                                        </li>
                                        <li class="d-flex">
                                            <p class="mb-0">Price:</p>
                                            <p class="ms-auto"> ₱ {{ number_format($property->rent, 2, '.', ',') }}</p>
                                        </li>
                                        <li class="d-flex">
                                            {{-- <p class="mb-0">Price:</p> --}}
                                            <p class="ms-auto"> <strong> Total</strong>: ₱ {{ number_format($property->rent, 2, '.', ',') }}</p>
                                        </li>
                                    </div>

                                    <hr class="horizontal dark">
                                    <div class="text-center">
                                        <a type="submit" href="{{ route('showTransaction',$property->id) }}" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Rent now</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @include('partials.footer')
    </main>
@endsection
