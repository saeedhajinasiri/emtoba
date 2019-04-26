@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" id="faqdiv">
            <div class="col-md-12">

                <h1>Change email address</h1>

                <p>After changing your email address, you will have to verify it again. If you don't immediately receive a verification mail after the change, try the following:</p>

                <ul>
                    <li>Wait for a bit more</li>
                    <li>Check your spam folder</li>
                    <li>Use another email address</li>
                </ul>

                <p>If you don't verify your email within 24 hours, we will send another verification mail. If no verification is made within 72 hours, the unverified email address is removed from your account. You can verify another email address after this.</p>

                <p>Because account recovery is linked to your verified email address, you will need to confirm this action with your credentials.</p>


                <form id="theform" action="" method="POST">

                    <input type="hidden" name="csrfmiddlewaretoken" value="FG8oLxkhPjrA8Md2LqcSqRFOVYPH0zYD">


                    <div class="row">
                        <div class="col-md-12" style="padding-bottom:20px;">


                            <div class="row">
                                <div class="col-md-4">


                                    <div id="div_id_password" class="form-group">

                                        <label for="id_password" class="control-label  requiredField">
                                            Your password<span class="asteriskField">*</span>
                                        </label>


                                        <div class="controls ">
                                            <input autocomplete="off" class="input-small textinput textInput form-control" id="id_password" name="password" placeholder="Password" type="password">


                                            <p id="hint_id_password" class="help-block">Please confirm changing the email address with your password</p>


                                        </div>


                                    </div>


                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-4">


                                    <div id="div_id_email" class="form-group">

                                        <label for="id_email" class="control-label  requiredField">
                                            New email address<span class="asteriskField">*</span>
                                        </label>


                                        <div class="controls ">
                                            <input class="emailinput form-control" id="id_email" name="email" type="email">


                                        </div>


                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="">
                        <label class="control-label">Please verify you are a human.</label>
                        <script src="https://www.google.com/recaptcha/api.js" async="" defer=""></script>
                        <div class="g-recaptcha" data-sitekey="6Le95uoSAAAAAH3LKzssY-LHQOMu6eBag0yqlA6O">
                            <div style="width: 304px; height: 78px;">
                                <div>
                                    <iframe src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6Le95uoSAAAAAH3LKzssY-LHQOMu6eBag0yqlA6O&amp;co=aHR0cHM6Ly9sb2NhbGJpdGNvaW5zLmNvbTo0NDM.&amp;hl=en&amp;v=v1531759913576&amp;size=normal&amp;cb=uszw4i4gf4x4" width="304" height="78" role="presentation" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe>
                                </div>
                                <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; "></textarea></div>
                        </div>
                        <span class="help-block"><strong></strong></span>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Change email address
                    </button>

                    <br>
                </form>

            </div>
        </div>


    </div>
@stop

@section('stylesheets')

@stop

@section('scripts')
@stop