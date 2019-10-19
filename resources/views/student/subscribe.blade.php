@extends('layouts.app')

@section('content')
    <div id="subscription-page-w">
        <div id="subscription-page">
            <div class="page-header">
                <div class="page-section text-center" style="margin: 0px auto; max-width: 80%;">
                    <div class="row">
                        <div class="col-xs-12 col-xs-offset-0 col-lg-10 col-lg-offset-1"></div>
                    </div>
                </div>
            </div>
            <div class="container bg-white page-section text-center">
                <div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="subscription-section subscription-section-agenda">
                                <div class="subscription-section-header">
                                    <h3>@lang('student-subscribe.set_your_weekly_agenda')</h3>
                                </div>
                                <div class="subscription-section-content">
                                    <div><svg width="20%" height="50%" viewBox="0 0 91 85" xmlns="http://www.w3.org/2000/svg"><title>@lang('student-subscribe.minutes_per_day')</title><g fill="none" fill-rule="evenodd"><path d="M76.677 27.648V33.165H2.767V20.167c0-2.804 2.274-5.085 5.068-5.085h6.833v2.698c0 1.84 1.493 3.34 3.328 3.34h5.09c1.834 0 3.326-1.5 3.326-3.34v-2.698h26.62v2.698c0 1.84 1.493 3.34 3.328 3.34h5.09c1.834 0 3.326-1.5 3.326-3.34v-2.698h6.834c2.794 0 5.067 2.28 5.067 5.085v7.48z" fill="#F6BA01"></path><path d="M71.32 12.05h-6.77V3.31c0-1.826-1.48-3.31-3.3-3.31h-5.04c-1.82 0-3.3 1.484-3.3 3.31v8.74H26.534V3.31c0-1.826-1.48-3.31-3.297-3.31h-5.043c-1.818 0-3.297 1.484-3.297 3.31v8.74h-6.77C3.645 12.05 0 15.708 0 20.203v46.56c0 4.495 3.645 8.152 8.125 8.152H71.32c4.48 0 8.124-3.657 8.124-8.152v-46.56c0-4.495-3.644-8.153-8.124-8.153zM56.015 3.31c0-.105.09-.196.194-.196h5.04c.105 0 .195.09.195.195v14.528c0 .104-.09.195-.194.195h-5.04c-.105 0-.195-.09-.195-.195V3.308zM18 3.31c0-.105.09-.196.193-.196h5.043c.103 0 .194.09.194.195v14.528c0 .104-.09.195-.194.195h-5.043c-.103 0-.194-.09-.194-.195V3.308zm1.085 68.49H8.125c-2.77 0-5.022-2.26-5.022-5.037V55.555h15.982V71.8zm0-19.36H3.103V36.197h15.982V52.44zM38.17 71.8H22.188V55.556H38.17V71.8zm0-19.36H22.188V36.197H38.17V52.44zM57.256 71.8H41.274V55.556h15.982V71.8zm0-19.36H41.274V36.197h15.982V52.44zM76.34 66.764c0 2.778-2.252 5.038-5.02 5.038H60.36V55.556h15.98v11.208zm0-14.322H60.36V36.197h15.98V52.44zm0-24.824v5.464H3.104V20.204c0-2.778 2.253-5.04 5.022-5.04h6.77v2.675c0 1.824 1.48 3.31 3.298 3.31h5.043c1.818 0 3.297-1.486 3.297-3.31v-2.674H52.91v2.674c0 1.824 1.48 3.31 3.3 3.31h5.04c1.82 0 3.3-1.486 3.3-3.31v-2.674h6.77c2.77 0 5.02 2.26 5.02 5.04v7.412z" fill="#484848" fill-rule="nonzero"></path><ellipse fill="#FFF" cx="72.944" cy="66.992" rx="18.056" ry="18.008"></ellipse><ellipse stroke="#484848" stroke-width="2.88" cx="72.944" cy="66.992" rx="13.722" ry="13.686"></ellipse><path stroke="#484848" stroke-width="2.88" stroke-linecap="round" stroke-linejoin="round" d="M72.222 59.068v8.96h6.23"></path></g></svg>
                                        <select class="giant-select" id="minutes" onchange="update_prices()">
                                                <option value="15">15 @lang('student-subscribe.minutes_per_day')</option>
                                                <option value="30" selected="">30 @lang('student-subscribe.minutes_per_day')</option>
                                                <option value="60">60 @lang('student-subscribe.minutes_per_day')</option>
                                                <option value="120">120 @lang('student-subscribe.minutes_per_day')</option>
                                                </select>
                                    </div>
                                    <div><svg width="20%" height="50%" viewBox="0 0 91 75" xmlns="http://www.w3.org/2000/svg"><title>@lang('student-subscribe.days_per_week')</title><g fill="none" fill-rule="evenodd"><path d="M70.92 12.064H64.19v-8.75c0-1.828-1.47-3.314-3.28-3.314h-5.014c-1.808 0-3.28 1.486-3.28 3.313v8.75h-26.23v-8.75c0-1.827-1.47-3.313-3.278-3.313H18.09c-1.807 0-3.278 1.486-3.278 3.313v8.75H8.08c-4.456 0-8.08 3.662-8.08 8.163v46.612C0 71.338 3.624 75 8.08 75h62.84c4.456 0 8.08-3.66 8.08-8.162V20.226c0-4.5-3.624-8.162-8.08-8.162zM55.7 3.314c0-.105.09-.196.194-.196h5.015c.102 0 .192.09.192.195v14.545c0 .104-.09.195-.193.195h-5.016c-.103 0-.193-.09-.193-.195V3.313zm-37.802 0c0-.105.09-.196.193-.196h5.016c.103 0 .193.09.193.195v14.545c0 .104-.09.195-.194.195H18.09c-.1 0-.192-.09-.192-.195V3.313zm1.08 68.568h-10.9c-2.752 0-4.992-2.262-4.992-5.044v-11.22h15.892v16.264zm0-19.38H3.086V36.235h15.892V52.5zm18.98 19.38H22.063V55.618h15.893v16.264zm0-19.38H22.063V36.235h15.893V52.5zm18.977 19.38H41.043V55.618h15.892v16.264zm0-19.38H41.043V36.235h15.892V52.5zm18.98 14.336c0 2.782-2.24 5.044-4.994 5.044h-10.9V55.618h15.894v11.22zm0-14.337H60.02V36.237h15.894V52.5zm0-24.853V33.12H3.084V20.225c0-2.78 2.24-5.045 4.994-5.045h6.732v2.678c0 1.827 1.47 3.313 3.28 3.313h5.014c1.808 0 3.28-1.485 3.28-3.312V15.18h26.23v2.678c0 1.827 1.47 3.313 3.278 3.313h5.015c1.807 0 3.278-1.485 3.278-3.312V15.18h6.733c2.754 0 4.994 2.265 4.994 5.046v7.42z" fill="#484848" fill-rule="nonzero"></path><path d="M75.914 27.647V33.12H3.086V20.225c0-2.78 2.24-5.045 4.993-5.045h6.732v2.678c0 1.827 1.47 3.313 3.28 3.313h5.014c1.808 0 3.28-1.485 3.28-3.312V15.18h26.23v2.678c0 1.827 1.47 3.313 3.278 3.313h5.015c1.807 0 3.278-1.485 3.278-3.312V15.18h6.733c2.754 0 4.994 2.265 4.994 5.046v7.42z" fill="#F6BA01"></path><path d="M72.63 40.72c-.687-.556-1.664-.406-2.18.338l-3.597 5.178-2.43-2.624c-.608-.657-1.594-.657-2.203 0-.608.657-.608 1.722 0 2.38l3.7 3.996c.293.317.69.493 1.1.493.038 0 .075 0 .112-.003.45-.035.865-.28 1.136-.67l4.675-6.73c.516-.743.377-1.798-.312-2.356zM53.96 59.47c-.69-.556-1.666-.406-2.183.338l-3.596 5.178-2.43-2.624c-.608-.657-1.594-.657-2.203 0-.608.657-.608 1.722 0 2.38l3.7 3.996c.294.317.69.493 1.102.493.036 0 .073 0 .11-.003.45-.035.865-.28 1.136-.67l4.674-6.73c.516-.743.377-1.798-.31-2.356zM35.286 40.72c-.69-.556-1.665-.406-2.182.338l-3.596 5.178-2.43-2.624c-.608-.657-1.595-.657-2.204 0-.608.657-.608 1.723 0 2.38l3.7 3.996c.295.317.69.493 1.103.493.037 0 .073 0 .11-.003.45-.035.865-.28 1.136-.67l4.674-6.73c.517-.743.377-1.798-.31-2.356z" fill="#484848" fill-rule="nonzero"></path></g></svg>
                                        <select class="giant-select" id="days" onchange="update_prices()">
                                                <option value="1">1 @lang('student-subscribe.days_per_week')</option>
                                                <option value="3">3 @lang('student-subscribe.days_per_week')</option>
                                                <option value="5" selected="">5 @lang('student-subscribe.days_per_week')</option>
                                                <option value="7">7 @lang('student-subscribe.days_per_week')</option>
                                                </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="subscription-section subscription-section-products">
                                <div class="subscription-section-header">
                                    <h3>@lang('student-subscribe.pick_a_commitment_level')</h3>
                                </div>
                                <div class="subscription-section-content">
                                    @foreach ($packages as $k => $package)
                                    <div>
                                        <div class="product-card product-{{$package->months}}  with-price panel panel-default @if($package->months == 3)active @endif" data-months="{{ $package->months }}" data-name="{{ $package->name }}" data-discount="{{ $package->discount_percentage }}">
                                            <div class="panel-body">
                                                <div class="d-none  d-xs-block radio"><label title=""><input readonly="" type="radio"></label></div>
                                                <div class="product-container">
                                                    <div class="product">
                                                        <div class="product-label">
                                                            <h3 class="product-description">{{ $package->name }}<small>{{ $package->note }}</small></h3>
                                                        </div>
                                                        @if ($package->discount_percentage)
                                                            <span class="product-price"><span class="price-string"><h3 id="subscribe_package_price_month_{{ $package->months }}">${{ round($prices[$package->months][5][30] * (100 - $package->discount_percentage) / 100, 0) }}</h3> / @lang('student-subscribe.month_short')</span></span>
                                                        @else
                                                            <span class="product-price"><span class="price-string"><h3 id="subscribe_package_price_month_{{ $package->months }}">${{ $prices[$package->months][5][30] * $package->months }}</h3> / @lang('student-subscribe.month_short')</span></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-footer">
                                                @if ($package->discount_percentage)
                                                    <div class="discount-headers" style="min-height: 23px;">
                                                        <div class="discount duration-3">
                                                            <h4 class="discount-text"><small>{{ $package->discount_percentage }}% @lang('student-subscribe.off')</small></h4>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div style="min-height: 23px;"></div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="subscription-section subscription-section-checkout">
                            <div>
                                <div class="subscription-section-header">
                                    <h3>@lang('student-subscribe.purchase_summary')</h3>
                                </div>
                                <div id="payment-summary" style="padding-bottom: 30px;">
                                    <div class="text-center plan-description">
                                        <h5 id="subscribe_package_info">@lang('student-subscribe.package_30_5_3_private')</h5>
                                    </div>
                                    <div class="line-item"><span class="description" id="subscribe_package_months">@lang('student-subscribe.original_monthly_price') (x 3)</span><span class="price" id="subscribe_package_price">$327.00</span></div>
                                    <div>
                                        <div class="line-item discount-line"><span class="description" id="subscribe_package_discount_pct">3 @lang('student-subscribe.month_subscription'): 15% off</span><span class="price" id="subscribe_package_discount_amount">-$49.05</span></div>
                                    </div>
                                    <div class="total-line"></div>
                                    <div>
                                        <h5 class="price-header total-price"><span>@lang('student-subscribe.today_charges_usd')</span><span class="price" id="subscribe_package_total">$277.95</span></h5>
                                    </div>
                                </div>
                            </div>
                            <div style="background: rgba(34, 136, 145, 0.1) none repeat scroll 0% 0%; padding: 10px; border-radius: 6px; color: rgb(34, 136, 145); margin-bottom: 15px; display: flex; justify-content: space-between; align-items: center;">
                                <div style="display: flex; align-items: center; flex-flow: row wrap;">
                                    <div style="display: flex; align-items: center;"><svg style="display: inline-block; color: rgb(34, 136, 145); fill: currentcolor; height: 18px; width: 18px; user-select: none; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms; margin: 5px;" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"></path></svg>
                                        <span style="font-weight: bold;">@lang('student-subscribe.buy_with_confidence'):</span>
                                    </div>
                                    <div style="margin-left: 5px;">@lang('student-subscribe.cancel_at_any_time')</div>
                                </div><svg style="display: inline-block; color: rgb(34, 136, 145); fill: currentcolor; height: 15px; width: 15px; user-select: none; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms; align-self: flex-start;" viewBox="0 0 24 24"><path d="M11 17h2v-6h-2v6zm1-15C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zM11 9h2V7h-2v2z"></path></svg></div>
                            <div class="subscription-section-content" style="align-items: center;">
                                <div style="width: 80%;">
									@guest
										<a href="{{ route('register') }}">
                                    @else
                                            {{-- subscribe button --}}                                    
										<a id="payment">
									@endguest
										<div>
                                            <button type="button" class="checkout-button btn btn-tertiary btn-block"><span style="display: flex; align-items: center;"></span><span style="margin-left: auto; margin-right: auto;">        
										@guest
											@lang('student-subscribe.sign_up')
										@else
											@lang('student-subscribe.subscribe')
										@endguest
										</span><svg style="@if(app()->getLocale() == 'ar')transform: rotate(180deg);@endif display: inline-block; color: rgba(0, 0, 0, 0.87); fill: rgb(255, 255, 255); height: 36px; width: 36px; user-select: none; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;" viewBox="0 0 24 24"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path></svg></span></button></div>
									</a>
                                    <h4 class="plan-renews" id="subscribe_package_renew_msg">@lang('student-subscribe.automatically_renew_and_cancel_anytime', ['months' => '3 ' . __('student-subscribe.months')])</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 80px;" class="row">
                    <div class="col-md-10 col-xs-12">
                        <div class="subscription-section subscription-section-payment-options">
                            <form class="form-inline">
                                <div class="form-group"><label style="margin-right: 15px;" for="promoCode" class="control-label">@lang('student-subscribe.promo_code')</label><span style="max-width: 300px; margin: 0px auto;" class="input-group input-group-sm"><input placeholder="@lang('student-subscribe.enter_code')" style="margin: 0px; background-color: white; font-size: 12px; border-width: 1px; border-color: rgb(238, 238, 238);" type="text" id="promoCode" class="form-control" value=""><span class="input-group-btn"><button style="margin-left: 5px;" type="submit" disabled="" class="btn btn-tertiary">@lang('student-subscribe.apply')</button></span></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    var prices = JSON.parse('{!! json_encode($prices) !!}');
    var pricesMonths = JSON.parse('{!! json_encode(array_keys($prices)) !!}');
    var selected_months = 3;
    var selected_months_name = 'Quarter';
    var selected_months_discount = $('.product-card.active').data('discount');
    $('.product-card').click(function() {
        $('.product-card').removeClass('active');
        $(this).addClass('active');
        selected_months = $(this).data('months');
        selected_months_name = $(this).data('name');
        selected_months_discount = $(this).data('discount');

        update_prices();
    });

    function update_prices()
    {
        price_before_discount = prices[selected_months][$('#days').val()][$('#minutes').val()] * selected_months;

        $('#subscribe_package_info').html("@lang('student-subscribe.private'): " + $('#minutes').val() + " @lang('student-subscribe.minutes_per_day'), " + $('#days').val() + " @lang('student-subscribe.days_per_week') | " + selected_months_name);
        $('#subscribe_package_months').html("@lang('student-subscribe.original_monthly_price') (x " + selected_months + ')');
        $('#subscribe_package_price').html('$' + price_before_discount);
        if (selected_months_discount) {
            discount = prices[selected_months][$('#days').val()][$('#minutes').val()] * selected_months * selected_months_discount / 100;
            $('#subscribe_package_discount_pct').html(selected_months + ' @lang("student-subscribe.month_subscription"): ' + selected_months_discount + '% off');
            $('#subscribe_package_discount_amount').html('-$' + discount);
        } else {
            discount = 0;
            $('#subscribe_package_discount_pct').html('');
            $('#subscribe_package_discount_amount').html('');
        }
        
        total = price_before_discount - discount;
        $('#subscribe_package_total').html('$' + total);

        if (selected_months == 1) {
            $('#subscribe_package_renew_msg').html("@lang('student-subscribe.automatically_renew_and_cancel_anytime', ['months' => __("student-subscribe.month")])");
        } else {
            $('#subscribe_package_renew_msg').html("@lang('student-subscribe.automatically_renew_and_cancel_anytime', ['months' => '" + selected_months + " '. __("student-subscribe.months")])");
        }

        pricesMonths.forEach(loop_prices);
        function loop_prices(item)
        {
            tmp_discount = $('.product-' + item).data('discount');
            if (tmp_discount) {
                $('#subscribe_package_price_month_' + item).html('$' + Math.round(prices[item][$('#days').val()][$('#minutes').val()] * (100 - tmp_discount)  / 100));
            } else {
                $('#subscribe_package_price_month_' + item).html('$' + Math.round(prices[item][$('#days').val()][$('#minutes').val()]));
            }
        }
    }

    $('#payment').click(function() {
		location.href = "{{ url('student/payment') }}/" + selected_months + "/" + $('#days').val() + "/" + $('#minutes').val();
	});
</script>
@endsection