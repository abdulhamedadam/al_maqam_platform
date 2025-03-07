<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\about_us\SaveRequest;
use App\Http\Requests\Admin\about_us\UpdateRequest;
use App\Services\Admin\AboutUsService;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    protected $base_view = 'admin.pages.about_us.';
    public function __construct(AboutUsService  $aboutUsService)
    {
        $this->aboutUsService=$aboutUsService;
    }
    /*********************************************************/
    public function index()
    {
        //  dd('ss');
        $data['all_data']=$this->aboutUsService->all();
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
            $this->aboutUsService->create($request);
            $request->session()->flash('toastMessage', trans('added_successfully'));
            return redirect()->route('admin.about_us.index');

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
        $data['record']=$this->aboutUsService->find($id)->toArray();
        return view($this->base_view.'edit',$data);
    }
    /******************************************/
    public function update(UpdateRequest $request,$id)
    {
        try {
            // dd($request);

            $this->aboutUsService->update($request,$id);
            $request->session()->flash('toastMessage', trans('added_successfully'));
            return redirect()->route('admin.about_us.index');

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

            $this->aboutUsService->delete($id);
            $request->session()->flash('toastMessage', trans('added_successfully'));
            return redirect()->route('admin.roles.index');

        } catch (\Exception $e) {
            test($e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    /***********************************************/
}
