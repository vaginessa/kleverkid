function addimage() {
    $('#images').append('<input type="file" name="image[]" class="form-control">');
}

function addtimeslot() {
    $('#timeslots').append('<div class="form-group" style="display: inline-block; width:50%;">'+
        '<label>Select Day</label>'+
    '<select name="day[]" class="form-control">'+
        '<option value="1">Monday</option><option value="2">Tuesday</option> <option value="3">Wednesday</option> <option value="4">Thursday</option> <option value="5">Friday</option> <option value="6">Saturday</option> <option value="7">Sunday</option>'+
        '</select>'+
        '</div>'+
        '<div class="form-group" style="display: inline; padding:50px">'+
        '<label>Start time</label>'+
    '<input type="time" name="start_time[]" class="time_box">'+
        '<label>End time</label>'+
    '<input type="time" name="end_time[]" class="time_box">'+
        '</div>');
}