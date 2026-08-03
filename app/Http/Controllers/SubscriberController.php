<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'source' => ['nullable', 'string', 'max:255'],
        ]);

        if (empty($validated['email']) && empty($validated['phone'])) {
            $message = 'Please provide an email or phone number.';

            if ($request->wantsJson()) {
                return response()->json(['message' => $message], 422);
            }

            return back()->withErrors(['email' => $message])->withInput();
        }

        $subscriber = null;

        if (! empty($validated['email'])) {
            $subscriber = Subscriber::where('email', $validated['email'])->first();
        }

        if (! $subscriber && ! empty($validated['phone'])) {
            $subscriber = Subscriber::where('phone', $validated['phone'])->first();
        }

        if ($subscriber) {
            $subscriber->fill(array_filter($validated))->save();
        } else {
            $subscriber = Subscriber::create($validated);
        }

        $message = 'Thanks! We will be in touch shortly.';

        if ($request->wantsJson()) {
            return response()->json(['message' => $message]);
        }

        return back()->with('status', $message);
    }
}
