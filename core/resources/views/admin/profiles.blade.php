@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--md table-responsive">
                        <table class="table--light style--two table">
                            <thead>
                            <tr>
                                <th>@lang('Name')</th>
                                <th>@lang('Username')</th>
                                <th>@lang('Email')</th>
                                <th>@lang('Joined At')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($administrators as $user)
                                <tr>
                                    <td>
                                        <span class="fw-bold">{{ $user->name }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $user->username }}</span>
                                    </td>

                                    <td>
                                        {{ $user->email }}
                                    </td>

                                    <td>
                                        {{ showDateTime($user->created_at) }} <br> {{ diffForHumans($user->created_at) }}
                                    </td>

                                    <td>
                                        @if ($user->superadmin == 1)
                                            Super Admin
                                        @endif
                                        @if ($user->superadmin == 0)
                                            Admin
                                        @endif
                                    </td>

                                    <td>
                                        <div class="button--group">
                                            <a class="btn btn-sm btn-outline--primary" href="{{ route('admin.otherprofile', $user->id) }}">
                                                <i class="las la-desktop"></i> @lang('Details')
                                            </a>
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
                @if ($administrators->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($administrators) }}
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('admin.addprofile') }}" class="btn btn-sm btn-outline--primary"><i
            class="las la-key"></i>@lang('Add Admin Profile')</a>
@endpush
