<?php


namespace App\Services\Admin;


use App\Repositories\Admin\AboutUsRepository;
use App\Repositories\SliderRepository;
use App\Traits\ImageProcessing;

class AboutUsService
{
    use ImageProcessing;
    public function __construct(AboutUsRepository $aboutUsRepository)
    {
        $this->aboutUsRepository = $aboutUsRepository;
    }
    /**************************************************/
    public function all()
    {
      return  $this->aboutUsRepository->all();
    }
    /**************************************************/
    public function all_active()
    {
        return  $this->aboutUsRepository->all_active();
    }
    /***************************************************/
    public function find($id)
    {
        return  $this->aboutUsRepository->find($id);
    }
    /****************************************************/
    public function create($request)
    {
        $validated_data=$request->validated();
        $data['title']=['ar'=>$validated_data['title_ar'],'en'=>$validated_data['title_en']];
        $data['description']=['ar'=>$validated_data['description_ar'],'en'=>$validated_data['description_en']];
        $data['meta_title']=['ar'=>$validated_data['meta_title_ar'],'en'=>$validated_data['meta_title_en']];
        $data['meta_description']=['ar'=>$validated_data['meta_description_ar'],'en'=>$validated_data['meta_description_en']];
        $data['meta_keywords']=['ar'=>$validated_data['meta_keywords_ar'],'en'=>$validated_data['meta_keywords_en']];
        $data['our_experience']=['ar'=>$validated_data['our_experience_ar'],'en'=>$validated_data['our_experience_en']];
        $data['our_vision']=['ar'=>$validated_data['our_vision_ar'],'en'=>$validated_data['our_vision_en']];
        $data['our_mission']=['ar'=>$validated_data['our_mission_ar'],'en'=>$validated_data['our_mission_en']];
        $data['notes']=['ar'=>$validated_data['notes_ar'],'en'=>$validated_data['notes_en']];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $dataX = $this->saveImage($file, 'sliders');
            $data['image'] = $dataX;
        }

      //  dd($data);
        return $this->aboutUsRepository->create($data);
    }
    /******************************************************/
    public function update($request,$id)
    {
        $validated_data=$request->validated();
        $data['title']=['ar'=>$validated_data['title_ar'],'en'=>$validated_data['title_en']];
        $data['description']=['ar'=>$validated_data['description_ar'],'en'=>$validated_data['description_en']];
        $data['meta_title']=['ar'=>$validated_data['meta_title_ar'],'en'=>$validated_data['meta_title_en']];
        $data['meta_description']=['ar'=>$validated_data['meta_description_ar'],'en'=>$validated_data['meta_description_en']];
        $data['meta_keywords']=['ar'=>$validated_data['meta_keywords_ar'],'en'=>$validated_data['meta_keywords_en']];
        $data['our_experience']=['ar'=>$validated_data['our_experience_ar'],'en'=>$validated_data['our_experience_en']];
        $data['our_vision']=['ar'=>$validated_data['our_vision_ar'],'en'=>$validated_data['our_vision_en']];
        $data['our_mission']=['ar'=>$validated_data['our_mission_ar'],'en'=>$validated_data['our_mission_en']];
        $data['notes']=['ar'=>$validated_data['notes_ar'],'en'=>$validated_data['notes_en']];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $dataX = $this->saveImage($file, 'sliders');
            $data['image'] = $dataX;
        }

        //dd($data);
        return $this->aboutUsRepository->update($data,$id);
    }
    /*****************************************************/
    public function delete($id)
    {
        return $this->aboutUsRepository->delete($id);
    }
    /*****************************************************/
    public function get_first_active()
    {
        return $this->aboutUsRepository->get_first_active();
    }
}
