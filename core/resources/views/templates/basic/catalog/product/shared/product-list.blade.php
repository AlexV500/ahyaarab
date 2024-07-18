<!-- Product card -->
<div class="col-12 mb-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
    <div class="card product-card">
        <div class="row g-0">
            <div class="col-md-3 col-sm-12">
                <img src="{{ getCatalogImage($item->getImagePath(), $item->image, 'thumb_') }}"
                     class="img-fluid rounded-start w-100 h-100 object-fit-cover" alt="{{ $item->title }}">
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="card-body d-flex flex-column h-100">
                    <div class="row justify-content-between">
                        <div class="col-md-6 col-sm-12 mb-2 mb-md-0">
                            <h3 class="card-title fs-5">{{ $item->title }}</h3>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="fs-4 fw-bold"><span class="color-gold">Price:</span> {{ $item->price }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            @foreach($item->properties->keyValues() as $property => $value)
                                @if(trim($value) !== '')
                                    <div class="wss-scoreRow d-flex flex-wrap">
                                        <div class="col-md-3 col-sm-6"><span class="color-gold">{{ $property }}:</span></div>
                                        <div class="col-md-9 col-sm-6">{{ $value }}</div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9 pt-1">
                            <div class="product-text">
                                {{ $item->text }}
                            </div>
                        </div>
                    <div class="col-md-3">
                        <div class="mt-auto">
                            <div class="d-flex flex-column flex-xl-row justify-content-between align-items-xl-center gap-3 mt-3">

                                <div>
                                    <button id="cart-item_{{ $item->id }}" class="btn cmn-btn-cart me-2" title="Add to cart">

                                        <i class="las la-cart-plus"></i>
                                    </button>
                                    <button class="btn btn-outline-secondary" title="Add to favorites">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                             fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.product-card -->
