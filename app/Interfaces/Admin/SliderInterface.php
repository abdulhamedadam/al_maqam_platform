<?php


namespace App\Interfaces\Admin;


interface SliderInterface
{
  public function getAllSliders();
  public function getAllActiveSliders();
  public function getSlidersById($is);
  public function createSlider($data);
  public function updateSlider($data,$id);
  public function deleteSlider($id);
}
