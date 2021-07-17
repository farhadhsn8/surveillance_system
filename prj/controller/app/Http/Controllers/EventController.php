<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Mail\LogMail;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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





//        SendEmailJob::dispatch($request->type , $request->image);
        SendEmailJob::dispatch($request->type , $request->image);
//        $response = $this->sendEmail($request);



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



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
