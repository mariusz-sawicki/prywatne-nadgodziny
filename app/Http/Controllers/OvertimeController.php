<?php

namespace App\Http\Controllers;

use App\Overtime;
use Illuminate\Http\Request;
use Auth;
use Session;
use Carbon\Carbon;

class OvertimeController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');
        $overtimes=Overtime::where('active',1)->orderBy('date_from', 'asc')->get();
        return view('overtime.index')->with(['overtimes'=>$overtimes]);
        //Carbon::parse('2019-08-03 15:30:00')->diffinMinutes('2019-08-03 15:45:00');//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('overtime.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $overtime=new Overtime($request->all());
        $overtime->active=1;
        Auth::user()->freetimes()->save($overtime);
        Session::flash('overtime_created','Nadgodziny zostały dodane.');
        return redirect()->route('overtime.index');//,[$overtime]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Overtime  $overtime
     * @return \Illuminate\Http\Response
     */
    public function show(Overtime $overtime)
    {
        //$fr=$overtime::findOrFail($id);
        return view('overtime.show',['overtime'=>$overtime]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Overtime  $overtime
     * @return \Illuminate\Http\Response
     */
    public function edit(Overtime $overtime)
    {
        return view('overtime.edit',['overtime'=>$overtime]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Overtime  $overtime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Overtime $overtime)
    {
        //return $request->date_date. ' '.$request->date_from;
        //$request_change=$request->all();//date_from=$request->date_date.' '.$request->date_from;
        //return $request->date_date;
        $date_from_r=Carbon::create($request->date_date.' '.$request->date_from)->format('Y-m-d H:i:s');
        $date_to_r=$request->date_date.' '.$request->date_to.':00';//->format('Y-m-d H:i:s');
        //return $request_change;
        $request->merge(['date_from'=>$date_from_r, 'date_to'=>$date_to_r]);
        //$request->merge([]);
        //return $request->all();
        $overtime->update($request->all());//,['date_from'=>$date_from_r,'date_to'=>$date_to_r]);
       return redirect()->route('overtime.index');//.show',[$overtime]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Overtime  $overtime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Overtime $overtime)
    {
        $overtime->update(['active'=>0]);
        //return $overtime;
        return redirect()->route('overtime.index');
    }
}
