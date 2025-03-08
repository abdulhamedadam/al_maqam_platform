<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Sections\SectionRequest;
use App\Services\Admin\SectionService;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    protected $sectionService;
    protected $base_view = 'admin.pages.sections.';

    public function __construct(SectionService $sectionService)
    {
        $this->sectionService = $sectionService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->sectionService->getAllSections();
        }
        return view($this->base_view . 'index');
    }


    public function create()
    {
        return view($this->base_view . 'create');
    }


    public function store(SectionRequest $request)
    {
        try {
            $this->sectionService->storeSection($request->only('name','description','status'));
            return redirect()->route('admin.sections.index')->with('success', trans('sections.store_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function edit(string $id)
    {
        $section = $this->sectionService->findSectionById($id);
        return view($this->base_view . 'edit', compact('section'));
    }


    public function update(SectionRequest $request, string $id)
    {
        try {
            $this->sectionService->updateSection($request->only('name','description','status') , $id);
            return redirect()->route('admin.sections.index')->with('success', trans('sections.update_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(string $id)
    {
        try {
            $this->sectionService->deleteSection($id);
            return redirect()->back()->with('success', trans('sections.delete_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
