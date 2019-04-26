<div class="row">
    <div class="col-md-12">
        <div class="search-form-wrap margin-top20">

            <ul class="nav nav-tabs search-form-nav" role="tablist">
                <li role="presentation" @if(!isset($default) || (isset($default) && $default == 'buy')) class="active" @endif><a href="#orange_form_buy" class="tab-buy" aria-controls="orange_form_buy" role="tab" data-toggle="tab">سریع بخرید</a></li>
                <li role="presentation" @if(isset($default) && $default == 'sell') class="active" @endif><a href="#orange_form_sell" class="tab-sell" aria-controls="orange_form_sell" role="tab" data-toggle="tab">سریع بفروشید</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="orange_form_buy">

                    {!! form_start($searchForm, ['class' => 'search-form']) !!}
                    <div class="search-form-fields">
                        <input name="action" type="hidden" value="buy"/>
                        <div class="form-group amount">
                            <div class="controls">
                                {!! form_widget($searchForm->amount) !!}
                            </div>
                        </div>

                        <div class="form-group currency">
                            <div class="controls">
                                {!! form_widget($searchForm->currency_type) !!}
                            </div>
                        </div>

                        <div class="form-group location">
                            <div class="controls">
                                {!! form_widget($searchForm->location_id) !!}
                            </div>
                        </div>

                        <div class="form-group provider">
                            <div class="controls">
                                {!! form_widget($searchForm->payment_method) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="controls">
                                <input type="submit" name="find-offers" value="جستجو" class="btn btn-primary search-form-button"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <input type="submit" name="find-offers" value="جستجو" class="btn btn-primary search-form-button search-form-button-advanced"/>
                        </div>
                    </div>
                    {!! form_end($searchForm, false) !!}
                </div>
                <div role="tabpanel" class="tab-pane " id="orange_form_sell">
                    {!! form_start($searchForm, ['class' => 'search-form']) !!}
                    <div class="search-form-fields">
                        <input name="action" type="hidden" value="sell"/>
                        <div class="form-group amount">
                            <div class="controls">
                                {!! form_widget($searchForm->amount) !!}
                            </div>
                        </div>

                        <div class="form-group currency">
                            <div class="controls">
                                {!! form_widget($searchForm->currency_type) !!}
                            </div>
                        </div>

                        <div class="form-group location">
                            <div class="controls">
                                {!! form_widget($searchForm->location_id) !!}
                            </div>
                        </div>

                        <div class="form-group provider">
                            <div class="controls">
                                {!! form_widget($searchForm->payment_method) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="controls">
                                <input type="submit" name="find-offers" value="جستجو" class="btn btn-primary search-form-button"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <input type="submit" name="find-offers" value="جستجو" class="btn btn-primary search-form-button search-form-button-advanced"/>
                        </div>
                    </div>
                    {!! form_end($searchForm, false) !!}
                </div>
            </div>
        </div>
    </div>
</div>
