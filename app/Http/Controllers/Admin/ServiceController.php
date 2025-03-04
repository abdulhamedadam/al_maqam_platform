<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Services\ServiceRequest;
use App\Models\Service;
use App\Traits\ImageProcessing;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    use ImageProcessing;

    protected $base_view = 'admin.pages.services.';

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $services = Service::latest()->get();
            return DataTables::of($services)
                ->editColumn('name', function ($row) {
                    return $row->getTranslation('name', app()->getLocale());
                })
                ->editColumn('description', function ($row) {
                    return $row->getTranslation('description', app()->getLocale());
                })
                ->editColumn('meta_title', function ($row) {
                    return $row->getTranslation('meta_title', app()->getLocale());
                })
                ->editColumn('meta_description', function ($row) {
                    return $row->getTranslation('meta_description', app()->getLocale());
                })
                ->addColumn('action', function ($row) {
                    return '
                        <div class="btn-group btn-group-sm">
                            <a href="' . route('admin.services.show', $row->id) . '" class="btn btn-sm btn-success" title="' . trans('actions.show') . '" style="font-size: 16px;">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="' . route('admin.services.edit', $row->id) . '" class="btn btn-sm btn-primary" title="' . trans('actions.edit') . '" style="font-size: 16px;">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <button onclick="confirmDelete(' . $row->id . ')" class="btn btn-sm btn-danger" title="' . trans('actions.delete') . '" style="font-size: 16px;">
                                <i class="bi bi-trash3"></i>
                            </button>

                            <form id="delete-form-' . $row->id . '" action="' . route('admin.services.destroy', $row->id) . '" method="POST" style="display: none;">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                            </form>
                        </div>
                    ';
                })
                ->rawColumns(['action','description','meta_description'])
                ->make(true);
        }

        return view($this->base_view . 'index');
    }


    public function create()
    {
        return view($this->base_view . 'create');
    }


    public function store(ServiceRequest $request)
    {
        try {
            $service = Service::create($request->only(
                'name',
                'description',
                'meta_title',
                'meta_description',
            ));

            if ($request->hasFile('icon')) $this->storeFile($request, $service, 'icon');
            if ($request->hasFile('image')) $this->storeFile($request, $service, 'image');

            return redirect()->route('admin.services.index')->with('success', trans('services.store_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show(string $id)
    {
        $service = Service::findOrFail($id);
        return view($this->base_view . 'show' , compact('service'));
    }


    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view($this->base_view . 'edit' , compact('service'));
    }


    public function update(ServiceRequest $request, string $id)
    {
        try {
            $service = Service::findOrFail($id);
            $service->update($request->only(
                'name',
                'description',
                'meta_title',
                'meta_description',
            ));
            if ($request->hasFile('icon')) {
                if ($service->icon) $this->deleteFile($service->icon);
                $this->storeFile($request, $service, 'icon');
            }
            if ($request->hasFile('image')) {
                if ($service->image) $this->deleteFile($service->image);
                $this->storeFile($request, $service, 'image');
            }
            return redirect()->route('admin.services.index')->with('success', trans('services.update_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(string $id)
    {
        try {
            $service = Service::findOrFail($id);
            if ($service->icon) $this->deleteFile($service->icon);
            if ($service->image) $this->deleteFile($service->image);
            $service->delete();
            return redirect()->back()->with('success', trans('services.delete_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    private function deleteFile($filePath)
    {
        $fullPath = storage_path('app/files/') . $filePath;

        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    
    private function storeFile($request, $service, $column)
    {
        $path = $this->saveFile($request->$column, 'service' . $service->id);
        $service->update([$column => $path]);
    }
}
