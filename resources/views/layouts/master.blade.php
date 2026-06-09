<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog Teknologi')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fa;
            color: #495057;
        }

        /* =======================
           HEADER
        ======================= */
        .blog-header {
            background: #22354A;
            padding: 14px 0;
        }

        .blog-title {
            color: #fff;
            font-size: 24px;
            font-weight: 600;
            margin: 0;
            line-height: 1.2;
        }

        .blog-subtitle {
            color: #b8c4d0;
            font-size: 12px;
            margin: 0;
        }

        .nav-menu {
            list-style: none;
            display: flex;
            gap: 32px;
            margin: 0;
            padding: 0;
        }

        .nav-menu a {
            color: rgba(255, 255, 255, .85);
            text-decoration: none;
            font-size: 14px;
            transition: .2s;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: #ffffff;
            font-weight: 500;
        }

        /* =======================
           BREDCRUMB
        ======================= */
        .breadcrumb-blog {
            font-size: 14px;
            margin-bottom: 20px;
        }

        .breadcrumb-blog a {
            color: #198754;
            text-decoration: none;
            font-weight: 500;
            transition: .2s;
        }

        .breadcrumb-blog a:hover {
            color: #146c43;
        }

        .breadcrumb-separator {
            color: #adb5bd;
            margin: 0 8px;
        }

        .breadcrumb-current {
            color: #6c757d;
        }

        /* =======================
           MAIN
        ======================= */
        .main-wrapper {
            min-height: calc(100vh - 180px);
            padding-top: 30px;
            padding-bottom: 30px;
        }

        /* =======================
           widget terkait dan lainnya
        ======================= */
        .widget-title {
            font-weight: 700;
            margin-bottom: 20px;
        }

        .related-item {
            display: flex;
            gap: 12px;
            text-decoration: none;
            color: inherit;
            padding-bottom: 14px;
            margin-bottom: 14px;
            border-bottom: 1px solid #e9ecef;
        }

        .related-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .related-thumb {
            width: 70px;
            height: 45px;
            object-fit: cover;
            border-radius: 8px;
        }

        .related-title {
            font-size: 14px;
            font-weight: 600;
            line-height: 1.4;
        }

        /* =======================
           SIDEBAR
        ======================= */
        .sidebar-card {
            border: none;
            border-radius: 18px;
            position: sticky;
            top: 20px;
            overflow: hidden;
        }

        .sidebar-card .card-body {
            padding: 22px;
        }

        .sidebar-title {
            font-size: 20px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 22px;
        }

        .category-item {
            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 12px 14px;
            margin-bottom: 10px;

            border-radius: 12px;

            text-decoration: none;
            color: #495057;

            transition: all .2s ease;
        }

        .category-item:hover {
            background: #f1f3f5;
            color: #198754;
        }

        .category-item.active {
            background: #dff3e4;
            color: #198754;
            font-weight: 600;
        }

        .category-badge {
            width: 24px;
            height: 24px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            font-size: 12px;
            font-weight: 600;

            background: #edf0f2;
            color: #6c757d;
        }

        .category-item.active .category-badge {
            background: #28a745;
            color: #fff;
        }

        /* =======================
           CONTENT CARD
        ======================= */
        .category-badge-blog {
            display: inline-flex;
            align-items: center;

            padding: 6px 14px;

            background: #e7f1ff;
            color: #0d6efd;

            border: 1px solid #b6d4fe;
            border-radius: 50px;

            font-size: 12px;
            font-weight: 600;
        }

        .content-card {
            border: none;
            border-radius: 18px;
        }

        .author-badge {
            width: 32px;
            height: 32px;

            border-radius: 50%;

            background: #198754;
            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 13px;
            font-weight: 600;

            flex-shrink: 0;
        }

        /* =======================
           FOOTER
        ======================= */
        footer {
            background: #22354A;
            color: #fff;
            margin-top: 40px;
        }

        /* =======================
           MOBILE
        ======================= */
        @media (max-width: 768px) {

            .blog-header .container {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start !important;
            }

            .nav-menu {
                gap: 18px;
                flex-wrap: wrap;
            }

            .sidebar-card {
                position: static;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header class="blog-header">
        <div class="container d-flex justify-content-between align-items-center">

            <div>
                <h1 class="blog-title">Blog Kami</h1>
                <p class="blog-subtitle">
                    Artikel seputar teknologi dan pemrograman
                </p>
            </div>

            <nav>
                <ul class="nav-menu">

                    {{-- <li>
                        <a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'active' : '' }}">
                            Beranda
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('artikel.index') }}"
                            class="{{ request()->routeIs('artikel.*') ? 'active' : '' }}">
                            Artikel
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('kategori.index') }}"
                            class="{{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                            Kategori
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'active' : '' }}">
                            Tentang
                        </a>
                    </li> --}}

                </ul>
            </nav>

        </div>
    </header>

    <!-- MAIN -->
    <main class="main-wrapper">
        <div class="container">

            <div class="row g-4">

                <!-- CONTENT -->
                <div class="main-content col-lg-8">
                    @yield('content')
                </div>

                <!-- SIDEBAR -->
                <div class="col-lg-4">

                    @hasSection('widget')

                        @yield('widget')
                    @else
                        <div class="card shadow-sm sidebar-card">

                            <div class="card-body">

                                <h5 class="sidebar-title">
                                    Kategori Artikel
                                </h5>

                                <a href="{{ route('beranda') }}"
                                    class="category-item {{ request()->routeIs('beranda') ? 'active' : '' }}">

                                    <span>Semua Artikel</span>

                                    <span class="category-badge">
                                        {{ $totalArtikel ?? 0 }}
                                    </span>

                                </a>

                                @foreach ($kategoriSidebar as $kategori)
                                    <a href="{{ route('kategori.show', $kategori->id) }}"
                                        class="category-item {{ isset($kategoriAktif) && $kategoriAktif->id == $kategori->id ? 'active' : '' }}">

                                        <span>
                                            {{ $kategori->nama_kategori }}
                                        </span>

                                        <span class="category-badge">
                                            {{ $kategori->artikel_count }}
                                        </span>

                                    </a>
                                @endforeach

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="py-4">
        <div class="container text-center">
            <small>
                © {{ date('Y') }} Blog Kami. Semua Hak Dilindungi.
            </small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
