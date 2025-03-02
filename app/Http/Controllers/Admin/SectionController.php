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
        return $this->sectionService->storeSection($request->only('name','description','status'));
    }


    public function edit(string $id)
    {
        $section = $this->sectionService->findSectionById($id);
        return view($this->base_view . 'edit', compact('section'));
    }


    public function update(SectionRequest $request, string $id)
    {
        return $this->sectionService->updateSection($request->only('name','description','status') , $id);
    }


    public function destroy(string $id)
    {
        return $this->sectionService->deleteSection($id);
    }
}
