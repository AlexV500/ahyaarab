@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two custom-data-table">
                            <thead>
                            <tr>
                                <th width="20%">@lang('Title')</th>
                                <th width="20%">@lang('Slug')</th>
                                <th width="20%">@lang('Price')</th>
                                <th width="10%" colspan="3" class="text-center">@lang('Position')</th>
                                <th width="30%">@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($products as $k => $data)
                                <tr>
                                    <td>{{ __($data->title) }}</td>
                                    <td>{{ __($data->slug) }}</td>
                                    <td>{{ $data->price }}</td>
                                    <td>{{ __($data->position)}}</td>
                                    <td class="text-center"><a href="{{route('admin.catalog.product.positionUp', $data->id)}}" title="@lang('Position Up')" class="text-info"><i class="fa-solid fa-up-long"></i></a></td>
                                    <td class="text-center"><a href="{{route('admin.catalog.product.positionDown', $data->id)}}" title="@lang('Position Down')"><i class="fa-solid fa-down-long"></i></a></td>
                                    <td>
                                        <div class="button--group">
                                            <a href="{{ route('admin.catalog.product.edit', $data->id) }}" class="btn btn-sm btn-outline--primary"><i class="la la-pen"></i> @lang('Edit')</a>
                                            @if ($data->is_default == Status::NO)
                                                <button class="btn btn-sm btn-outline--danger confirmationBtn"
                                                        data-action="{{ route('admin.catalog.product.delete', $data->id) }}"
                                                        data-question="@lang('Are you sure to remove this page?')">
                                                    <i class="las la-trash"></i> @lang('Delete')
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
            </div><!-- card end -->
        </div>
    </div>
@endsection
<x-confirmation-modal/>
@push('breadcrumb-plugins')
    <a class="btn btn-outline--primary" href="{{ route('admin.catalog.product.create') }}"><i class="las la-plus"></i>@lang('Add New')</a>
@endpush
