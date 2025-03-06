<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    protected $base_view = 'admin.pages.contacts.';

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $contacts = Contact::latest()->select('id','name','email','phone','subject')->get();

            return DataTables::of($contacts)
                ->addColumn('action', function ($row) {
                    return '
                        <div class="btn-group btn-group-sm">
                            <a href="' . route('admin.contacts.show', $row->id) . '" class="btn btn-sm btn-success" title="' . trans('actions.show') . '" style="font-size: 16px;">
                                <i class="bi bi-eye"></i>
                            </a>

                            <button onclick="confirmDelete(' . $row->id . ')" class="btn btn-sm btn-danger" title="' . trans('actions.delete') . '" style="font-size: 16px;">
                                <i class="bi bi-trash3"></i>
                            </button>

                            <form id="delete-form-' . $row->id . '" action="' . route('admin.contacts.destroy', $row->id) . '" method="POST" style="display: none;">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                            </form>

                        </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view($this->base_view . 'index');
    }


    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view($this->base_view . 'show' , compact('contact'));
    }


    public function destroy(string $id)
    {
        try {
            Contact::destroy($id);
            return redirect()->back()->with('success', trans('contacts.delete_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
