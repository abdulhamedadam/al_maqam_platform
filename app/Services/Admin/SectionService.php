<?php

namespace App\Services\Admin;

use App\Repositories\Admin\SectionRepository;

class SectionService
{
    protected $sectionRepository;
    protected $base_view = 'admin.pages.sections.';

    public function __construct(SectionRepository $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
    }

    public function getAllSections()
    {
        return $this->sectionRepository->getAllSections();
    }

    public function storeSection($data)
    {
        try {
            $this->sectionRepository->storeSection($data);
            return redirect()->route('admin.sections.index')->with('success', trans('sections.store_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function findSectionById($id)
    {
        return $this->sectionRepository->findSectionById($id);
    }

    public function updateSection($data, $id)
    {
        try {
            $this->sectionRepository->updateSection($data , $id);
            return redirect()->route('admin.sections.index')->with('success', trans('sections.update_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function deleteSection($id)
    {
        try {
            $this->sectionRepository->deleteSection($id);
            return redirect()->back()->with('success', trans('sections.delete_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**********************************************/
    public function all_active()
    {
        return $this->sectionRepository->all_active();
    }
}
