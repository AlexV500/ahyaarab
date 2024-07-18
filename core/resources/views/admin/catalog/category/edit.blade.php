@extends('admin.layouts.app')
@section('panel')
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.catalog.category.update', $category->id) }}" method="POST" class="disableSubmission" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="form-group">
                                    <label>@lang('Category Image')</label>
                                    <x-image-uploader class="w-100" :imagePath="$imagePath" :size="$imageSize" :required="false" />
                                </div>
                            </div>

                            <div class="col-xl-8 mt-xl-0 mt-4">
                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label> @lang('Title')</label>
                                        <a href="javascript:void(0)" class="buildSlug"><i class="las la-link"></i> @lang('Make Slug')</a>
                                    </div>
                                    <input type="text" name="title" class="form-control" value="{{ @$category->title }}">
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label> @lang('Slug')</label>
                                        <div class="slug-verification d-none"></div>
                                    </div>
                                    <input type="text" class="form-control" name="slug" value="{{ @$category->slug }}" required>
                                </div>
                                <div class="form-group">
                                    <label>@lang('Meta Keywords')</label>
                                    <textarea name="meta_keywords" rows="3" class="form-control">{{ @$category->meta_keywords }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>@lang('Meta Description')</label>
                                    <textarea name="meta_description" rows="3" class="form-control">{{ @$category->meta_description }}</textarea>
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
    <a class="btn btn-outline--primary" href="{{ route('admin.catalog.category.create') }}"><i class="las la-plus"></i>@lang('Add New')</a>
@endpush

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
