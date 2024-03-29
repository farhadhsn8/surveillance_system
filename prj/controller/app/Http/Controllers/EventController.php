<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Mail\LogMail;
use App\Models\Event;
use App\Models\event_action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{

    public function index()
    {
        $events = Event::all();
        return view('back.events.events',compact('events'));
    }

    public function no_action()
    {
        $events = Event::where('done',false)->get();
        return view('back.events.events',compact('events'));
    }


    public function show_image($image)
    {
        return view('back.events.show_image',compact('image'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'type'=>['required'],
            'image'=>['required'],
        ]);

        $event = new Event;

        $event->create([
            'type'=>$request->type,
            'image' => $request->image,
            'done' => false,
        ]);

        $content = event_action::where('event',$request->type)->first()->action;

        SendEmailJob::dispatch($request->type , $request->image , $content);

        return response()->json([
            'message' =>$request->type.'Event created successfully'
        ] , 201);



    }


    public function sendEmail($request)
    {
        Mail::to('farhad@gmail.com')->send(new LogMail($request->type));
        return response()->json([
            'message' =>$request->type.'Event created successfully'
        ] , 201);
    }




    public function date_page()
    {
        return view('back.events.date_events');
    }



    public function date_query(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $events = Event::whereBetween('created_at', [$from, $to])->get();
        return view('back.events.events',compact('events'));
    }





    public function destroy(Event $event)
    {
        $event->delete();
        if ($this->removeImage($event->image)){
            $msg='  با موفقیت حذف شد';
            return redirect(route('events'))->with('success',$msg);
        }
    }


    public function removeImage($img)
    {
        if(file_exists(public_path('images/'.$img))){
            unlink(public_path('images/'.$img));
            return true;
        }
        return false;
    }
}
