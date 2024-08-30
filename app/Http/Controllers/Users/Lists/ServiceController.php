<?php

namespace App\Http\Controllers\Users\Lists;

use Carbon\Carbon;
use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'services_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'services_title' => 'required|string|max:255',
            'services_fee' => 'required|numeric',
            'services_category' => 'required|string',
            'services_description' => 'required|string|max:65535',
        ]);

        $validatedData['user_id'] = Auth::id();

        if ($request->hasFile('services_picture')) {
            $path = $request->file('services_picture')->store('services_pictures', 'public');
            $validatedData['services_picture'] = $path;
        }

        $service = Service::create($validatedData);
        return redirect()->route('lists.services.index');
    }

    public function index()
    {
        $user = Auth::user();
        $services = Service::get();
        $services->each(function ($services) {
            $services->created_at = Carbon::parse($services->created_at)->diffForHumans();
        });

        return view('users.lists.services.index', compact('services', 'user'));
    }

    public function show($service)
    {
        $service = Service::findOrFail($service);
        $user = Auth::user();
        $services = Service::where('user_id', $service->user_id)
                            ->where('id', '!=', $service->id)
                            ->get();
        $relatedServices = Service::where('services_category', $service->services_category)
                            ->where('user_id', '!=', $user->id)
                            ->where('id', '!=', $service->id)
                            ->get();

        return view('lists.services.details', compact('service', 'services', 'user', 'relatedServices'));
    }

    public function destroy($service)
    {
        $service = Service::findOrFail($service);

        if (Auth::id() === $service->user_id) {
            $service->delete();
            return redirect()->route('lists.services.index')->with('success', 'Service list deleted successfully');
        }

        return redirect()->route('users.home')->with('error', 'You are not authorized to delete this service list');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        if (Auth::id() !== $service->user_id) {
            return redirect()->route('users.home')->with('error', 'You are not authorized to edit this product list');
        }

        return view('lists.services.edit', compact('service'));
    }

    public function update(Request $request, $service)
    {
        $service = Service::findOrFail($service);

        if (Auth::id() !== $service->user_id) {
            return redirect()->route('home')->with('error', 'You are not authorized to update this service');
        }

        $validatedData = $request->validate([
            'services_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'services_title' => 'required|string|max:255',
            'services_fee' => 'required|numeric',
            'services_category' => 'required|string',
            'services_description' => 'required|string|max:65535',
        ]);

        if ($request->hasFile('services_picture')) {
            $path = $request->file('services_picture')->store('services_pictures', 'public');
            $validatedData['services_picture'] = $path;
        }

        $servicesDescription = $validatedData['services_description'];
        if (strlen($servicesDescription) > 65535) {
            $validatedData['services_description'] = substr($servicesDescription, 0, 65535);
        }

        $service->update($validatedData);

        return redirect()->route('services.show', $service->id)->with('success', 'Service list updated successfully');
    }
}
