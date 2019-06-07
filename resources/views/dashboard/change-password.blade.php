@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row">
            <div class="offset2 col-md-6">
                <h2>Change your password</h2>

                <form method="post" action="">
                    <input name="csrfmiddlewaretoken" value="jLQ4efDd7KArGHzB0dCo4R5fWW21zMvT" type="hidden">


                    <div id="div_id_old_password" class="form-group"><label for="id_old_password" class="control-label  requiredField">
                            Old password<span class="asteriskField">*</span> </label>
                        <div class="controls "><input class="textinput textInput form-control" id="id_old_password" name="old_password" type="password"></div>
                    </div>
                    <div id="div_id_new_password1" class="form-group"><label for="id_new_password1" class="control-label  requiredField">
                            New password<span class="asteriskField">*</span> </label>
                        <div class="controls "><input class="textinput textInput form-control" id="id_new_password1" name="new_password1" type="password"></div>
                    </div>
                    <div id="div_id_new_password2" class="form-group"><label for="id_new_password2" class="control-label  requiredField">
                            New password confirmation<span class="asteriskField">*</span> </label>
                        <div class="controls "><input class="textinput textInput form-control" id="id_new_password2" name="new_password2" type="password"></div>
                    </div>


                    <p>
                        <button class="btn btn-default">Change</button>
                    </p>

                    <p class="muted">
                        The password change resets your third party application and API authentications.
                    </p>


                </form>

            </div>
        </div>


    </div>
@stop

@section('stylesheets')

@stop

@section('scripts')
@stop