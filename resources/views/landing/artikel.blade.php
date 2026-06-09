@extends('layouts.master')

@section('content')
    <nav class="breadcrumb-blog">

        <a href="{{ route('beranda') }}">
            Beranda
        </a>

        <span class="breadcrumb-separator">/</span>

        <a href="{{ route('kategori.show', $artikel->id_kategori) }}">
            {{ $artikel->kategori->nama_kategori }}
        </a>

        <span class="breadcrumb-separator">/</span>

        <span class="breadcrumb-current">
            {{ $artikel->judul }}
        </span>

    </nav>
    <div class="card content-card shadow-sm mb-4">

        @if ($artikel->gambar)
            <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}" class="img-fluid rounded mb-4">
        @endif

        <div class="card-body">

            <span class="category-badge-blog">
                {{ $artikel->kategori->nama_kategori }}
            </span>

            <h2 class="fw-bold mb-3">
                {{ $artikel->judul }}
            </h2>

            <div class="d-flex align-items-center gap-2 text-muted small mb-3">

                <div class="author-badge">
                    {{ strtoupper(substr($artikel->penulis->nama_depan ?? 'P', 0, 1)) }}
                </div>

                <span>
                    {{ $artikel->penulis->nama_depan ?? 'Penulis' }}
                </span>

                <span>•</span>

                <span>
                    {{ $artikel->hari_tanggal }}
                </span>

            </div>

            <div style="text-align: justify;">
                {!! nl2br(e($artikel->isi)) !!}
            </div>

        </div>

    </div>
@endsection
@section('widget')
    <div class="card shadow-sm sidebar-card">

        <div class="card-body">

            <h5 class="sidebar-title">
                Artikel Terkait
            </h5>

            @forelse($artikelTerkait as $item)
                <a href="{{ route('blog.artikel', $item->id) }}" class="related-item">

                    <img src="{{ asset('storage/gambar/' . $item->gambar) }}" class="related-thumb">

                    <div>

                        <div class="related-title">
                            {{ $item->judul }}
                        </div>

                        <small class="text-muted">
                            {{ $item->hari_tanggal }}
                        </small>

                    </div>

                </a>

            @empty

                <p class="text-muted mb-0">
                    Tidak ada artikel terkait.
                </p>
            @endforelse

        </div>

    </div>
@endsection
