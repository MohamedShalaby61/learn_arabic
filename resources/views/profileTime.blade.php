@foreach($times as $item)
    <li id="organizerContainer-list-item-0">
        <div class="ext-left">
                <span class="organizerContainer time" id="organizerContainer-list-item-0-time">{{\Carbon\Carbon::parse($item->from)->format('g:i A')}} - {{\Carbon\Carbon::parse($item->to)->format('g:i A')}}</span>
        </div>
        <div class="ext-right">
                <form action="book/time" method="post">
                    @csrf
                    <input id="selectedTime" type="hidden" name="time_id" value="{{$item->id}}">
                    @if($item->booked_user_id==auth()->id())
                        <span class="badge badge-secondary">Booked</span>
                    @else
                        <button id="notBooked" type="submit" class="btn btn-primary" style="font-size: 14px; padding: 2px 5px;">@lang('main.select')</button>
                    @endif
                </form>
        </div>

    </li>
    @endforeach

@section('scripts')  
<script type='text/javascript'>
</script>
@endsection