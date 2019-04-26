@if(count($items) > 0)
    <ul class="practise-style2-4column newproduct clearfix">
        @foreach($items as $item)
        <li class="col-sm-6 col-md-4">
            <div class="practise-area">
                <div class="thumb">
                    <img alt="{{ $item->title_fa }}" src="{{ $item->image_link }}">
                    @if($item->hasDiscount())
                        <div class="popup">
                            <span>تخفیف !</span>
                        </div>
                    @endif
                </div>
                <div class="practise-details">
                    <h4 class="title"><a href="{{ $item->link }}">{{ $item->title_fa }}</a></h4>
                    <h4 class="value" @if($item->hasDiscount())style="text-decoration: line-through"@endif>{{ $item->decorate_price }}</h4>
                    @if($item->hasDiscount())<h4 class="fs-16 green">{{ $item->decorate_discount_price }}</h4>@endif
                    <p class="details">{!! $item->details !!}</p>
                    <a class="btn-thm btn-xs" href="{{ $item->link }}">جزئیات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
        </li>
        @endforeach
    </ul>

    {!! $items->links('site.pagination') !!}
@else
    محصولی یافت نشد
@endif