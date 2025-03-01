<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\SectionInterface;
use App\Models\Section;
use Yajra\DataTables\Facades\DataTables;

class SectionRepository implements SectionInterface
{
    public function getAllSections()
    {
        $sections = Section::latest()->get();

        return DataTables::of($sections)
            ->editColumn('name', function ($row) {
                return $row->getTranslation('name', app()->getLocale());
            })
            ->editColumn('description', function ($row) {
                return $row->getTranslation('description', app()->getLocale());
            })
            ->editColumn('status', function ($row) {
                $badgeClass = $row->status === 1 ? 'badge-success' : 'badge-danger';
                $statusText = $row->status === 1 ? trans('sections.active') : trans('sections.inactive');

                return '<span class="badge ' . $badgeClass . '">' . $statusText . '</span>';
            })
            ->addColumn('action', function ($row) {
                return '
                    <div class="btn-group btn-group-sm">
                        <a href="' . route('admin.sections.edit', $row->id) . '" class="btn btn-sm btn-primary" title="' . trans('actions.edit') . '" style="font-size: 16px;">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <button onclick="confirmDelete(' . $row->id . ')" class="btn btn-sm btn-danger" title="' . trans('actions.delete') . '" style="font-size: 16px;">
                            <i class="bi bi-trash3"></i>
                        </button>

                        <form id="delete-form-' . $row->id . '" action="' . route('admin.sections.destroy', $row->id) . '" method="POST" style="display: none;">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                        </form>
                    </div>
                ';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function storeSection($data)
    {
        return Section::create($data);
    }

    public function findSectionById($id)
    {
        return Section::findOrFail($id);
    }

    public function updateSection($data, $id)
    {
        $section = $this->findSectionById($id);
        return $section->update($data);
    }

    public function deleteSection($id)
    {
        return Section::destroy($id);
    }
}
