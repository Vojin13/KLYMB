<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBadgeRequest;
use App\Http\Requests\UpdateBadgeRequest;
use App\Models\Badge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BadgesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $badges = Badge::paginate(10);

        return view('admin.badges.index', compact('badges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.badges.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBadgeRequest $request)
    {
        $data = $request->validated();

        try {
            Badge::create($data);
            return redirect()->route('admin.badges.index')->with('success', 'Badge created successfully!');
        }
        catch (\Exception $exception){
            Log::error($exception->getMessage());
            return redirect()->back()->withInput()->with('error', 'Something went wrong while creating the badge.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Badge $badge)
    {
        return view('admin.badges.edit', compact('badge'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBadgeRequest $request, Badge $badge)
    {
        $data = $request->validated();

        try {
            $badge->update($data);
            return redirect()->route('admin.badges.index')->with('success', 'Badge updated successfully!');
        }
        catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->withInput()->with('error', 'Something went wrong while updating the badge.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Badge $badge)
    {
        try {
            $badge->delete();
            return redirect()->route('admin.badges.index')->with('success', 'Badge deleted successfully!');
        }
        catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->route('admin.badges.index')->with('error', 'Cannot delete badge. It might be in use.');
        }
    }
}
