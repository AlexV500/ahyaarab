
@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-3 col-lg-4 mb-30">

            <div class="card b-radius--5 overflow-hidden">
                <div class="card-body p-0">
                    <div class="d-flex p-3 bg--primary align-items-center">
                        <div class="avatar avatar--lg">
                            <img src="{{ getImage(getFilePath('adminProfile') . '/' . $otherAdmin->image, getFileSize('adminProfile')) }}"
                                alt="@lang('Image')">
                        </div>
                        <div class="ps-3">
                            <h4 class="text--white">{{ __($otherAdmin->name) }}</h4>
                        </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Name')
                            <span class="fw-bold">{{ __($otherAdmin->name) }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Username')
                            <span class="fw-bold">{{ __($otherAdmin->username) }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Email')
                            <span class="fw-bold">{{ $otherAdmin->email }}</span>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-8 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 border-bottom pb-2">@lang('Profile Information')</h5>

                    <form action="{{ route('admin.otherprofile.update', $otherAdmin->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="adm_id" value="{{ $otherAdmin->id }}">
                            <div class="col-xxl-8 col-lg-6">
                                <div class="form-group ">
                                    <label>@lang('Name')</label>
                                    <input class="form-control" type="text" name="name" value="{{ $otherAdmin->name }}"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>@lang('Email')</label>
                                    <input class="form-control" type="email" name="email" value="{{ $otherAdmin->email }}"
                                           required>
                                </div>
                            </div>

                            <div class="form-group col-xl-3 col-md- col-12">
                                <label>@lang('Super Admin') </label>
                                <input class="form-control" type="text" name="superadmin" value="{{ $otherAdmin->superadmin }}"
                                       required>

                            </div>
                        </div>
                        <button type="submit" class="btn btn--primary h-45 w-100">@lang('Submit')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('admin.password') }}" class="btn btn-sm btn-outline--primary"><i
            class="las la-key"></i>@lang('Password Setting')</a>
@endpush
