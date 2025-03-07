<?php


namespace App\Repositories;


use App\Models\Slider;

class SliderRepository implements \App\Interfaces\Admin\SliderInterface
{

    public function getAllSliders()
    {
       return Slider::orderBy('id','desc')->get();
    }

    public function getAllActiveSliders()
    {
        return Slider::where('status','1')->orderBy('id','desc')->get();
    }

    public function getSlidersById($id)
    {
        return Slider::find($id);
    }

    public function createSlider($data)
    {
        return Slider::create($data);
    }

    public function updateSlider($data, $id)
    {
       $slider=$this->getSlidersById($id);
       return $slider->update($data);
    }

    public function deleteSlider($id)
    {
        $slider=$this->getSlidersById($id);
        return $slider->delete();
    }
}
