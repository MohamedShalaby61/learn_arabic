@foreach($times as $item)
    <li id="organizerContainer-list-item-0">
        <div><span class="organizerContainer time" id="organizerContainer-list-item-0-time">{{$item->from}} - {{$item->to}}</span></div>
        <p style="display: flex; justify-content: space-between;" id="organizerContainer-list-item-0-text">
            <form action="book/time" method="post">
            @csrf
            <input id="selectedTime" type="hidden" name="time_id" value="{{$item->id}}">
            @if($item->booked_user_id==auth()->id())
                <input type="button" disabled value="Booked">
            @else
            <button id="notBooked" type="submit" class="btn btn-primary" style="font-size: 14px; padding: 2px 5px;">@lang('main.select')</button>
                @endif
        </form>
        </p>
    </li>
    @endforeach
<script>

</script>