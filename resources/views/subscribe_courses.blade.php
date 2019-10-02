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
                        <div class="col-md-6 col-xs-12">
                            <div class="subscription-section subscription-section-agenda">
                                <h3>{{ $course->title }}</h3>
                                <div>
                                    <h5 class="price-header total-price" style="display: flex; justify-content: space-between; padding-top: 20px; color: #228891;">     <span>@lang('courses.course_costs')</span>
                                        <span class="price" style="">${{ $course->cost }}</span>
                                    </h5>
                                </div>
                                <div style="padding-top: 10px;">
                                    <h5>@lang('courses.course_details')</h5>
                                    <p>{{ $course->description }}</p>
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
                                    <h3>@lang('courses.purchase_summary')</h3>
                                </div>
                                <div id="payment-summary" style="padding-bottom: 30px;">                                    
                                    <div class="total-line"></div>
                                    <div>
                                        <h5 class="price-header total-price"><span>@lang('courses.todays_charge')</span><span class="price">${{ $course->cost }}</span></h5>
                                    </div>
                                </div>
                            </div>
                            <div style="background: rgba(34, 136, 145, 0.1) none repeat scroll 0% 0%; padding: 10px; border-radius: 6px; color: rgb(34, 136, 145); margin-bottom: 15px; display: flex; justify-content: space-between; align-items: center;">
                                <div style="display: flex; align-items: center; flex-flow: row wrap;">
                                    <div style="display: flex; align-items: center;"><svg style="display: inline-block; color: rgb(34, 136, 145); fill: currentcolor; height: 18px; width: 18px; user-select: none; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms; margin: 5px;" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"></path></svg>
                                        <span style="font-weight: bold;">@lang('courses.buy_with_confidence'):</span>
                                    </div>
                                    <div style="margin-left: 5px;">@lang('courses.cancel_at_any_time')</div>
                                </div><svg style="display: inline-block; color: rgb(34, 136, 145); fill: currentcolor; height: 15px; width: 15px; user-select: none; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms; align-self: flex-start;" viewBox="0 0 24 24"><path d="M11 17h2v-6h-2v6zm1-15C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zM11 9h2V7h-2v2z"></path></svg></div>
                            <div class="subscription-section-content" style="align-items: center;">
                                <div style="width: 80%;">
                                    <a href="{{ url('student/subscribe_course_confirmation') . '/' . $courseId }}"><div><button type="button" class="checkout-button btn btn-tertiary btn-block"><span style="display: flex; align-items: center;"><span style="margin-left: auto; margin-right: auto;">@lang('courses.subscribe')</span><svg style="@if(app()->getLocale() == 'ar')transform: rotate(180deg);@endif display: inline-block; color: rgba(0, 0, 0, 0.87); fill: rgb(255, 255, 255); height: 36px; width: 36px; user-select: none; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;" viewBox="0 0 24 24"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path></svg></span></button></div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 80px;" class="row">
                    <div class="col-md-10 col-xs-12">
                        <div class="subscription-section subscription-section-payment-options">
                            <form id="formABC" class="form-inline">
                                <div class="form-group"><label style="margin-right: 15px;" for="promoCode" class="control-label">@lang('courses.promo_code')</label><span style="max-width: 300px; margin: 0px auto;" class="input-group input-group-sm"><input id="promoCode" placeholder="@lang('courses.enter_code')" style="margin: 0px; background-color: white; font-size: 12px; border-width: 1px; border-color: rgb(238, 238, 238);" type="text" id="promoCode" class="form-control" value="" onblur=validarEmailybutton()><span class="input-group-btn"><button id="btnSubmit" style="margin-left: 5px;" disabled type="submit" class="btn btn-tertiary">@lang('courses.apply')</button></span></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection