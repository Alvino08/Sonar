<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class JadwalController extends Controller
{
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'nama' => 'required|string',
    //         'tanggal' => 'required|date',
    //         'jam_mulai' => 'required',
    //         'jam_selesai' => 'required',
    //         'note' => 'nullable|string',
    //     ]);

    //     Jadwal::create($validated);

    //     return redirect()->back()->with('success', 'Jadwal berhasil ditambahkan.');
    // }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'nama' => 'required|string',
    //         'tanggal' => 'required|date',
    //         'jam_mulai' => 'required',
    //         'jam_selesai' => 'required',
    //         'note' => 'nullable|string',
    //     ]);

    //     $jadwal = Jadwal::create($validated);
    //     $start = Carbon::parse($validated['tanggal'] . ' ' . $validated['jam_mulai'], 'Asia/Jakarta');
    //     $end = Carbon::parse($validated['tanggal'] . ' ' . $validated['jam_selesai'], 'Asia/Jakarta');


    //     try {
    //         $event = Event::create([
    //             'name' => $validated['nama'],
    //             'startDateTime' => $start,
    //             'endDateTime' => $end,
    //             'description' => $validated['note'] ?? '',
    //         ]);

    //         $jadwal->google_event_id = $event->id;
    //         $jadwal->save();


    //         Log::info('Event berhasil dibuat di Google Calendar', [
    //             'event_id' => $event->id,
    //             'name' => $validated['nama'],
    //             'start' => $start,
    //             'end' => $end,
    //         ]);
    //     } catch (\Exception $e) {
    //         Log::error('Gagal membuat event di Google Calendar', [
    //             'error' => $e->getMessage(),
    //         ]);
    //     }

    //     return redirect()->back()->with('success', 'Jadwal berhasil ditambahkan dan disinkron ke Google Calendar.');
    // }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'note' => 'nullable|string',
        ]);

        // ❗ Cek apakah tanggal sudah digunakan
        $existing = Jadwal::whereDate('tanggal', $validated['tanggal'])->exists();
        if ($existing) {
            return redirect()->back()->with('error', 'Sudah ada jadwal di tanggal tersebut. Silakan pilih tanggal lain.');
        }

        // Simpan ke database
        $jadwal = Jadwal::create($validated);

        // Tambah ke Google Calendar jika dicentang
        if ($request->has('tambahkan_ke_google')) {
            $start = Carbon::parse($validated['tanggal'] . ' ' . $validated['jam_mulai'], 'Asia/Jakarta');
            $end = Carbon::parse($validated['tanggal'] . ' ' . $validated['jam_selesai'], 'Asia/Jakarta');

            try {
                $event = Event::create([
                    'name' => $validated['nama'],
                    'startDateTime' => $start,
                    'endDateTime' => $end,
                    'description' => $validated['note'] ?? '',
                ]);

                $jadwal->google_event_id = $event->id;
                $jadwal->save();

                Log::info('Event berhasil dibuat di Google Calendar', [
                    'event_id' => $event->id,
                    'name' => $validated['nama'],
                    'start' => $start,
                    'end' => $end,
                ]);
            } catch (\Exception $e) {
                Log::error('Gagal membuat event di Google Calendar', [
                    'error' => $e->getMessage(),
                ]);
            }
        }

        return redirect()->back()->with('success', 'Jadwal berhasil ditambahkan.');
    }




    public function index()
    {
        $tanggalTerisi = Jadwal::pluck('tanggal')->toArray(); // ambil semua tanggal yg terisi
        return view('admin.kalender', compact('tanggalTerisi'));
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        // Hapus dari Google Calendar jika ada event_id
        if ($jadwal->google_event_id) {
            try {
                $event = Event::find($jadwal->google_event_id);
                $event->delete();
                Log::info('Event dihapus dari Google Calendar', ['event_id' => $jadwal->google_event_id]);
            } catch (\Exception $e) {
                Log::error('Gagal menghapus event dari Google Calendar', ['error' => $e->getMessage()]);
            }
        }

        // Hapus dari database
        $jadwal->delete();

        return redirect()->back()->with('success', 'Jadwal dan event Google Calendar berhasil dihapus.');
    }

}
