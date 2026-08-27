<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Mail\ExamInquiryNotificationMail;
use App\Mail\ExamSchedulingConfirmationMail;
use App\Models\ExamInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class ExamInquiryController extends Controller
{
    use BuildsDashboardMenu;

    public function index()
    {
        return view('dashboard.exams.index', [
            'screens' => $this->screens(),
            'active' => 'exams',
            'inquiries' => ExamInquiry::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $inquiry = ExamInquiry::create($request->validate([
            'exam_provider' => ['required', Rule::in(['Kryterion', 'Pearson VUE', 'PSI'])],
            'exam_title' => ['required', 'string', 'max:255'],
            'exam_code' => ['nullable', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'preferred_date' => ['required', 'date'],
            'message' => ['nullable', 'string', 'max:5000'],
        ]));

        try {
            Mail::to(config('lead-recipients.addresses.exams', 'exams@career.edu.pk'))
                ->send(new ExamInquiryNotificationMail($inquiry));
        } catch (\Throwable $exception) {
            report($exception);
        }

        try {
            Mail::to($inquiry->email)->send(new ExamSchedulingConfirmationMail($inquiry));
        } catch (\Throwable $exception) {
            report($exception);
        }

        $message = 'Thank you. Your exam scheduling request has been received.';

        if ($request->wantsJson()) {
            return response()->json(['message' => $message]);
        }

        return back()->with('status', $message);
    }
}
