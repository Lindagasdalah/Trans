<?php

namespace App\Http\Controllers;


use App\Stop;
use Illuminate\Http\Request;

class StopController extends Controller
{
    public function index() {
        $stops = Stop::all();
        $latlng = Stop::get(['stop_name','stop_lat','stop_lon','transport_id']);

        return view('admin.stops.index',['stops'=>$stops,'latlng'=>json_encode($latlng)]);
    }

    public function create() {

        return view('admin.stops.create');

    }
    public function getStopsByTransport(Request $request)
    {
        $transport_id = $request->transport_id;
        $s= Stop::where('transport_id',$transport_id)->get();
        $html='';
        foreach ($s as $stop){
            $html.='<option value="'.$stop->id.'">'.$stop->stop_name.'</option>';
        }
        return response()->json(['html',$html]);


    }
    public function store(Request $request) {

        $this->validate($request, [
            'stop_name'=> 'required',
            'stop_lat'=> 'required',
            'stop_lon'=> 'required'
        ]);

        $stop = new Stop();

        $stop->stop_name = $request->stop_name;
        $stop->stop_lat = $request->stop_lat;
        $stop->stop_lon = $request->stop_lon;
        $stop->transport_id = $request->transport_id;
        $stop->save();
        return redirect()->route('stops.show', $stop);

    }

    public function show($id) {


        $stop = Stop::findOrFail($id);
        $latlng = Stop::get(['stop_name','stop_lat','stop_lon']);

      // return view('admin.stops.show',['stop'=>$stop,'latlng'=>json_encode($latlng)]);
       return view('admin.stops.show', compact('stop' ,'latlng'));

    }

    public function edit($id) {

        $stop = Stop::findOrFail($id);

        return view('admin.stops.edit', compact('stop'));

    }

    public function update(Request $request, $id) {

        $stop = Stop::findOrFail($id);

        $stop->fill($request->all());
        $stop->save();

        return redirect()->route('stops.show', $stop->id);

    }

    public function delete($id) {

        $stop = Stop::findOrFail($id);
        $stop->delete();

        return redirect()->route('stops.index');

    }



}