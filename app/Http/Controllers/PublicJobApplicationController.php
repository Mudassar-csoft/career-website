<?php

namespace App\Http\Controllers;

use App\Mail\JobApplicationNotificationMail;
use App\Models\JobApplication;
use App\Models\JobOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class PublicJobApplicationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_offer_id' => ['nullable', 'integer', 'exists:job_offers,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'linkedin_url' => ['nullable', 'url:http,https', 'max:2048'],
            'institution' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'qualification' => ['nullable', 'string', 'max:255'],
            'document' => ['required', 'file', 'mimes:pdf,doc,docx', 'extensions:pdf,doc,docx', 'max:5120'],
        ]);

        $job = ! empty($validated['job_offer_id'])
            ? JobOffer::findOrFail($validated['job_offer_id'])
            : null;
        $document = $request->file('document');
        $documentPath = $document->store('job-placement-documents', 'local');

        if ($documentPath === false) {
            throw ValidationException::withMessages([
                'document' => 'We could not save your CV. Please try again.',
            ]);
        }

        try {
            $application = JobApplication::create([
                ...Arr::except($validated, ['document']),
                'job_title' => $job?->title,
                'document_path' => $documentPath,
                'document_name' => $document->getClientOriginalName(),
            ]);
        } catch (\Throwable $exception) {
            Storage::disk('local')->delete($documentPath);

            throw $exception;
        }

        try {
            Mail::to(config('lead-recipients.sources.job placement', config('lead-recipients.default')))
                ->send(new JobApplicationNotificationMail($application));
        } catch (\Throwable $exception) {
            report($exception);
        }

        $message = $job
            ? 'Thank you. Your application for '.$job->title.' has been received.'
            : 'Thank you. Your CV has been received for future job opportunities.';

        if ($request->wantsJson()) {
            return response()->json(['message' => $message], 201);
        }

        return redirect()->route('job-placement', $job ? ['job' => $job->id] : [])
            ->with('status', $message)
            ->withFragment('job-placement-form');
    }
}
