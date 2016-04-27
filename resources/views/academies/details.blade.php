@extends('layouts.app')
@section('content')
    <div class="row">
        <h1>{{$academy->name}}</h1>
        </div>
    <div class="row">
        <div class="col-lg-6">
            <p><span>Contact Person:</span> {{$academy->contact_name}}</p>
            <p><span>Contact Email Id:</span> {{$academy->email}}</p>
            <p><span>Description:</span> {{$academy->description}}</p>
            <p><span>TimeSlots:</span> </p>
            @foreach($academy->timeslots as $timeslot) @endforeach
            <p>@if($timeslot->day==1) Monday @elseif($timeslot->day==2) Tuesday @elseif($timeslot->day==3) Wednesday @elseif($timeslot->day==4) Thursday @elseif($timeslot->day==5) Friday @elseif($timeslot->day==6) Saturday @elseif($timeslot->day==7) Sunday @endif
               {{$timeslot->start_time}} to
               {{$timeslot->end_time}}
            </p>
        </div>
        <div class="col-lg-6">
            @foreach($academy->images as $image)
            <div class="row">
                <img src="/images/academies/{{$image->name}}">
            </div>
            @endforeach
        </div>
    </div>
@stop