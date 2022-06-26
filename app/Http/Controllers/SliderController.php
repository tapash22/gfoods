<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all()->toArray();
        return array_reverse($sliders);
    }

    public function add(Request $request){
        $sname= $request->input('sname');
        $simage= $request->file('simage')->store('public');

        $sliders = new Slider([
            'sname'=> $sname,
            'simage'=> $simage
        ]);

        $sliders->save();

        return response()->json('slider upload successfully');

    }

}
