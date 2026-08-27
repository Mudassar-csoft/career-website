<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Mail\PartnerInquiryNotificationMail;
use App\Mail\PartnershipConfirmationMail;
use App\Models\PartnerInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PartnerInquiryController extends Controller
{
    use BuildsDashboardMenu;

    public function index()
    {
        return view('dashboard.partners.index', [
            'screens' => $this->screens(),
            'active' => 'partners',
            'inquiries' => PartnerInquiry::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $inquiry = PartnerInquiry::create($request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email', 'max:255'],
            'business_interest' => ['required', 'string', 'max:255'],
            'partnership_opportunity' => ['required', 'string', 'max:5000'],
        ]));

        try {
            Mail::to(config('lead-recipients.addresses.partners', 'partners@career.edu.pk'))
                ->send(new PartnerInquiryNotificationMail($inquiry));
        } catch (\Throwable $exception) {
            report($exception);
        }

        try {
            Mail::to($inquiry->email)->send(new PartnershipConfirmationMail($inquiry));
        } catch (\Throwable $exception) {
            report($exception);
        }

        $message = 'Thank you. Your partnership request has been received.';

        if ($request->wantsJson()) {
            return response()->json(['message' => $message]);
        }

        return back()->with('status', $message);
    }
}
