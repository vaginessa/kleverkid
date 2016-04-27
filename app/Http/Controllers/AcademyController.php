<?php

namespace App\Http\Controllers;

use App\Academy;
use App\AcademyImage;
use App\Tag;
use App\Timeslot;
use Illuminate\Http\Request;

use App\Http\Requests;

class AcademyController extends Controller
{

    public function index() {
        $academies=Academy::all();
        return view('academies.index',compact('academies'));
    }
    public function create() {
        return view('academies.create');
    }

    public function store(Request $request) {
        if($request->name=='') {
            return redirect('/academies/new')->with('message','Academy name required');
            // I know how to use a validator just dont have enough time to add it
        }
        $academy=new Academy;
        $academy->name=$request->name;
        $academy->email=$request->email;
        $academy->phone=$request->phone;
        $academy->description=$request->description;
        $academy->latitude=$request->latitude;
        $academy->longitude=$request->longitude;
        $academy->contact_name=$request->contact_name;
        $academy->save();
        $i=0;
        if($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {

                $image_name = 'academy_' . $academy->id .'a'. $i . '.jpg';
                $image->move(public_path() . '/images/academies/', $image_name);

                $academy_image = new AcademyImage;
                $academy_image->name = $image_name;
                $academy_image->academy_id = $academy->id;
                $academy_image->save();

                $i++;
            }
        }
        $tags=explode(',',$request->tags);
        foreach($tags as $tag) {
            $count_tags=Tag::where('name','=',$tag)->get();
            if(count($count_tags)<1) {
                $new_tag = new Tag;
                $new_tag->name = $tag;
                $new_tag->save();
                $academy->tags()->attach($new_tag);
            }
            else {
                $academy->tags()->attach($count_tags->first());
            }
        }
        $i=0;
        foreach($request->day as $day) {
            $timeslot_new=new Timeslot;
            $timeslot_new->start_time=$request->start_time[$i];
            $timeslot_new->end_time=$request->end_time[$i];
            $timeslot_new->day=$day;
            $timeslot_new->academy_id=$academy->id;
            $timeslot_new->save();
            $i++;
        }
       return redirect('/academies/new')->with('message','Academy added');
    }

    public function details($id) {
        $academy=Academy::find($id);
        return view('academies.details',compact('academy'));
    }

}
