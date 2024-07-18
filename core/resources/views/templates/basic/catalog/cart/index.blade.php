@extends($activeTemplate . 'layouts.frontend')
@section('content')

    <section class="pt-120 pb-120 section--bg">
        <div class="container">
            <div class="row justify-content-center mb-none-30">
        <!-- Section heading -->



        @if($items->isEmpty())
            <!-- Message -->
            <div class="py-3 px-6 rounded-lg bg-pink text-white">Корзина пуста</div>
                @else


            <!-- Adaptive table -->
            <div class="overflow-auto">
                <div class="cart-table">
                <table class="style--two mb-0 table" style="">
                    <thead class="text-xs uppercase">
                    <th width="18%" scope="col">Item</th>
                    <th width="72%" scope="col"></th>
                    <th width="10%" scope="col">Price</th>
                    <th width="10%" scope="col">Ammount</th>
                    <th width="10%" scope="col">Remove</th>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td scope="row" class="">
                                <div class="flex flex-col">
                                    <div class="">
                                        <img src="{{ getCatalogImage($item->product->getImagePath(), $item->product->image, 'thumb_') }}"
                                             class="rounded float-start" width="203" height="117"
                                             alt="{{ $item->product->title }}">
                                    </div>

                                </div>
                            </td>
                            <td class="">
                                <div class="pb-3 align-content-end">
                                    <h4 class="text-xs sm:text-sm xl:text-md font-bold">{{ $item->product->title }}</h4>
                                </div>
                                <div class="product-text">{{ $item->product->text }}</div>
                            </td>

                            <td class="">
                                <div class="font-medium whitespace-nowrap">{{ $item->price }}</div>
                            </td>

                            <td class="">
                                <div class="font-medium whitespace-nowrap">{{ $item->amount }}</div>
                            </td>
                            <td class="">
                                <form action="{{ route('cart.delete', $item) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn"
                                            title="Удалить из корзины">
                                        <i class="las la-trash" style="font-size: 32px; color: #ac7a35"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            </div>
                    <div class="d-flex justify-content-end mt-3">
                        <div class="p-2 bd-highlight"><div class="">@lang('Total'): {{ cart()->amount() }} </div></div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">

                        <div class="p-2 bd-highlight"><form action="{{ route('cart.truncate') }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-outline-secondary">@lang('Clear Cart')</button>
                            </form></div>
                        <div class="p-2 bd-highlight"><a href="{{ route('catalog') }}" class="btn btn-outline-secondary">@lang('Catalog')</a></div>
                        <div class="p-2 bd-highlight"><a href="{{ route('order') }}" class="btn cmn-btn-cart">@lang('Make Order')</a></div>
                    </div>

            @endif
            </div>
        </div>

    </section>

@endsection
