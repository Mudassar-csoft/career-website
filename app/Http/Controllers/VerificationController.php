<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class VerificationController extends Controller
{
    public function show(string $verificationId): JsonResponse
    {
        $verificationId = trim($verificationId);

        if ($verificationId === '' || mb_strlen($verificationId) > 255) {
            return response()->json([
                'status' => 'error',
                'message' => 'Please enter a valid Verification ID.',
            ], 422);
        }

        try {
            $response = Http::acceptJson()
                ->timeout(15)
                ->get($this->verificationUrl($verificationId));
        } catch (\Throwable $exception) {
            report($exception);

            return response()->json([
                'status' => 'error',
                'message' => 'We could not verify this ID right now. Please try again shortly.',
            ], 503);
        }

        $payload = $response->json();
        $payload = is_array($payload) ? $payload : [];

        if ($response->successful() && data_get($payload, 'status') === 'success') {
            return response()->json($payload);
        }

        return response()->json([
            ...$payload,
            'status' => data_get($payload, 'status', 'error'),
            'message' => data_get($payload, 'message', 'Unfortunately, this Verification ID could not be verified.'),
        ], $response->status() >= 400 ? $response->status() : 404);
    }

    private function verificationUrl(string $verificationId): string
    {
        return rtrim((string) config('services.ims.certificate_verification_url'), '/').'/'.rawurlencode($verificationId);
    }
}
