<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadSubmissionRequest;
use App\Mail\NewLeadNotification;
use App\Models\Lead;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class LeadController extends Controller
{
    public function index(): View
    {
        return view('landing');
    }

    public function store(LeadSubmissionRequest $request): RedirectResponse
    {
        $uuid = (string) Str::uuid();
        $uploadPath = "uploads/{$uuid}";

        $inkoopPath = null;
        if ($request->hasFile('inkoopbestand')) {
            $inkoopPath = $request->file('inkoopbestand')
                ->storeAs($uploadPath, 'inkoopbestand.' . $request->file('inkoopbestand')->getClientOriginalExtension());
        }

        $leverancierPath = null;
        if ($request->hasFile('leverancierbestand')) {
            $leverancierPath = $request->file('leverancierbestand')
                ->storeAs($uploadPath, 'leverancierbestand.' . $request->file('leverancierbestand')->getClientOriginalExtension());
        }

        $lead = Lead::create([
            'name'                    => $request->name,
            'email'                   => $request->email,
            'company'                 => $request->company,
            'message'                 => $request->message,
            'inkoopbestand_path'      => $inkoopPath,
            'leverancierbestand_path' => $leverancierPath,
            'ip_address'              => $request->ip(),
            'submitted_at'            => now(),
        ]);

        try {
            Mail::to(config('app.admin_email'))->send(new NewLeadNotification($lead));
        } catch (\Exception $e) {
            Log::error('Lead notification mail failed: ' . $e->getMessage());
        }

        return redirect()->to('/#contact')->with('success',
            'Bedankt! We nemen zo snel mogelijk contact met je op.');
    }
}
