<?php
namespace App\Http\Controllers;
use App\Models\Jadwal;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Audiopost;

class AudiopostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_projek' => 'required|string|max:255',
            'link' => 'required|url|max:255',
            'thumbnail' => 'required|url|max:255',
        ]);

        // if (Audiopost::count() >= 3) {
        //     return back()->with('error', 'Maksimal 3 Audiopost Project yang dapat ditambahkan.');
        // }

        Audiopost::create($request->only(['nama_projek', 'link', 'thumbnail']));

        return back()->with('success', 'Audiopost Project berhasil ditambahkan.');
    }

    public function audiopost()
    {
        $tanggalTerisi = Jadwal::pluck('tanggal')->map(function ($date) {
            return Carbon::parse($date)->format('Y-m-d');
        });

        $audioposts = Audiopost::latest()->take(3)->get();

        return view('audiopost', compact('tanggalTerisi', 'audioposts'));
    }

        public function destroy($id)
    {
        $audiopost = Audiopost::findOrFail($id);
        $audiopost->delete();

        return back()->with('success', 'Audiopost Project berhasil dihapus.');
    }


}

