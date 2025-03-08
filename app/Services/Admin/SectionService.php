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
        return $this->sectionRepository->storeSection($data);
    }

    public function findSectionById($id)
    {
        return $this->sectionRepository->findSectionById($id);
    }

    public function updateSection($data, $id)
    {
        return $this->sectionRepository->updateSection($data , $id);
    }

    public function deleteSection($id)
    {
        return $this->sectionRepository->deleteSection($id);
    }

    /**********************************************/
    public function all_active()
    {
        return $this->sectionRepository->all_active();
    }
}
