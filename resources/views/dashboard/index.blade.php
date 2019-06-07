@extends('site.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>{{ $user->name }}</h1>

                <div id="profile-info">
                    <h2>اطلاعات کاربری  {{ $user->name }} </h2>

                    <div>
                        <small class="muted">
                            {{ trans('dashboard.home.this_information_is_updated_hourly') }}
                        </small>
                    </div>

                    <div class="row shaded" id="trade_volume_row">
                        <div class="col-md-5 profile-label">
                            {{ trans('dashboard.home.trade_volume') }}
                        </div>
                        <div class="col-md-6 profile-value">
                            0-0.5 BTC
                        </div>
                    </div>

                    <div class="row" id="confirmed_trades_row">
                        <div class="col-md-5 profile-label">
                            {{ trans('dashboard.home.number_of_confirmed_trades') }}
                        </div>
                        <div class="col-md-6 profile-value">
                            <strong class="F100_score"> 0 </strong>
                            <br>
                            …with <strong class="F100_score">0</strong> different partners
                        </div>
                    </div>

                    <div class="row shaded" id="feedback_score_row">
                        <div class="col-md-5 profile-label">
                            {{ trans('dashboard.home.feedback_score') }}
                        </div>
                        <div class="col-md-6 profile-value">
                            <strong class=" F80_score ">N/A %</strong>
                        </div>
                    </div>

                    <div class="row" id="date_joined_row">
                        <div class="col-md-5 profile-label">
                            {{ trans('dashboard.home.account_created') }}
                        </div>
                        <div class="col-md-6 profile-value">
                            <abbr title="2018-05-28T04:37:39+00:00">
                                1&nbsp;month, 4&nbsp;weeks ago
                            </abbr>
                        </div>
                    </div>

                    <div class="row shaded" id="last_seen_on_row">
                        <div class="col-md-5 profile-label">
                            {{ trans('dashboard.home.last_seen') }}
                        </div>
                        <div class="col-md-6 profile-value">
                            <abbr title="2018-07-25T11:54:17+00:00">
                                5&nbsp;minutes ago
                            </abbr>
                        </div>
                    </div>

                    <div class="row shaded" id="trusted_row">
                        <div class="col-md-5 profile-label">
                            {{ trans('dashboard.home.language') }}
                        </div>
                        <div class="col-md-6 profile-value">
                            English
                        </div>
                    </div>

                    <div class="row" id="email_verified_row">
                        <div class="col-md-5 profile-label">
                            {{ trans('dashboard.home.email') }}
                        </div>
                        <div class="col-md-6 profile-value">
                            <i class="bad fa fa-exclamation-triangle"></i> NOT verified
                        </div>
                    </div>

                    <div class="row shaded" id="phone_verified_row">
                        <div class="col-md-5 profile-label">
                            {{ trans('dashboard.home.phone_number') }}
                        </div>
                        <div class="col-md-6 profile-value">
                            <i class="bad fa fa-exclamation-triangle"></i> NOT verified
                        </div>
                    </div>

                    <div class="row" id="trusted_row">
                        <div class="col-md-5 profile-label">
                            {{ trans('dashboard.home.trust') }}
                        </div>
                        <div class="col-md-6 profile-value">
                            Trusted by <strong>0</strong> people
                        </div>
                    </div>

                    <div class="row shaded" id="trusted_row">
                        <div class="col-md-5 profile-label">
                            {{ trans('dashboard.home.blocks') }}
                        </div>
                        <div class="col-md-6 profile-value">
                            Blocked by <strong>0</strong> people
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 profile-col-right">
                <div class="row well">
                    <div class="col-md-12">
                        <button class="btn btn-profile-trust btn-success smaller-text" disabled="disabled">
                            <i class="fa fa-star"></i> Already trusting saeednasiri
                        </button>
                        <p>It's you</p>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 pull-right">
                        <small>
                            <a id="flag-user" href="/support/request/?indicator=7-2n&amp;User name=saeednasiri" title="Notify the site administration about improper user">
                                <i class="fa fa-flag"></i>
                                Report this user
                            </a>
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6" id="feedback">
                <h3>No feedback</h3>
                <p>
                    <i>saeednasiri</i> has not yet feedback from anyone with considerable trade volume.
                </p>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
@stop

@section('stylesheets')

@stop

@section('scripts')
@stop