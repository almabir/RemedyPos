@extends('dashboard.body.main')

@section('specificpagescripts')
<script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endsection

@section('content')
<!-- BEGIN: Header -->
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="fa-solid fa-users"></i></div>
                        Company Details: <span style="color:yellow;">{{ $company->company ?? '' }} </span>
                    </h1>
                    <span style="font-size:24px; padding-left:60px;"> {{ $company->address ?? '' }} </span>
                </div>
            </div>

            <nav class="mt-4 rounded" aria-label="breadcrumb">
                <ol class="breadcrumb px-3 py-2 rounded mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('settings') }}">Company Details</a></li>
                </ol>
            </nav>
        </div>
    </div>
</header>
<!-- END: Header -->

<!-- BEGIN: Main Page Content -->
<div class="container-xl px-2 mt-n10">
    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Company Logo</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image -->
                        <img class="img-account-profile rounded-circle mb-2" src="{{ asset('/images') }}/{{ $company->logo ?? '' }}" alt="" id="image-preview" />
                        
                        <!-- Profile picture help block -->
                        <div class="small font-italic text-muted mb-2">JPG or PNG no larger than 1 MB</div>
                        <!-- Profile picture input -->
                        <input class="form-control form-control-solid mb-2 @error('logo') is-invalid @enderror" type="file"  id="image" name="logo" accept="image/*" onchange="previewImage();" >
                        @error('logo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <!-- BEGIN: User Details -->
                <div class="card mb-4">
                    <div class="card-header">
                        Company Details
                    </div>
                    <div class="card-body">
                        <!-- Form Group (name) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="name">Company Name <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid" id="name" name="company" type="text" placeholder="" value="{{ $company->company ?? '' }}" />
                        </div>
                         <!-- Form Group (Propitor) -->
                         <div class="mb-3">
                            <label class="small mb-1" for="name">Propitor Name <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid" id="name" name="propitor" type="text" placeholder="" value="{{ $company->propitor ?? '' }}" />
                        </div>
                        <!-- Form Group (Address) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="name">Address <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid" id="name" name="address" type="text" placeholder="" value="{{ $company->address ?? ''}}" />
                        </div>
                        <!-- Form Group (email address) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="email">Email address <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid" id="email" name="email" type="text" placeholder="" value="{{ $company->email ?? '' }}" />
                        </div>
                        <!-- Form Group (Mobile) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="username">Mobile <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid" id="username" name="mobile" type="text" placeholder="" value="{{ $company->mobile ?? ''}}" />
                        </div>
                        <!-- Form Group (Website) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="username">Website <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid" id="username" name="website" type="text" placeholder="" value="{{ $company->website ?? ''}}" />
                        </div>

                        <!-- Submit button -->
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
                <!-- END: User Details -->
            </div>
        </div>
    </form>
</div>
<!-- END: Main Page Content -->
@endsection
