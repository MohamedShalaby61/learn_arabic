@extends('layouts.app')

@section('content')
	<!-- innerpages-header  -->
    <div class="">
		{{--  modaal  --}}
		<div class="modal fade" id="success_subscribe" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						@if(!empty($price) && session()->has('success_subscribe'))
							<h5 style="color:#ffc000">Your subscribe successfully your balance is 
									@if ($package->discount_percentage)
										<h5>${{ (int)$price->price_month * (int)$price->months - (int)$price->price_month * (int)$price->months * (int)$package->discount_percentage / 100 }}<br></h5>
									@else
										<h5>${{ (int)$price->price_month * (int)$price->months }}<br></h5>
									@endif
							</h5>
						@endif
						@if (session()->has('error'))
							<h5>Sorry !!</h5>
						@endif
					</div>
					<div class="modal-body">
						<div class="text-center clearfix">
						@if(!empty($price) && session()->has('success_subscribe'))
							<h5>{{ $price->minutes }} @lang('student-subscribe.minutes_per_day') ({{ $price->days }} @lang('student-subscribe.days_per_week')) | {{ $package->name }}</h5>
						@endif
						@if (session()->has('error'))
							<h5 style="color:red">You are subscribed before</h5>
						@endif
						</div>
					</div>
				</div>
			</div>
		</div>

		<div style="margin: 20px auto auto; max-width: 750px;">
			<div class="page-section text-center" style="margin: 0px auto; max-width: 80%;">
				<div class="row">
					<div class="col-xs-12 col-xs-offset-0 col-lg-10 col-lg-offset-1"></div>
				</div>
			</div>
			<div class="page-section bg-white" style="margin: 100px 0 50px 0; background-color: #fff !important; box-shadow:1px 1px 30px #eee; border: 1px solid yellow;">
				<h3>@lang('student-subscribe.payment_information') <i class="glyphicon glyphicon-lock" style="float: right; font-size: medium;"></i></h3>
				<div style="margin-top: 20px;">
					<form >
						<div class="StripeElement StripeElement--empty">
							<div class="__PrivateStripeElement" style="margin: 0px !important; padding: 0px !important; border: none !important; display: block !important; background: transparent !important; position: relative !important; opacity: 1 !important;">
								<iframe frameborder="0" allowtransparency="true" scrolling="no" name="__privateStripeFrame8" allowpaymentrequest="true" src="https://js.stripe.com/v3/elements-inner-card-f6d4daf53ab44ddc4b9f013359f4c42c.html#style[base][fontSize]=16px&amp;componentName=card&amp;wait=false&amp;rtl=false&amp;keyMode=live&amp;origin=https%3A%2F%2Fwww.cambly.com&amp;referrer=https%3A%2F%2Fwww.cambly.com%2Fen%2Fstudent%2Fcheckout%3FproductId%3D5acfcb39aa1b67d0d282fe22%25233%26purchaseId%3D5d24633c58ef5f0023792d52%26paymentProcessor%3Dstripe&amp;controllerId=__privateStripeController1" title="Secure payment input frame" style="border: none !important; margin: 0px !important; padding: 0px !important; width: 1px !important; min-width: 100% !important; overflow: hidden !important; display: block !important; user-select: none !important; height: 19.2px;"></iframe>
								<input class="__PrivateStripeElement-input" aria-hidden="true" aria-label=" " autocomplete="false" maxlength="1" style="border: none !important; display: block !important; position: absolute !important; height: 1px !important; top: 0px !important; left: 0px !important; padding: 0px !important; margin: 0px !important; width: 100% !important; opacity: 0 !important; background: transparent !important; pointer-events: none !important; font-size: 16px !important;">
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="page-section bg-white payment-info-card" style="margin: 50px 0 50px 0;background-color: #fff !important; box-shadow:5px 5px 30px #eee; border: 1px solid yellow;">
				<div>
					<div class="" style="margin: 0 auto; font-size:14px;">
						<div class="col-xs-12 col-sm-6 col-sm-offset-3">
							<h4>@lang('student-subscribe.product')</h4>
							<h5>{{ $price->minutes }} @lang('student-subscribe.minutes_per_day') ({{ $price->days }} @lang('student-subscribe.days_per_week')) | {{ $package->name }}</h5>
						</div>
						<div class="col-xs-12 col-sm-6 col-sm-offset-3">
							<h4>@lang('student-subscribe.price')</h4>
							
							
						</div>
					</div>
					<hr>
				</div>
				
				<div class="text-center">
					<form id="subscribe-form" action="{{route('student.postPayment')}}" method="post" >
						@csrf
						<input type="hidden" name="package_price_id" value="{{$price->id}}">
						<button type="submit" class="btn btn-accent" type="button" style="background-color: #d22f32; border-color: #89001a; color:#fff; border: none;" >
							@lang('student-subscribe.purchase')
						</button>
					</form>

				</div> 
			</div>
			
		</div>
	</div>

@endsection


@if (!empty(session()->get('success_subscribe')) || !empty(session()->get('error')))
@section('scripts')
	<script type='text/javascript'>
		$(function () {
			$('#success_subscribe').modal('show');
		});
	</script>
@endsection
@endif