<?php

namespace App\Http\Controllers;

use App\Models\Thesis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ThesisController extends Controller
{
    public function index(Request $request){
        $query = Thesis::query();

        if ($request->filled('keyword')){
            $query->where('title', 'like', '%'.$request->keyword.'%')
            ->orWhere('keywords', 'like', '%'.$request->keyword.'%')
            ->orWhere('abstract', 'like', '%'.$request->keyword.'%');
        }
        $theses = $query->latest()->get();

        return view('theses.index', compact('theses'));
    }

    public function create(){
        return view('theses.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'pdf' => 'required|mimes:pdf|max:10240',
            'abstract' => 'required|max:255',
        ]);
        $path = $request->file('pdf')->store('theses', 'public');

        Thesis::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'abstract' => $request->abstract,
            'keywords' => $request->keywords,
            'published_year' => $request->published_year,
            'advisor' => $request->advisor,
            'pdf_path' => $path,
        ]);

        return redirect()->route('theses.index')->with('message', '論文が登録されました。');
    }

    public function show(Thesis $thesis){
        return view('theses.show', compact('thesis'));
    }

    public function edit(Thesis $thesis){
        if ($thesis->user_id !== auth()->id()) { abort(403); }
        return view('theses.edit', compact('thesis'));
    }

    public function update(Request $request, Thesis $thesis){
        if ($thesis->user_id !== auth()->id()) { abort(403); }

        $request->validate([
            'title' => 'required|max:255',
            'pdf' => 'nullable|mimes:pdf|max:10240',
            'abstract' => 'required|max:255',]);

        if ($request->hasFile('pdf')) {
            Storage::disk('public')->delete($thesis->pdf_path);
            $path = $request->file('pdf')->store('theses', 'public');
            $thesis->pdf_path = $path;
        }

        $thesis->update([
            'title' => $request->title,
            'abstract' => $request->abstract,
            'keywords' => $request->keywords,
            'published_year' => $request->published_year,
            'advisor' => $request->advisor,
            'pdf_path' => $thesis->pdf_path]);

        return redirect()->route('theses.show', $thesis)->with('success', '論文を更新しました。');
    }

    public function destroy(Thesis $thesis){
        if ($thesis->user_id !== auth()->id()) { abort(403); }
        Storage::disk('public')->delete($thesis->pdf_path);
        $thesis->delete();

        return redirect()->route('theses.index')->with('success', '論文を削除しました。');

    }
}
