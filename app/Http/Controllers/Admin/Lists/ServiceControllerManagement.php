<?php

namespace App\Http\Controllers\Admin\Lists;

use Carbon\Carbon;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ServiceControllerManagement extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $services = Service::get();
        $services->each(function ($services) {
            $services->created_at = Carbon::parse($services->created_at)->diffForHumans();
        });

        return view('admin.lists.services', compact('services', 'user'));
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        $user = Auth::user();

        $services = Service::where('user_id', $service->user_id)
            ->where('id', '!=', $service->id)
            ->get();

        return view('admin.lists.services', compact(
            'service',
            'services',
            'user'
        ));
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services')->with('success', 'Service deleted successfully');
    }
}
