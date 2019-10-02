@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/contact.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  <!-- main body -->
  <div class="main">
    <!-- innerpages-header  -->
      <div class="">
        <div class="container contact-all">
            <p class="txt-con">@lang('contact.contact_us')</p>

            <div class="contact-message col-md-12" style="padding:0"></div>
            <form id="contact-form" class="form" method="post" action="{{ route('contactSubmit') }}" role="form">
                <div class="contact">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <input type="text" name="name" placeholder="@lang('contact.your_name')" class="input-con" required="">
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <input type="email" name="email" placeholder="@lang('contact.your_email')" class="input-con" required="">
                        </div>
                    </div>
                </div>

                <div class="subject">
                  <input type="text" name="subject" placeholder="@lang('contact.subject')" class="input-con">
                </div>

                <div class="msg-con">
                    <textarea name="message" class="input-con area-con" placeholder="@lang('contact.leave_message')" required=""></textarea>
                </div>
                @csrf
                <div class="btn-send" id="contact-btn" onclick="$(this).closest('form').submit();">@lang('contact.send_message')</div>
            </form>
          </div>
      </div>
  </div>
@endsection

@section('scripts')
<script>
    $(function () {

        // init the validator
        // validator files are included in the download package
        // otherwise download from http://1000hz.github.io/bootstrap-validator

        // when the form is submitted
        $('#contact-form').on('submit', function (e) {
            // if the validator does not prevent form submit
            if (!e.isDefaultPrevented()) {
                $('#contact-btn').prop('disabled', true);
                $('#contact-btn').html('<i class="fas fa-circle-notch"></i> loading...');
                var url = "{{ route('contactSubmit') }}";

                // POST values in the background the the script URL
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $(this).serialize(),
                    success: function (data)
                    {
                        // we recieve the type of the message: success x danger and apply it to the
                        var messageAlert = 'alert-' + data.type;
                        var messageText = data.message;

                        // let's compose Bootstrap alert box HTML
                        var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';

                        // If we have messageAlert and messageText
                        if (messageAlert && messageText) {
                            // inject the alert to .messages div in our form
                            $('.contact-message').html(alertBox);
                            // empty the form
                            $('#contact-form')[0].reset();
                        }

                        $('#contact-btn').html("@lang('contact.send_message')");
                        $('#contact-btn').prop('disabled', false);
                    }
                });
                return false;
            }
        })
    });
</script>
@endsection