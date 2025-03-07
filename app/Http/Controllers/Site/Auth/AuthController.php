<?php

namespace App\Http\Controllers\Site\Auth;

use App\Enums\TeacherStatus;
use App\Http\Controllers\Controller;
use App\Models\TeacherDetail;
use App\Models\User;
use App\Services\Admin\SectionService;
use App\Traits\ImageProcessing;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use ImageProcessing;

    public function showRegistrationForm(SectionService $sectionService)
    {
        $data['sections']=$sectionService->all_active();
       // dd($data['sections']);
        return view('site.pages.join-us',$data);
    }

    protected function validator(array $data)
    {
        //dd(request());
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'register_type' => 'required|string|in:student,teacher',
            'phone' => 'required|string|max:20',
            //'birthday' => 'required|date',
            'gender' => 'required|string|in:m,f',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
        ];

        if ($data['register_type'] === 'teacher') {
            $rules['admission'] = 'required|array';
            $rules['admission.*'] = 'string';
            $rules['education'] = 'nullable|string|max:255';
            $rules['azhary'] = 'required|string|in:yazhar,nazhar';
            $rules['license'] = 'required|string|in:ylicense,nlicense';
            $rules['other_license'] = 'required|string|in:yotherlicense,notherlicense';
            $rules['other_licenses_details'] = 'nullable|string|max:255';
            $rules['teaching_online'] = 'required|string|in:yteachingonline,nteachingonline';
            $rules['comm_platform'] = 'required|array';
            $rules['comm_platform.*'] = 'string';
            $rules['teaching_kids'] = 'required|string|in:yteachingkids,nteachingkids';
            $rules['teaching'] = 'required|array';
            $rules['teaching.*'] = 'string';
            $rules['hours_working'] = 'required|array';
            $rules['hours_working.*'] = 'string';
            $rules['other_working_hours'] = 'nullable|string';
            $rules['work_shift'] = 'required|array';
            $rules['work_shift.*'] = 'string';
            $rules['fri_sat'] = 'required|string|in:yfri-sat,nfri-sat';
            $rules['audio'] = 'nullable|mimes:mp3,wav|max:10240';
            $rules['files'] = 'required|max:10240';
        }

        return Validator::make($data, $rules);
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
        //    $request->merge([
        //        'birthday' => Carbon::createFromFormat('d/m/Y', $request->birthday)->format('Y-m-d')
        //    ]);
            // dd($request->all());
            $user = $this->create($request->all());

            if ($request->register_type === 'teacher') {
                $this->createTeacherDetails($user->id, $request->all());
                return redirect()->back()->with('warning', 'Wait For Admin Approval');
            }

            return redirect()->route('user.login')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred during registration: ' . $e->getMessage())
                ->withInput();
        }
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['register_type'],
            'phone' => $data['phone'],
            //'birthday' => $data['birthday'],
            'gender' => $data['gender'],
            'country' => $data['country'],
            'state' => $data['state'],
        ]);
    }

    protected function createTeacherDetails($userId, array $data)
    {
        $audioPath = isset($data['audio']) && $data['audio'] instanceof \Illuminate\Http\UploadedFile ? $this->saveFile($data['audio'], 'user' . $userId) : null;
        $cvPath = isset($data['files']) && $data['files'] instanceof \Illuminate\Http\UploadedFile ? $this->saveFile($data['files'], 'user' . $userId) : null;
        TeacherDetail::create([
            'user_id' => $userId,
            'admission_terms' => json_encode($data['admission']),
            'education' => $data['education'],
            'azhar' => $data['azhary'],
            'quran_license' => $data['license'],
            'other_license' => $data['other_license'],
            'other_license_details' => $data['other_licenses_details'],
            'teaching_online' => $data['teaching_online'],
            'communication_platforms' => json_encode($data['comm_platform']),
            'teaching_kids' => $data['teaching_kids'],
            'teaching_subjects' => json_encode($data['teaching']),
            'working_hours' => json_encode($data['hours_working']),
            'other_working_hours' => $data['other_working_hours'],
            'work_shifts' => json_encode($data['work_shift']),
            'fri_sat_work' => $data['fri_sat'],
            'audio_recording' => $audioPath,
            'cv_summary' => $cvPath,
        ]);
    }


    public function showLoginForm()
    {
        return view('site.pages.login');
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => ['required', 'string', 'email'],
    //         'password' => ['required', 'string'],
    //     ]);
    //     // dd($credentials);
    //     // dd($request->all());
    //     try {

    //         if (Auth::attempt($credentials)) {
    //             $request->session()->regenerate();
    //             $user = Auth::user();
    //             switch ($user->role) {
    //                 case 'teacher':
    //                     return redirect()->route('teacher_profile')->with('success', 'Login successful!');
    //                 case 'student':
    //                 default:
    //                     return redirect()->route('student_profile')->with('success', 'Login successful!');
    //             }
    //             // return redirect()->intended(route('user.home'))->with('success', 'Login successful!');
    //         }

    //         return back()->withErrors([
    //             'email' => 'The provided credentials do not match our records.',
    //         ])->onlyInput('email');
    //     } catch (\Exception $e) {
    //         return back()->with('error', 'An error occurred during login: ' . $e->getMessage())
    //             ->onlyInput('email');
    //     }
    // }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        try {
            if (Auth::guard('web')->attempt($credentials)) {
                $user = Auth::guard('web')->user();

                if ($user->role === 'teacher' && $user->teacher->status !== TeacherStatus::Approved) {
                    Auth::guard('web')->logout();
                    return redirect()->back()->with('error', 'Your account is not approved yet. Please wait for approval.');
                }

                $request->session()->regenerate();

                switch ($user->role) {
                    case 'teacher':
                        return redirect()->route('user.teacher_profile')->with('success', 'Login successful!');
                    case 'student':
                        return redirect()->route('user.student_profile')->with('success', 'Login successful!');
                    default:
                        return redirect()->route('user.student_profile')->with('success', 'Login successful!');
                }
            } else {
                return back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ])->onlyInput('email');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->with('error', 'An error occurred during login. Please try again.')
                ->onlyInput('email');
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('user.home')->with('success', 'Logout successful!');
        } catch (\Exception $e) {
            return redirect()->route('user.home')->with('error', 'An error occurred during logout: ' . $e->getMessage());
        }
    }

    public function showProfile()
    {
        try {
            $user = Auth::user();

            if (!$user) {
                return redirect()->route('user.login')->with('error', 'You must be logged in to view your profile.');
            }

            if ($user->role === 'teacher') {
                $user->load('teacherDetails');
                return redirect()->route('user.teacher-profile', compact('user'));
            }

            return redirect()->route('user.student-profile', compact('user'));
        } catch (\Exception $e) {
            return redirect()->route('user.home')->with('error', 'An error occurred while loading the profile: ' . $e->getMessage());
        }
    }
}
