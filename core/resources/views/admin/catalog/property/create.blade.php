@extends('admin.layouts.app')
@section('panel')
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.catalog.property.store') }}" method="POST" class="disableSubmission">
                        @csrf
                        <div class="row">

                            <div class="col-xl-8 mt-xl-0 mt-4">
                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label> @lang('Title')</label>
                                    </div>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
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
@push('script')
    <script>
        (function($) {
            "use strict";

            $('.addBtn').on('click', function() {
                var modal = $('#addModal');
                modal.find('input[name=id]').val($(this).data('id'))
                modal.modal('show');
            });

            $('.buildSlug').on('click', function() {
                let closestForm = $(this).closest('form');
                let title = closestForm.find('[name=title]').val();
                closestForm.find('[name=slug]').val(title);
                closestForm.find('[name=slug]').trigger('input');
            });

            $('[name=slug]').on('input', function() {
                let closestForm = $(this).closest('form');
                closestForm.find('[type=submit]').addClass('disabled')
                let slug = $(this).val();
                slug = slug.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                $(this).val(slug);
                if (slug) {
                    $('.slug-verification').removeClass('d-none');
                    $('.slug-verification').html(`
                        <small class="text--info"><i class="las la-spinner la-spin"></i> @lang('Verifying')</small>
                    `);
                    $.get("{{ route('admin.catalog.base.check.slug') }}", {
                        slug: slug
                    }, function(response) {
                        if (!response.exists) {
                            $('.slug-verification').html(`
                                <small class="text--success"><i class="las la-check"></i> @lang('Verified')</small>
                            `);
                            closestForm.find('[type=submit]').removeClass('disabled')
                        }
                        if (response.exists) {
                            $('.slug-verification').html(`
                                <small class="text--danger"><i class="las la-times"></i> @lang('Slug already exists')</small>
                            `);
                        }
                    });
                } else {
                    $('.slug-verification').addClass('d-none');
                }
            })

        })(jQuery);
    </script>
@endpush
