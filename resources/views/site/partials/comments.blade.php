<section class="comments">
    <h4 class="headline margin-bottom-35">@lang('site.comments') <span class="comments-amount">({{ count($comments) }})</span></h4>

    <ul>
        @foreach($comments as $comment)
        <li>
            <div class="avatar">
                <img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt=""/>
            </div>
            <div class="comment-content">
                <div class="arrow-comment"></div>
                <div class="comment-by">{{ $comment->user_name }}<span class="date">{{ $comment->jalali_created_at->format('d F Y') }}</span></div>
                <p>{{ $comment->content }}</p>
            </div>
        </li>
        @endforeach
    </ul>

</section>
<div class="clearfix"></div>

<!-- Add Comment -->
<h4 class="comment-h4">@lang('site.contacts.send_comment')</h4>

<form method="post" action="{{ route('site.comment.create', [$item->id, strtolower(class_basename($item))]) }}" id="add-comment" class="add-comment">
    {{ csrf_field() }}

    <div class="form-group col-sm-12">
        <label class="control-label col-sm-2">@lang('site.contacts.name'): (*)</label>
        <div class="col-md-6">
            <input class="form-control" placeholder="@lang('site.contacts.name')" name="user_name" type="text">
        </div>
    </div>

    <div class="form-group col-sm-12">
        <label class="control-label col-sm-2">@lang('site.contacts.email'): (*)</label>
        <div class="col-md-6">
            <input class="form-control" placeholder="@lang('site.contacts.email')" name="user_email" type="text">
        </div>
    </div>

    <div class="form-group col-sm-12">
        <label class="control-label col-sm-2">@lang('site.contacts.comment'): (*)</label>
        <div class="col-md-8">
            <textarea class="form-control" placeholder="@lang('site.contacts.comment')" name="content" cols="50" rows="10"></textarea>
        </div>
    </div>

    <div class="form-group col-sm-12">
        <label class="control-label col-sm-2">@lang('site.contacts.captcha'): (*)</label>
        <div class="col-md-4">
            <input class="form-control ltr" placeholder="@lang('site.contacts.captcha')" name="captcha" type="text" autocomplete="off">
        </div>
        <div class="col-md-4">
            <div id='captcha' class="col-sm-12">
                <a href='javascript:void(0);' id="reload_captcha">
                    <img src="{{ captcha_src() }}" id="captcha_image">
                </a>
            </div>
        </div>
    </div>

    <div class="form-group col-sm-12">
        <div class="col-sm-offset-2 col-sm-10">
            <input name="submit" value="@lang('site.comment.send')" class="btn btn-success" type="submit">
        </div>
    </div>
    <div class="clearfix"></div>
</form>