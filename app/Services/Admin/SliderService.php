<?php


namespace App\Services\Admin;


use App\Repositories\Admin\SectionRepository;
use App\Repositories\SliderRepository;
use App\Traits\ImageProcessing;

class SliderService
{
    use ImageProcessing;
    public function __construct(SliderRepository $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }
    /************************************************/
    public function getAllSlider()
    {
        return $this->sliderRepository->getAllSliders();
    }
    /************************************************/
    public function getAllActiveSliders()
    {
        return $this->sliderRepository->getAllActiveSliders();

    }
    /***************************************************/
    public function getSliderById($id)
    {
        return $this->sliderRepository->getSlidersById($id);
    }
    /*****************************************************/
    public function createSlider($request)
    {

        $validated_data=$request->validated();
        $data['title']=['ar'=>$validated_data['title_ar'],'en'=>$validated_data['title_en']];
        $data['description']=['ar'=>$validated_data['description_ar'],'en'=>$validated_data['description_en']];
        $data['meta_title']=['ar'=>$validated_data['meta_title_ar'],'en'=>$validated_data['meta_title_en']];
        $data['meta_description']=['ar'=>$validated_data['meta_description_ar'],'en'=>$validated_data['meta_description_en']];
        $data['meta_keywords']=['ar'=>$validated_data['meta_keywords_ar'],'en'=>$validated_data['meta_keywords_en']];
        $data['button_text']=['ar'=>$validated_data['button_text_ar'],'en'=>$validated_data['button_text_en']];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $dataX = $this->saveImage($file, 'sliders');
            $data['image'] = $dataX;
        }

        //dd($data);
        return $this->sliderRepository->createSlider($data);
    }
    /******************************************************/
    public function updateSlider($request,$id)
    {
        $validated_data=$request->validated();
        $data['title']=['ar'=>$validated_data['title_ar'],'en'=>$validated_data['title_en']];
        $data['description']=['ar'=>$validated_data['description_ar'],'en'=>$validated_data['description_en']];
        $data['meta_title']=['ar'=>$validated_data['meta_title_ar'],'en'=>$validated_data['meta_title_en']];
        $data['meta_description']=['ar'=>$validated_data['meta_description_ar'],'en'=>$validated_data['meta_description_en']];
        $data['meta_keywords']=['ar'=>$validated_data['meta_keywords_ar'],'en'=>$validated_data['meta_keywords_en']];
        $data['button_text']=['ar'=>$validated_data['button_text_ar'],'en'=>$validated_data['button_text_en']];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $dataX = $this->saveImage($file, 'sliders');
            $data['image'] = $dataX;
        }
        //dd($data);
        return $this->sliderRepository->updateSlider($data,$id);
    }
    /*******************************************************/
    public function deleteSlider($id)
    {
        return $this->sliderRepository->deleteSlider($id);
    }

}
