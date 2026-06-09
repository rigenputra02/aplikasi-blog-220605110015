<?php
namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikel = Artikel::with([
            'kategori',
            'penulis',
        ])
            ->latest('hari_tanggal')
            ->paginate(5);

        return view('landing.index', compact(
            'artikel'
        ));
    }
    public function kategori($id)
    {
        $kategoriAktif = KategoriArtikel::findOrFail($id);

        $artikel = Artikel::with([
            'kategori',
            'penulis',
        ])
            ->where('id_kategori', $id)
            ->orderBy('hari_tanggal', 'desc')
            ->paginate(5);

        return view('landing.kategori', compact(
            'artikel',
            'kategoriAktif'
        ));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $artikel = Artikel::with([
            'kategori',
            'penulis',
        ])->findOrFail($id);

        $artikelTerkait = Artikel::where(
            'id_kategori',
            $artikel->id_kategori
        )
            ->where('id', '!=', $artikel->id)
            ->orderBy('hari_tanggal', 'desc')
            ->take(5)
            ->get();

        return view(
            'landing.artikel',
            compact(
                'artikel',
                'artikelTerkait'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
