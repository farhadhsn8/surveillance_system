<?php

namespace App\Http\Controllers;

use App\Models\event_action;
use Illuminate\Http\Request;

class EventActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actions = event_action::all();
        return view('back.actions.actions',compact('actions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.actions.create');
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
            'event'=>'required',
            'action'=>'required'
        ]);

        $action = new event_action();
        try {

            $action->create($request->all());
        }
        catch(Exception $ex){
            $msg1='ذخیره سازی با مشکل مواجه شد لطفا مجددا اقدام کنید';
            return redirect(route('actions.create'))->with('save_error',msg1);
        }

        $msg='ذخیره دسته بندی جدید با موفقیت انجام شد';
        return redirect(route('actions'))->with('success',$msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\event_action  $action
     * @return \Illuminate\Http\Response
     */
    public function show(event_action $action)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\event_action  $event_action
     * @return \Illuminate\Http\Response
     */
    public function edit(event_action $action)
    {
        return view('back.actions.edit',compact('action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\event_action  $event_action
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, event_action $action)
    {
        $request->validate([
            'event'=>'required',
            'action'=>'required'
        ]);

        try {
            $action->update($request->all());
        }
        catch(Exception $ex){
            $msg1='ذخیره سازی با مشکل مواجه شد لطفا مجددا اقدام کنید';
            return redirect(route('actions.edit'))->with('save_error',msg1);
        }

        $msg='ویرایش با موفقیت انجام شد';
        return redirect(route('actions'))->with('success',$msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\event_action  $event_action
     * @return \Illuminate\Http\Response
     */
    public function destroy(event_action $action)
    {
        $action->delete();
        $msg='حذف  با موفقیت انجام شد';
        return redirect(route('actions'))->with('success',$msg);
    }
}
