<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\slider\SaveRequest;
use App\Http\Requests\Admin\slider\UpdateRequest;
use App\Interfaces\BasicRepositoryInterface;
use App\Models\Admin;
use App\Services\Admin\SliderService;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $base_view = 'admin.pages.sliders.';
    public function __construct(SliderService $sliderService)
    {
       $this->sliderService=$sliderService;
    }
    /*********************************************************/
    public function index()
    {
      //  dd('ss');
        $data['sliders']=$this->sliderService->getAllSlider();
        return view($this->base_view.'index',$data);
    }
    /*********************************************************/
    /******************************************/
    public function create()
    {
        return view($this->base_view.'create');
    }

    /****************************************/
    public function store(SaveRequest $request)
    {
        try {
            $this->sliderService->createSlider($request);
            $request->session()->flash('toastMessage', trans('added_successfully'));
            return redirect()->route('admin.sliders.index');

        } catch (\Exception $e) {
            test($e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /****************************************/
    public function show(string $id)
    {
        //
    }

    /****************************************/
    public function edit(string $id)
    {
        $data['record']=$this->sliderService->getSliderById($id)->toArray();
        return view($this->base_view.'edit',$data);
    }
    /******************************************/
    public function update(UpdateRequest $request,$id)
    {
        try {
            // dd($request);

            $this->sliderService->updateSlider($request,$id);
            $request->session()->flash('toastMessage', trans('added_successfully'));
            return redirect()->route('admin.sliders.index');

        } catch (\Exception $e) {
            test($e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /*********************************************/
    public function destroy(Request $request,$id)
    {
        try {
            // dd($request);

            $this->sliderService->deleteSlider($id);
            $request->session()->flash('toastMessage', trans('added_successfully'));
            return redirect()->route('admin.roles.index');

        } catch (\Exception $e) {
            test($e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    /***********************************************/
    public function change_status(Request $request)
    {
        $slider = $this->sliderService->getSliderById($request->id);
        $slider->status = $request->status;
        $slider->save();

        return response()->json(['message' => trans('users.status_updated')]);
    }
    /**********************************************/

}
