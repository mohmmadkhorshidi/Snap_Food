<?php

namespace App\Http\Controllers;


use App\Models\Slider;
use Illuminate\Http\Request;


class SliderController extends Controller
{
    public function index()
    {

        $sliders = Slider::all();

        return view('sliders.index', compact('sliders'));
    }
    public function create()
    {

        return view('sliders.create');

    }
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'link_title' => 'required|string',
            'link_address' => 'required|string',
            'text' => 'required|string',
        ]);

        Slider::create([
            'title' => $request->title,
            'text' => $request->text,
            'link_title' => $request->link_title,
            'link_address' => $request->link_address,

        ]);

        return redirect()->route('slider.index')->with('success', ' اسلایدر با موفقیت ایجاد شد');


    }
    public function edit(Slider $slider)
    {

        //  dd($slider);

        return view('sliders.edit', compact('slider'));
    }
    public function update(Request $request, Slider $slider)
    {
        //   dd($request->all(), $slider); 



        $request->validate([
            'title' => 'required|string',
            'link_title' => 'required|string',
            'link_address' => 'required|string',
            'text' => 'required|string',
        ]);

        $slider->update([
            'title' => $request->title,
            'text' => $request->text,
            'link_title' => $request->link_title,
            'link_address' => $request->link_address,

        ]);

        return redirect()->route('slider.index')->with('success', ' اسلایدر با موفقیت ویرایش شد');
    }

    public function destroy(Slider $slider)
    {

        $slider->delete();
        return redirect()->route('slider.index')->with('warning', ' اسلایدر با موفقیت حذف شد');

    }
}

