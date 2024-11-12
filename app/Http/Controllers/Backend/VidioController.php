<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Gallery\Vidio;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class VidioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.vidio.index', [
            'vidios' => Vidio::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.vidio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'vidio_link' => 'required|url',
    //     ]);

    //     Vidio::create([
    //         'name' => $request->name,
    //         'slug' => Str::slug($request->name), // Membuat slug dari nama
    //         'description' => $request->description,
    //         'vidio_link' => $request->vidio_link,
    //     ]);

    //     return redirect()->route('panel.vidio.index')->with('success', 'Vidio created successfully.');



    // }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'vidio_link' => 'required|url',
        ]);

        // Mengambil ID video dari link YouTube
        $videoId = $this->getVideoIdFromUrl($request->vidio_link);

        // Simpan data ke dalam database
        Vidio::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name), // Membuat slug dari nama
            'description' => $request->description,
            'vidio_link' => $videoId, // Simpan ID video
        ]);

        // Redirect setelah berhasil
        return redirect()->route('panel.vidio.index')->with('success', 'Vidio created successfully.');
    }

    // Fungsi untuk mengekstrak ID video dari URL
    private function getVideoIdFromUrl($url)
    {
        preg_match('/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches);
        return $matches[1] ?? null; // Kembalikan ID video jika ditemukan
    }



    public function show(string $uuid)
    {
        $vidio = Vidio::where('uuid', $uuid)->firstOrFail();
        return view('backend.vidio.show', compact('vidio'));
    }

    public function edit(string $uuid)
    {
        $vidio = Vidio::where('uuid', $uuid)->firstOrFail();
        return view('backend.vidio.edit', compact('vidio'));
    }

    public function update(Request $request, string $uuid)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'vidio_link' => 'required|url',
        ]);

        $vidio = Vidio::where('uuid', $uuid)->firstOrFail();

        // Mengupdate atribut vidio
        $vidio->update([
            'name' => $request->name,
            'description' => $request->description,
            'vidio_link' => $request->vidio_link,
            'slug' => Str::slug($request->name) // Membuat slug baru berdasarkan nama
        ]);

        return redirect()->route('panel.vidio.index')->with('success', 'Vidio updated successfully.');
    }

    public function destroy(string $uuid)
    {
        $vidio = Vidio::where('uuid', $uuid)->firstOrFail();
        $vidio->delete();

        // Jika request AJAX
        if (request()->ajax()) {
            return response()->json(['success' => true, 'message' => 'Vidio deleted successfully.']);
        }

        return redirect()->route('panel.vidio.index')->with('success', 'Vidio deleted successfully.');
    }
}
