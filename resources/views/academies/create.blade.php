@extends('layouts.app')
@section('content')

    <div class="row">
        <h1>Add Academy</h1>
        @if(Session::has('message'))
            <p>{{Session::get('message')}}</p>
        @endif
        <form method="POST" enctype="multipart/form-data" action="/academies/">
            {!! csrf_field() !!}
            <div class="row" style="padding-top:50px;">
                <div class="col-lg-6">
                    <p>Academy Details</p>
                    <div class="form-group">
                        <label>Academy Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Tags(Separated by comma)</label>
                        <input type="text" class="form-control" name="tags">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="number" class="form-control" name="latitude" step="any" required>
                    </div>

                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="number" class="form-control" name="longitude" step="any" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <p>Your Details</p>
                    <div class="form-group">
                        <label>Your Name</label>
                        <input type="text" class="form-control" name="contact_name">
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" class="form-control" name="email">
                    </div>

                    <div class="form-group">
                        <label>Phone number</label>
                        <input type="number" class="form-control" name="phone">
                    </div>
                </div>
            </div>
            <div class="row" id="images">
                <p>Add images</p>
                <input type="file" name="image[]" class="form-control">
            </div>
            <div style="padding:4px;text-align:center;"><a style="cursor: pointer;" onclick="addimage()">Add Another</a></div>
            <div class="row" id="timeslots">
                <p>Add Timeslots</p>
                <div class="form-group" style="display: inline-block; width:50%;">
                <label>Select Day</label>
                <select name="day[]" class="form-control">
                    <option value="1">Monday</option>
                    <option value="2">Tuesday</option>
                    <option value="3">Wednesday</option>
                    <option value="4">Thursday</option>
                    <option value="5">Friday</option>
                    <option value="6">Saturday</option>
                    <option value="7">Sunday</option>
                </select>
                    </div>
                <div class="form-group" style="display: inline; padding:50px">
                    <label>Start time</label>
                    <input type="time" name="start_time[]" class="time_box">
                    <label>End time</label>
                    <input type="time" name="end_time[]" class="time_box">
                </div>

            </div>
            <div style="padding:4px;text-align:center;"><a style="cursor: pointer;" onclick="addtimeslot()">Add Another</a></div>
            <div style="padding:10px;text-align:center;"><input class="btn btn-primary" type="submit"></div>
        </form>
    </div>
    <script src="/js/script.js"></script>
@stop