<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\ThankYouMessage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ThanksMessagesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $allData = ThankYouMessage::all();
            $counter = 0;

        return DataTables::of($allData)
            ->addColumn('id', function () use (&$counter) {
                $counter++;
                return $counter;
            })
            ->addColumn('name', function ($row) {
                return $row->name;
            })
            ->addColumn('message', function ($row) {
                return $row->message;
            })
            ->addColumn('date', function ($row) {
                return $row->date;
            })
                ->addColumn('action', function ($row) {
                    return '
                        <div class="btn-group btn-group-sm">
                            <a onclick="return confirm(\'Are You Sure To Delete?\')"  href="' . route('admin.delete_message', $row->id) . '"  class="btn btn-sm btn-danger" title="' . trans('mobile.delete') . '" style="font-size: 16px;" onclick="return confirm(\'' . trans('employees.confirm_delete') . '\')">
                                <i class="bi bi-trash3"></i>
                            </a>

                        </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashbord.admin.thanksMessages.index');
    }
    /********************************************/
    public function destroy(string $id)
    {
        try {
            $message = ThankYouMessage::find($id);
            $message->delete($id);
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.thanksMessages.index');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
