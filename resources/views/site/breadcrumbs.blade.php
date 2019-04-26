@if ($breadcrumbs)
    <ol class="bread-crumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a> <i class="fa fa-angle-left"></i> </li>
            @else
                <li class="current"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @endif
        @endforeach
    </ol>
@endif
