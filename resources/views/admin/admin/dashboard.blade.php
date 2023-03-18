<!-- Admin Dashboard -->
@extends('admin.main')

@push('title')
    Admin Dashboard
@endpush
@section('main-section')

    <div class="row">
        <div class="col-md-12 grid-margin">
            @include('inc.fail')
            @include('inc.success')
            @include('inc.warning')
            <div class="me-md-3 me-xl-5">
                <h2>Welcome! {{ Session::get('adminname') }},</h2>
            </div>
            <hr>

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <h5 class="mx-5 my-3">Order analytics</h5>
                        <div class="card-header">
                            <div class="row">

                                <div class="col-md-3">
                                    <a href="{{ route('adminindexorders') }}" class="text-white text-decoration-none">
                                        <div class="card-body bg-success text-white text-center mb-1">
                                            <label class="mb-3">
                                                Total Orders
                                            </label>
                                            <br>
                                            <h1>
                                                {{ $totalorders }}
                                            </h1>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('deliveredorders') }}" class="text-white text-decoration-none">
                                        <div class="card-body bg-primary text-white text-center mb-1">
                                            <label class="mb-3">
                                                Delivered Orders
                                            </label>
                                            <br>
                                            <h1>
                                                {{ $deliveredorders }}
                                            </h1>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('confirmedorders') }}" class="text-white text-decoration-none">
                                        <div class="card-body bg-secondary text-white text-center mb-1">
                                            <label class="mb-3">
                                                Confirmed Orders
                                            </label>
                                            <br>
                                            <h1>
                                                {{ $confirmedorders }}
                                            </h1>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('pendingorders') }}" class="text-white text-decoration-none">
                                        <div class="card-body bg-warning text-white text-center mb-1">
                                            <label class="mb-3">
                                                Pending Orders
                                            </label>
                                            <br>
                                            <h1>
                                                {{ $pendingorders }}
                                            </h1>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <h5 class="mx-5 my-3">Product analytics</h5>
                        <div class="card-header">
                            <div class="row">

                                <div class="col-md-6">
                                    <a href="{{ route('indexproduct') }}" class="text-white text-decoration-none">
                                        <div class="card-body bg-success text-white text-center mb-1">
                                            <label class="mb-3">
                                                Total Products
                                            </label>
                                            <br>
                                            <h1>
                                                {{ $totalproducts }}
                                            </h1>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-6">
                                    <a href="{{ route('activeproducts') }}" class="text-white text-decoration-none">
                                        <div class="card-body bg-primary text-white text-center mb-1">
                                            <label class="mb-3">
                                                Active Products
                                            </label>
                                            <br>
                                            <h1>
                                                {{ $activeproducts }}
                                            </h1>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <h5 class="mx-5 my-3">Category analytics</h5>
                        <div class="card-header">
                            <div class="row">

                                <div class="col-md-6">
                                    <a href="{{ route('indexcategory') }}" class="text-white text-decoration-none">
                                        <div class="card-body bg-success text-white text-center mb-1">
                                            <label class="mb-3">
                                                Total Categories
                                            </label>
                                            <br>
                                            <h1>
                                                {{ $totalcategories }}
                                            </h1>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-6">
                                    <a href="{{ route('activecategory') }}" class="text-white text-decoration-none">
                                        <div class="card-body bg-primary text-white text-center mb-1">
                                            <label class="mb-3">
                                                Active Categories
                                            </label>
                                            <br>
                                            <h1>
                                                {{ $activecategories }}
                                            </h1>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <h5 class="mx-5 my-3">Sub Category analytics</h5>
                        <div class="card-header">
                            <div class="row">

                                <div class="col-md-6">
                                    <a href="{{ route('indexsubcategory') }}" class="text-white text-decoration-none">
                                        <div class="card-body bg-success text-white text-center mb-1">
                                            <label class="mb-3">
                                                Total Sub Categories
                                            </label>
                                            <br>
                                            <h1>
                                                {{ $totalsubcategories }}
                                            </h1>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-6">
                                    <a href="{{ route('activesubcategory') }}" class="text-white text-decoration-none">
                                        <div class="card-body bg-primary text-white text-center mb-1">
                                            <label class="mb-3">
                                                Active Sub Categories
                                            </label>
                                            <br>
                                            <h1>
                                                {{ $activesubcategories }}
                                            </h1>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <h5 class="mx-5 my-3">User analytics</h5>
                        <div class="card-header">
                            <div class="row">

                                <div class="col-md-6">
                                    <a href="{{ route('adminindex') }}" class="text-white text-decoration-none">
                                        <div class="card-body bg-success text-white text-center mb-1">
                                            <label class="mb-3">
                                                Total Admins
                                            </label>
                                            <br>
                                            <h1>
                                                {{ $totaladmins }}
                                            </h1>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-6">
                                    <a href="{{ route('customerindex') }}" class="text-white text-decoration-none">
                                        <div class="card-body bg-primary text-white text-center mb-1">
                                            <label class="mb-3">
                                                Total Customers
                                            </label>
                                            <br>
                                            <h1>
                                                {{ $totalcustomers }}
                                            </h1>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    @if ($productslow->count() > 0)
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            @foreach ($productslow as $product)
                <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="{{ asset($product->productImages[0]->image) }}" class="rounded me-2" width="20"
                            height="20" alt="product image">

                        <strong class="me-auto">{{ $product->name }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Quantity of <strong class="text-danger">{{ $product->name }}</strong> is less than <strong
                            class="text-danger">20</strong> pieces.
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection
