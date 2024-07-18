<a href="{{ route('catalog.category.index', $item->slug) }}"
   class="btn @if(request()->fullUrlIs('*/' . $item->slug)) cmn-btn
   @else cmn-btn-two
@endif ">
    {{ $item->title }}
</a>
