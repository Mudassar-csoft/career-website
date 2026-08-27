<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Mail\CoworkingConfirmationMail;
use App\Mail\CoworkingInquiryNotificationMail;
use App\Models\CoworkingInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CoworkingInquiryController extends Controller
{
    use BuildsDashboardMenu;

    public function index()
    {
        return view('dashboard.coworking.index', [
            'screens' => $this->screens(),
            'active' => 'coworking',
            'inquiries' => CoworkingInquiry::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $inquiry = CoworkingInquiry::create($request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'city' => ['required', 'string', 'max:255'],
            'interested_in' => ['required', 'string', 'max:255'],
            'number_of_persons' => ['required', 'integer', 'min:1', 'max:10000'],
        ]));

        try {
            Mail::to(config('lead-recipients.addresses.coworking', 'coworking@career.edu.pk'))
                ->send(new CoworkingInquiryNotificationMail($inquiry));
        } catch (\Throwable $exception) {
            report($exception);
        }

        try {
            Mail::to($inquiry->email)->send(new CoworkingConfirmationMail($inquiry));
        } catch (\Throwable $exception) {
            report($exception);
        }

        $message = 'Thank you. Your coworking request has been received.';

        if ($request->wantsJson()) {
            return response()->json(['message' => $message]);
        }

        return back()->with('status', $message);
    }
}
