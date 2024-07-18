@extends('admin.layouts.app')
@section('panel')
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.catalog.property.update', $property->id) }}" method="POST" class="disableSubmission">
                        @csrf
                        @method('PATCH')
                        <div class="row">

                            <div class="col-xl-8 mt-xl-0 mt-4">
                                <div class="form-group">
                                    <label>@lang('Title') </label>
                                    <input type="text" name="title" class="form-control" value="{{ @$property->title }}">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn--primary w-100 h-45">@lang('Submit')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a class="btn btn-outline--primary" href="{{ route('admin.catalog.property.create') }}"><i class="las la-plus"></i>@lang('Add New')</a>
@endpush
