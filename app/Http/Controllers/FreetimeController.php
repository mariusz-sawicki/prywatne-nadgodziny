<?php

namespace App\Http\Controllers;

use App\Freetime;
use Auth;
use Illuminate\Http\Request;
use Session;
//use Illuminate\Support\Carbon;

class FreetimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');
        $freetimes=Freetime::where('active',1)->orderBy('date_from', 'asc')->get();
        return view('freetime.index')->with(['freetimes'=>$freetimes]);
        //Carbon::parse('2019-08-03 15:30:00')->diffinMinutes('2019-08-03 15:45:00');//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('freetime.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $freetime=new Freetime($request->all());
        $freetime->active=1;
        Auth::user()->freetimes()->save($freetime);
        Session::flash('freetime_created','Wyjście prywatne zostało dodane.');
        return redirect()->route('freetime.index');//.show',[$freetime]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Freetime  $freetime
     * @return \Illuminate\Http\Response
     */
    public function show(Freetime $freetime)
    {
        //$fr=$freetime::findOrFail($id);
        return view('freetime.show',['freetime'=>$freetime]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Freetime  $freetime
     * @return \Illuminate\Http\Response
     */
    public function edit(Freetime $freetime)
    {
        return view('freetime.edit',['freetime'=>$freetime]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Freetime  $freetime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Freetime $freetime)
    {
        $freetime->update($request->all());
        return redirect()->route('freetime.index');//.show',[$freetime]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Freetime  $freetime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Freetime $freetime)
    {
        $freetime->update(['active'=>0]);
        //return $freetime;
        return redirect()->route('freetime.index');
    }
}