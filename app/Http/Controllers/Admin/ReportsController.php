<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ReportsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $allData = Report::all();
            $counter = 0;

        return DataTables::of($allData)
            ->addColumn('id', function () use (&$counter) {
                $counter++;
                return $counter;
            })
            ->addColumn('imei1', function ($row) {
                return $row->imei1;
            })
            ->addColumn('imei2', function ($row) {
                return $row->imei2;
            })
            ->addColumn('phone_name', function ($row) {
                return $row->phone_name;
            })
            ->addColumn('phone_color', function ($row) {
                return $row->phone_color;
            })
            ->addColumn('contact_number', function ($row) {
                return $row->contact_number;
            })
            ->addColumn('found', function ($row) {
                return $row->found ? 'Yes' : 'No';
            })
                ->addColumn('action', function ($row) {
                    return '
                        <div class="btn-group btn-group-sm">
                            <a onclick="return confirm(\'Are You Sure To Delete?\')"  href="' . route('admin.delete_report', $row->id) . '"  class="btn btn-sm btn-danger" title="' . trans('mobile.delete') . '" style="font-size: 16px;" onclick="return confirm(\'' . trans('employees.confirm_delete') . '\')">
                                <i class="bi bi-trash3"></i>
                            </a>

                        </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashbord.admin.reports.index');
    }
    /********************************************/
    public function destroy(string $id)
    {
        try {
            $report = Report::find($id);
            $report->delete($id);
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.reports.index');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
