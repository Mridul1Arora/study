<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Display a listing of the leads.
     */
    public function index()
    {
        if (!auth()->user()->can('view lead')) {
            abort(403, 'Unauthorized');
        }
        $leads = Lead::all();
        return view('leads.index', compact('leads'));
    }

    /**
     * Show the form for creating a new lead.
     */
    public function create()
    {
        if (!auth()->user()->can('create lead')) {
            abort(403, 'Unauthorized');
        }
        return view('leads.create');
    }

    /**
     * Store a newly created lead in storage.
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:leads,email',
        // ]);

        Lead::create($request->all());

        return redirect()->route('leads.index')->with('success', 'Lead created successfully.');
    }

    /**
     * Display the specified lead.
     */
    public function show(Lead $lead_id)
    {
        $lead = $lead_id;
        return view('leads.show', compact('lead'));
    }

    /**
     * Show the form for editing the specified lead.
     */
    public function edit(Lead $lead_id)
    {   
        if (!auth()->user()->can('edit lead')) {
            abort(403, 'Unauthorized');
        }
        $lead = $lead_id;
        return view('leads.edit', compact('lead'));
    }

    /**
     * Update the specified lead in storage.
     */
    public function update(Request $request, Lead $lead)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:leads,email,' . $lead->lead_id,
            'phone' => 'nullable|string|max:15',
            // Add other fields as required
        ]);

        $lead->update($validatedData);

        return redirect()->route('leads.index')->with('success', 'Lead updated successfully.');
    }

    /**
     * Remove the specified lead from storage.
     */
    public function destroy(Lead $lead_id)
    {   
        if (!auth()->user()->can('delete lead')) {
            abort(403, 'Unauthorized');
        }
        //$lead_id->delete();
        dd("deleted");
        return redirect()->route('leads.index')->with('success', 'Lead deleted successfully.');
    }
}
