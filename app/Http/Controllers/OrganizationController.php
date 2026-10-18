<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrganizationRequest;
use App\Models\Organization;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('organizations.index', compact('organizations'));
    }

    public function create()
    {
        return view('organizations.create');
    }

    public function store(StoreOrganizationRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')
                ->store('organization-logos', 'public');
        }

        Organization::create($data);

        return redirect()
            ->route('organizations.index')
            ->with('success', 'Organization added successfully!');
    }

    public function edit(Organization $organization)
    {
        return view('organizations.edit', compact('organization'));
    }

    public function update(
        StoreOrganizationRequest $request,
        Organization $organization
    ) {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')
                ->store('organization-logos', 'public');

            if ($path === false) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'logo' => 'The logo could not be saved. Please try again.',
                    ]);
            }

            if ($organization->logo) {
                Storage::disk('public')->delete($organization->logo);
            }

            $data['logo'] = $path;
        }

        $organization->update($data);

        return redirect()
            ->route('organizations.index')
            ->with('success', 'Organization updated successfully!');
    }

    public function destroy(Organization $organization)
    {
        if ($organization->logo) {
            Storage::disk('public')->delete($organization->logo);
        }

        $organization->delete();

        return redirect()
            ->route('organizations.index')
            ->with('success', 'Organization deleted successfully!');
    }
}
