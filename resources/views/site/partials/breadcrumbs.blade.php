@if ($breadcrumbs)
    <div class="new_breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        @foreach ($breadcrumbs as $breadcrumb)
                            @if ($breadcrumb->url && !$loop->last)
                                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                    <a itemprop="item" itemscope="" itemtype="http://schema.org/Thing" href="{{ $breadcrumb->url }}">
                                        <span itemprop="name">{{ $breadcrumb->title }}</span>
                                    </a>
                                </li>
                            @else
                                <li class="current">
                                    <a itemprop="item" itemscope="" itemtype="http://schema.org/Thing" href="{{ $breadcrumb->url }}">
                                        <span itemprop="name">{{ $breadcrumb->title }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endif
