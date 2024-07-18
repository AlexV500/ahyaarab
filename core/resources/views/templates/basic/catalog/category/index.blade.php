@extends($activeTemplate . 'layouts.frontend')
@section('content')

    <section class="pt-120 pb-120 section--bg">
        <div class="container">
            <div class="row justify-content-center mb-none-30">
                <!-- Sort by -->
                @if($categories)
                    <section class="mt-5 mt-lg-6">
                        <!-- Section heading -->
                        <h2 class="fs-4 fs-lg-1 fw-bold">Categories</h2>
                        <!-- Categories -->
                        <div class="d-grid gap-2 d-md-block mt-4">
                            @each($activeTemplate . 'catalog.category.shared.category', $categories, 'item')
                        </div>
                    </section>
                @endif

                @if($products)
                    <section id="" class="mt-5 mt-lg-6">
                        <!-- Section heading -->
                        <h2 class="fs-4 fs-lg-1 fw-bold mb-4">All Plans</h2>
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
                        $('.cart-quantity').html('<span class="text--success">' + response.quantity + '</span>');
                    }
                });
            });
        })
    </script>
@endpush
