<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;

class SliderController extends Controller
{
    public function index()
    {
        return view('admin.slider.index');
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function add(SliderFormRequest $request)
    {
        $validatedinfo = $request->validated();

        $slider = new Slider();

        if ($request->hasFile('image')) {
            $uploadpath = 'uploads/slider/';
            $image = $request->file('image');
            $imageext = $image->getClientOriginalExtension();
            $imagename = time() . '.' . $imageext;
            $image->move($uploadpath, $imagename);
            $imagepathname = $uploadpath . $imagename;
            $slider->image = $imagepathname;
        }

        $slider->strongtitle = $validatedinfo['strongtitle'];
        $slider->title = $validatedinfo['title'];
        $slider->description = $validatedinfo['description'];
        $slider->link = $validatedinfo['link'];
        $slider->status = $request->status == true ? '1' : '0';
        $save = $slider->save();

        if ($save) {
            return redirect()->route('indexslider')->with('success', 'New Slider added successfully');
        } else {
            return back()->with('fail', 'Somthing went wrong, please try again');
        }
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $slider)
    {
        $request->validate([
            'image'=> [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png'
            ],
            'strongtitle'=> [
                'nullable',
                'string'
            ],
            'title'=> [
                'nullable',
                'string'
            ],
            'description'=> [
                'nullable',
                'string'
            ],

            'link'=> [
                'nullable',
                'string'
            ],
        ]);

        $slider = Slider::findOrFail($slider);
        
        if ($request->hasFile('image')) {
            $uploadpath = 'uploads/slider/';
            if (File::exists($slider->image)) {
                File::delete($slider->image);
            }
            $image = $request->file('image');
            $imageext = $image->getClientOriginalExtension();
            $imagename = time() . '.' . $imageext;
            $image->move($uploadpath, $imagename);
            $imagepathname = $uploadpath . $imagename;
            $slider->image = $imagepathname;
        }else {
            $slider->image = $slider->image;
        }

        $slider->strongtitle = $request['strongtitle'];
        $slider->title = $request['title'];
        $slider->description = $request['description'];
        $slider->link = $request['link'];
        $slider->status = $request->status == true ? '1' : '0';
        $update = $slider->update();

        if ($update) {
            return redirect()->route('indexslider')->with('success', 'Slider updated successfully');
        } else {
            return back()->with('fail', 'Somthing went wrong, please try again');
        }
    }

}
