<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report()
    {
        return view('mobile.report');
    }


    public function storeReport(Request $request){
        // dd($request->all());

        $validated = $request->validate([
            'imei1' => 'required|digits:15',
            'imei2' => 'required|digits:15',
            'phoneName' => 'required|string|max:255',
            'phoneColor' => 'required|string|max:255',
            'contactNumber' => 'required|digits:11',
            'governorate' => 'required|string',
            'city' => 'required|string|max:255',
        ]);

        $data = [
            'imei1' => $validated['imei1'],
            'imei2' => $validated['imei2'],
            'phone_name' => $validated['phoneName'],
            'phone_color' => $validated['phoneColor'],
            'contact_number' => $validated['contactNumber'],
            'governorate' => $validated['governorate'],
            'city' => $validated['city'],
        ];
        // dd($data);
        Report::create($data);

        return response()->json([
            'message' => 'تم الإبلاغ بنجاح، يرجى زيارة الموقع لاحقاً للبحث عن الهاتف',
        ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'imei1' => 'required|digits:15',
            'imei2' => 'required|digits:15',
        ]);

        $data = Report::where('imei1', $request->imei1)
                    ->where('imei2', $request->imei2)
                    ->first();

        if ($data) {
            return response()->json($data);
        } else {
            return response()->json(['message' => 'هذا الهاتف غير موجود'], 404);
        }
    }

    public function markAsFound(Request $request)
    {
        $request->validate([
            'imei1' => 'required|digits:15',
        ]);

        $report = Report::where('imei1', $request->imei1)->first();

        if ($report) {
            $report->found = true;
            $report->save();

            return response()->json([
                'message' => 'تم استرجاع الهاتف بنجاح',
                'status' => 200
            ]);
        }

        return response()->json([
            'message' => 'هذا الهاتف غير موجود',
            'status' => 404
        ], 404);
    }

    public function foundPhones()
    {
        $foundPhonesList = Report::where('found', true)->get(['phone_name', 'phone_color', 'governorate', 'city']);

        return response()->json($foundPhonesList);
    }
}
