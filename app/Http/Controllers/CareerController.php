<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index(){
        $careers = Career::with('user')->latest()->get();
        return view('careers.index', compact('careers'));
    }

    public function create(){
        return view('careers.create');
    }

    public function store(Request $request){
        $request->validate([
            'status' => 'required',
            'graduation_year' => 'required|integer',
        ]);

        Career::create([
            'user_id' => auth()->id(),
            'status' => $request->status,
            'industry' => $request->industry,
            'organization' => $request->organization,
            'job_title' => $request->job_title,
            'graduation_year' => $request->graduation_year,
        ]);

        return redirect()->route('careers.index')->with('success', '進路情報を登録しました。');
    }

    public function edit(Career $career){
        if ($career->user_id !== auth()->id()) {
            abort(403);
        }
        return view('careers.edit', compact('career'));
    }

    public function update(Request $request, Career $career){
        if ($career->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'status' => 'required',
            'graduation_year' => 'required|integer',
        ]);
        $career->update([
            'status' => $request->status,
            'industry' => $request->industry,
            'organization' => $request->organization,
            'job_title' => $request->job_title,
            'graduation_year' => $request->graduation_year,
        ]);

        return redirect()->route('careers.index')->with('success', '進路情報を更新しました。');
    }

    public function destroy(Career $career){
        if ($career->user_id !== auth()->id()) {
            abort(403);
        }

        $career->delete();

        return redirect()->route('careers.index')->with('success', '進路情報を削除しました。');
    }

}
