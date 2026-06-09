@extends('layouts.master')

@section('title', $kategoriAktif->nama_kategori)

@section('content')
    {{-- <h3 class="mb-4">
        {{ $kategoriAktif->nama_kategori }}
    </h3> --}}

    @forelse($artikel as $item)
        <div class="card content-card shadow-sm mb-4">

            @if ($item->gambar)
                <img src="{{ asset('storage/gambar/' . $item->gambar) }}" class="card-img-top"
                    style="height:250px; object-fit:cover;">
            @endif

            <div class="card-body">

                <span class="category-badge-blog">
                    {{ $item->kategori->nama_kategori }}
                </span>

                <h2 class="fw-bold mb-3">
                    {{ $item->judul }}
                </h2>

                <div class="d-flex align-items-center gap-2 text-muted small mb-3">

                    <div class="d-flex align-items-center gap-2">

                        <div class="author-badge">
                            {{ strtoupper(substr($item->penulis->nama_depan ?? 'P', 0, 1)) }}
                        </div>

                        <span>
                            {{ $item->penulis->nama_depan ?? 'Penulis' }}
                        </span>

                    </div>
                    <span>•</span>
                    <span>
                        {{ $item->hari_tanggal }}
                    </span>

                </div>

                <p style="text-align: justify;">
                    {{ Str::limit(strip_tags($item->isi), 500) }}
                </p>

                <a href="{{ route('blog.artikel', $item->id) }}" class="btn btn-success rounded-pill">
                    Baca Selengkapnya →
                </a>

            </div>

        </div>

    @empty

        <div class="alert alert-info">
            Belum ada artikel pada kategori ini.
        </div>
    @endforelse

    {{ $artikel->links() }}
@endsection
