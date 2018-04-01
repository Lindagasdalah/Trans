<?php


namespace App\Http\Controllers;
use App\Ligne;
use App\StopTime;
use App\Stop;
use App\RouteStops;
use App\Trip;
use Illuminate\Http\Request;


class StopTimeController extends Controller
{
    public function index() {

        $stop_times = StopTime::all();
       // $stops = Stop::all();
        $routeStops = RouteStops::all();
        $trips= Trip::all();
        $lignes=Ligne::all();


        return view('admin.stops_time.index', compact('stop_times', 'routeStops' , 'trips','lignes'));

    }

    public function create() {

        return view('admin.stops_time.create');

    }

    public function store(Request $request) {

        $this->validate($request, [
            'arrived_time'=> 'required',
            'departure_time'=> 'required',
        ]);

        $stop_time = new StopTime();
        $stop_time->arrived_time = $request->arrived_time;
        $stop_time->departure_time = $request->departure_time;
        $stop_time->trip_id = $request->trip_id;
        $stop_time->stoproute_id= $request->stoproute_id;

        $stop_time->save();

        return redirect()->route('stops_time.show', $stop_time);


    }

    public function show($id) {


        $stop_time = stopTime::findOrFail($id);

        return view('admin.stops_time.show', compact('stop_time'));

    }

    public function edit($id) {

        $stop_time = stopTime::findOrFail($id);

        return view('admin.stops_time.edit', compact('stop_time'));

    }

    public function update(Request $request, $id) {

        $stop_time = StopTime::findOrFail($id);

        $stop_time->fill($request->all());
        $stop_time->save();

        return redirect()->route('stops_time.show', $stop_time->id);

    }

    public function delete($id) {

        $stop_time = StopTime::findOrFail($id);
        $stop_time->delete();

        return redirect()->route('stops_time.index');

    }

}