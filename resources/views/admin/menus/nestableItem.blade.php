<li class="dd-item" data-id="{{ $item['id'] }}">
    <div class="dd-handle dd3-handle"> </div>

    <div class="dd3-content" data-id="{{ $item['id'] }}">
        <span>{{ $item['title'] }}</span>
    </div>
    <div class="pull-left" data-id="{{ $item['id'] }}" style="position: absolute; left:10px; top:8px;">
        <a class="btn btn-xs btn-icon-only quickDestroy tooltips" data-placement="top" data-original-title="{{ trans('admin.menus.quickDestroy') }}" href="javascript:void(0);" data-url="{!! route('admin.menus.quickDestroy', $item['id']) !!}">
            <i class="ti-trash"></i>
        </a>
        <a class="btn btn-xs btn-icon-only quickEdit tooltips" data-placement="top" data-original-title="{{ trans('admin.menus.quickEdit') }}" data-url="{!! route('admin.menus.quickEdit', $item['id']) !!}" href="javascript:void(0);">
            <i class="ti-pencil"></i>
        </a>
        <a class="btn btn-xs btn-icon-only quickCreate tooltips" data-placement="top" data-original-title="{{ trans('admin.menus.quickCreate') }}" href="javascript:;">
            <i class="ti-plus"></i>
        </a>
    </div>

    @if(isset($item['children']))
        <ol class="dd-list">
            @foreach($item['children'] as $item)
                @include('menus.menus.nestableItem', ['item' => $item])
            @endforeach
        </ol>
    @endif

</li>