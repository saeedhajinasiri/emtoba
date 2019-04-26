@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div id="nestable-category" class="m-b-20">
                <button type="button" data-action="expand-all" class="btn btn-success"> {{ trans('admin.categories.expandAll') }} </button>
                <button type="button" data-action="collapse-all" class="btn btn-success"> {{ trans('admin.categories.collapseAll') }} </button>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.categories.list') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('admin.categories.sort') }}" method="post">
                        {{ csrf_field() }}
                        <div class="portlet-body">
                            <div class="dd-content" data-id="{{ $root['id'] }}">
                                <span>{{ $root['title'] }}</span>
                                <a class="btn btn-xs btn-icon-only pull-left quickCreate tooltips" data-placement="top" data-original-title="{{ trans('admin.categories.quickCreate') }}" href="javascript:;">
                                    <i class="ti-plus"></i>
                                </a>
                            </div>

                            <div class="dd" id="categoryList">
                                <ol class="dd-list">

                                    <input type="hidden" id="changeId" value="{{ $parentId }}">
                                    @foreach($items as $item)
                                        @include('admin.categories.nestableItem', ['item' => $item])
                                    @endforeach

                                </ol>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.categories.form') }}</h4>
                    </div>
                </div>
                <div class="panel-body" id="quickEdit"></div>
            </div>
        </div>
    </div>
@stop

@section('additional_css')
    <link href="/panel/assets/plugins/nestable/jquery.nestable.css" rel="stylesheet" type="text/css"/>
@stop

@section('additional_js')
    <script src="/panel/assets/plugins/nestable/jquery.nestable-rtl.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            var $this = $('#categoryList');

            var $body = $("body");
            $this.nestable({
                dropCallback: function (details) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: '{{ route('admin.categories.sort') }}',
                        dataType: 'json',
                        data: {
                            id: details.sourceId,
                            parent: details.destId,
                            before: $(details.sourceEl).prev('li').data('id')
                        },
                        success: function (response) {
                            console.log(response);
                        },
                        error: function (xhr) {
                            console.log(xhr.message);
                        }
                    });
                }
            });
            $this.nestable('collapseAll');

            $body.on("click", '.quickEdit', function (e) {
                e.preventDefault();

                var url = $(this).data('url');
                var id = $(this).parent('div').data('id');
                var hyperLink = $(this);

                $.get(url, function (data, item) {
                    $('#quickEdit').html(data);
                    // $('#state').bootstrapSwitch('state', item.state);
                    $('#quickForm').on('submit', function (e) {
                        //blockPage();

                        e.preventDefault();
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "POST",
                            url: '/admin/categories/' + id + '/quickUpdate',
                            data: $(this).serialize(),
                        }).done(function (response) {
                            hyperLink.parent('div').prev('div').html(response.title);
                            $('#quickEdit').html('');
                        });
                    });
                })
            });

            $body.on("click", '.quickCreate', function (e) {
                e.preventDefault();
                //blockPage();

                var url = $(this).data('url');
                var id = $(this).parent('div').data('id');
                var hyperLink = $(this);

                $.get('{{ route('admin.categories.quickCreate') }}', function (data, item) {
                    $('#quickEdit').html(data);
                    $('#parent_id').val(id);
                    // $('#state').bootstrapSwitch('state', true);
                    $('#quickForm').on('submit', function (e) {
                        //blockPage();

                        e.preventDefault();
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "POST",
                            url: '{{ route('admin.categories.quickStore') }}',
                            data: $(this).serialize(),
                            success: function (response) {
                                if (hyperLink.parent('div').parent('li').length) {
                                    if (hyperLink.parent('div').parent('li').children('ol').length) {
                                        hyperLink.parent('div').parent('li').children('ol').append(response);
                                    }
                                    else {
                                        hyperLink.parent('div').parent('li').append('<ol class="dd-list">' + response + '</ol>');
                                    }
                                }
                                else {
                                    hyperLink.parent('div').next('div').children('ol').append(response);
                                }

                                $('#quickEdit').html('');
                            },
                        });

                    });
                })
            });

            $body.on("click", '.quickDestroy', function () {
                if (confirm('{!! trans('admin.categories.areYouSure') !!}') == true) {
                    //blockPage();

                    var url = $(this).data('url');
                    var hyperLink = $(this);

                    $.get(url, function () {
                        hyperLink.parent('div').parent('li').remove();
                        $('#quickEdit').html('');
                    });
                }
            });

            $('#nestable-category').on('click', function (e) {
                var target = $(e.target),
                    action = target.data('action');
                if (action === 'expand-all') {
                    $('.dd').nestable('expandAll');
                }
                if (action === 'collapse-all') {
                    $('.dd').nestable('collapseAll');
                }
            });

        });
    </script>
@stop