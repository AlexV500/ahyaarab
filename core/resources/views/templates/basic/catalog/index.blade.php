
@extends($activeTemplate . 'layouts.frontend')
@section('content')

    <section class="pt-120 pb-120 section--bg">
        <div class="container">
            <div class="row justify-content-center mb-none-30">
                <!-- Sort by -->
                @if($categories)
                    <section class="mt-5 mt-lg-6">
                        <!-- Section heading -->
                        <h2 class="fs-4 fs-lg-1 fw-bold">Категории</h2>
                        <!-- Categories -->
                        <div class="d-grid gap-2 d-md-block mt-4">
                            @each($activeTemplate . 'catalog.category.shared.category', $categories, 'item')
                        </div>
                    </section>
                @endif

                @if($products)
                    <section class="mt-5 mt-lg-6">
                        <!-- Section heading -->
                        <h2 class="fs-4 fs-lg-1 fw-bold">All Plans</h2>
                        <!-- Categories -->
                        <div id="products-area">
                            @each($activeTemplate . 'catalog.product.shared.product-list', $products, 'item')
                        </div>
                    </section>
                @endif

                <!-- Page pagination -->
{{--                <div class="mt-12">--}}
{{--                    {{ $products->withQueryString()->links() }}--}}
{{--                </div>--}}
            </div>
        </div>

    </section>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                <div class="d-flex gap-4">
                    <div class="d-flex flex-column flex-grow-1 gap-2">
                        <div class="d-flex align-items-center">
                            <span class="fw-semibold">Item added to cart</span>
                            <button type="button" class="btn-close btn-close-sm ms-auto" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                        </div>
                        <span><a href="{{ route('cart') }}" class="btn btn-outline-secondary"><i class="las la-cart-plus"></i> @lang('CART') &nbsp;<span class="cart-quantity"> {{cart()->count()}} </span> </a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(function () {

            $("#products-area").on("click", function (event) {

                const target = event.target;
                const className = target.className;
                if (!['las la-cart-plus', 'btn cmn-btn-cart me-2'].includes(className)) {
                    return;
                }

                const idElement = className === 'las la-cart-plus' ? target.parentNode : target;
                const productId = idElement.id.split('_')[1];

                $.get("{{ route('cart.add') }}", {
                    productId: productId
                }, function (response) {
                    if (!response.quantity) {

                    }
                    if (response.quantity) {
                        $('.toast').toast('hide');
                        $('.cart-quantity').html('<span class="text--success">' + response.quantity + '</span>');
                        $('.toast').toast('show');
                    }
                });
            });
        })
    </script>
@endpush

