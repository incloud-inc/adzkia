<x-layouts.app>
    <!-- Font Open Sans & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Outfit:wght@500;600;700;800;900&display=swap" rel="stylesheet">

    @php
        $baseDomain = config('app.url_base_domain', 'localhost');
        $port = request()->getPort();
        $portSuffix = ($port && $port != 80 && $port != 443) ? ':'.$port : '';
        $fullPortalUrl = $tenant->subdomain . '.' . $baseDomain . $portSuffix;
        $portalHttpUrl = (request()->isSecure() ? 'https://' : 'http://') . $fullPortalUrl;
    @endphp

    <style>
        .custom-branding-wrapper * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Open Sans', sans-serif;
        }

        .custom-branding-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            color: #212529;
            padding: 8px 0 60px 0;
        }

        .font-display, h1, h2, h3, .branding-title, .content-card h3, .stat-num {
            font-family: 'Outfit', sans-serif;
        }

        /* Container Utama */
        .main-container {
            width: 100%;
            max-width: 520px;
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        /* Breadcrumb & Navigation */
        .breadcrumb-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 2px;
        }

        .breadcrumb-trail {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12.5px;
            font-weight: 600;
            color: #64748b;
        }

        .breadcrumb-trail a {
            color: #0284c7;
            text-decoration: none;
            transition: color 0.15s ease;
        }

        .breadcrumb-trail a:hover {
            color: #0369a1;
            text-decoration: underline;
        }

        /* CARD HERO SEKOLAH (1:1 DI LAPTOP SEPERTI PROFIL) */
        .profile-card {
            background: #ffffff;
            width: 100%;
            border-radius: 22px;
            box-shadow: 0 12px 36px rgba(0, 0, 0, 0.06), 0 2px 6px rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(226, 232, 240, 0.85);
            overflow: hidden;
            text-align: center;
            position: relative;
            display: flex;
            flex-direction: column;
            transition: box-shadow 0.3s ease;
        }

        @media (min-width: 768px) {
            .profile-card {
                aspect-ratio: 1 / 1;
            }
        }

        /* Area Cover Banner */
        .profile-cover {
            width: 100%;
            height: 31%;
            position: relative;
            background: linear-gradient(135deg, #0284c7, #0369a1);
            overflow: hidden;
        }

        .profile-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .profile-card:hover .profile-cover img {
            transform: scale(1.02);
        }

        .cover-upload-btn {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(8px);
            border-radius: 50%;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: 1px solid rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
            z-index: 5;
        }
        .cover-upload-btn:hover {
            background: #ffffff;
            transform: scale(1.08);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
        }

        /* Plan Badge */
        .plan-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(8px);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            color: #0369a1;
            display: flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.9);
            letter-spacing: 0.3px;
        }

        /* Avatar / Logo Sekolah */
        .profile-image-container {
            position: relative;
            margin-top: -52px;
            margin-bottom: 8px;
            display: flex;
            justify-content: center;
            z-index: 2;
        }

        .profile-image-wrapper {
            position: relative;
            display: inline-block;
        }

        .profile-image {
            width: 104px;
            height: 104px;
            border-radius: 22px;
            border: 4px solid #ffffff;
            object-fit: cover;
            background-color: #ffffff;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
        }

        .logo-upload-btn {
            position: absolute;
            bottom: -2px;
            right: -2px;
            background: #ffffff;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: 1.5px solid #e2e8f0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.12);
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .logo-upload-btn:hover {
            transform: scale(1.1);
            border-color: #0284c7;
            color: #0284c7;
        }

        /* Konten Profil Card */
        .profile-content {
            padding: 0 24px 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-grow: 1;
        }

        .profile-name {
            font-size: 21px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 4px;
            letter-spacing: -0.02em;
            line-height: 1.25;
        }

        .profile-subdomain {
            font-size: 13px;
            color: #0284c7;
            font-weight: 700;
            margin-bottom: 8px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #e0f2fe;
            padding: 3px 14px;
            border-radius: 20px;
            text-decoration: none;
            transition: background 0.15s ease;
        }
        .profile-subdomain:hover {
            background: #bae6fd;
        }

        .tagline-container {
            position: relative;
            margin-bottom: 12px;
        }

        .tagline-input {
            width: 100%;
            border: none;
            border-bottom: 1.5px dashed #cbd5e1;
            background: transparent;
            font-size: 13.5px;
            color: #475569;
            font-style: italic;
            text-align: center;
            outline: none;
            padding: 5px 24px 5px 6px;
            font-family: 'Open Sans', sans-serif;
            transition: all 0.2s ease;
        }
        .tagline-input:focus {
            border-bottom-color: #0284c7;
            background: rgba(240, 249, 255, 0.5);
            color: #0f172a;
        }

        /* Mini Statistik */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 10px 6px;
            margin-bottom: 14px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-num {
            font-size: 17px;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.2;
        }

        .stat-label {
            font-size: 10.5px;
            color: #64748b;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 2px;
        }

        /* Area Tombol Aksi */
        .profile-actions {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .btn {
            flex: 1;
            text-decoration: none;
            padding: 11px 0;
            border-radius: 30px;
            font-size: 13.5px;
            font-weight: 700;
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
            text-align: center;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .btn:hover {
            transform: translateY(-1.5px);
        }

        .btn-primary {
            background: linear-gradient(135deg, #0284c7, #0369a1);
            color: #ffffff;
            box-shadow: 0 4px 14px rgba(2, 132, 199, 0.3);
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #0369a1, #075985);
            box-shadow: 0 6px 18px rgba(2, 132, 199, 0.4);
        }

        .btn-secondary {
            background-color: #f1f5f9;
            color: #334155;
            border: 1px solid #cbd5e1;
        }
        .btn-secondary:hover {
            background-color: #e2e8f0;
            color: #0f172a;
        }

        /* CARD TAMBAHAN DI BAWAH */
        .content-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 22px 24px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(226, 232, 240, 0.85);
            width: 100%;
        }

        .content-card h3 {
            font-size: 16px;
            color: #0f172a;
            margin-bottom: 8px;
            font-weight: 700;
            letter-spacing: -0.01em;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* MINI THEME CARDS (OPEN COLOR PALETTES) */
        .theme-mini-card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 10px 12px;
            border-radius: 14px;
            cursor: pointer;
            transition: transform 0.18s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.18s ease, border-color 0.18s ease;
            position: relative;
            user-select: none;
            min-height: 66px;
            box-sizing: border-box;
        }

        .theme-mini-card:hover {
            transform: translateY(-2px);
        }

        .theme-mini-card.is-active {
            transform: translateY(-2px);
        }

        /* MOCKUP TAB BROWSER UNTUK FAVICON */
        .browser-mockup-wrapper {
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.04);
            margin-top: 14px;
        }

        .browser-tab-mockup {
            background: #f1f5f9;
            padding: 8px 12px 0;
            display: flex;
            align-items: flex-end;
            gap: 8px;
            border-bottom: 1px solid #e2e8f0;
        }

        .tab-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            display: inline-block;
        }

        .browser-tab-pill {
            background: #ffffff;
            border-radius: 8px 8px 0 0;
            padding: 6px 12px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            font-weight: 600;
            color: #334155;
            border: 1px solid #e2e8f0;
            border-bottom: 1px solid #ffffff;
            margin-bottom: -1px;
            max-width: 240px;
        }

        .browser-address-bar {
            background: #ffffff;
            padding: 8px 12px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            color: #64748b;
            border-bottom: 1px solid #f1f5f9;
        }

        .url-capsule {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 3px 12px;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 11.5px;
            font-family: monospace;
            color: #475569;
            flex: 1;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .browser-window-body {
            background: #fafafa;
            padding: 14px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        /* Detail List Item with Dashed Lines */
        .list-item-dashed {
            border-bottom: 1px dashed #e2e8f0;
            padding-bottom: 12px;
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .list-item-dashed:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .detail-label {
            font-size: 11px;
            text-transform: uppercase;
            color: #64748b;
            font-weight: 700;
            letter-spacing: 0.5px;
            margin-bottom: 2px;
            display: block;
        }

        .detail-value {
            color: #0f172a;
            font-weight: 600;
            font-size: 13.5px;
        }

        /* Asset specs chips */
        .spec-chip {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: #f1f5f9;
            padding: 2px 8px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            color: #475569;
        }

        /* Toast notification */
        .copy-toast {
            position: fixed;
            bottom: 24px;
            right: 24px;
            background: #0f172a;
            color: #ffffff;
            padding: 10px 18px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            z-index: 100;
            display: flex;
            align-items: center;
            gap: 8px;
        }
    </style>

    <div class="custom-branding-wrapper">
        <form action="{{ route('tenants.branding.update', $tenant->id) }}" method="POST" enctype="multipart/form-data" class="main-container" x-data="brandingForm()">
            @csrf
            @method('PUT')

            <!-- Navigasi & Header Atas -->
            <div class="breadcrumb-bar">
                <div class="breadcrumb-trail">
                    <a href="{{ route('tenants.index') }}">Institusi</a>
                    <svg width="12" height="12" viewBox="0 0 15 15" fill="none"><path d="M6 3L10 7.5L6 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <a href="{{ route('tenants.show', $tenant->id) }}">{{ $tenant->name }}</a>
                    <svg width="12" height="12" viewBox="0 0 15 15" fill="none"><path d="M6 3L10 7.5L6 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <span style="color: #0f172a;">Branding</span>
                </div>

                <a href="{{ route('tenants.show', $tenant->id) }}" class="btn btn-secondary" style="padding: 7px 14px; font-size: 12.5px; border-radius: 20px; flex: none; gap: 4px;">
                    <svg width="13" height="13" viewBox="0 0 15 15" fill="none"><path d="M9 3L5 7.5L9 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Detail Tenant
                </a>
            </div>

            <!-- Judul & Pengantar -->
            <div style="margin-bottom: 2px;">
                <h1 class="branding-title" style="font-size: 23px; font-weight: 800; color: #0f172a; letter-spacing: -0.02em; display: flex; align-items: center; gap: 8px;">
                    <span style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 10px; background: #e0f2fe; color: #0284c7;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </span>
                    Branding & Visual Portal
                </h1>
                <p style="font-size: 13.5px; color: #64748b; margin-top: 4px; line-height: 1.45;">
                    Pratinjau langsung identitas institusi <strong>{{ $tenant->name }}</strong>. Ubah cover banner, logo, dan favicon secara real-time.
                </p>
            </div>

            <!-- Flash Pesan Sukses -->
            @if(session('success'))
                <div style="background-color: #ecfdf5; color: #065f46; padding: 12px 18px; border-radius: 14px; font-size: 13.5px; width: 100%; font-weight: 600; border: 1px solid #a7f3d0; box-shadow: 0 2px 8px rgba(16, 185, 129, 0.08); display: flex; align-items: center; gap: 10px;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Pesan Kesalahan Validasi -->
            @if($errors->any())
                <div style="background-color: #fef2f2; color: #991b1b; padding: 12px 18px; border-radius: 14px; font-size: 13.5px; width: 100%; border: 1px solid #fecaca; box-shadow: 0 2px 8px rgba(239, 68, 68, 0.06);">
                    <div style="display: flex; align-items: center; gap: 8px; font-weight: 700; margin-bottom: 4px;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                        Mohon periksa data yang diunggah:
                    </div>
                    <ul style="list-style: disc; padding-left: 20px; font-size: 13px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- ========================================================== -->
            <!-- CARD HERO SEKOLAH (LIVE PREVIEW INTERAKTIF DENGAN 1:1) -->
            <!-- ========================================================== -->
            <div class="profile-card">
                <!-- Area Cover Banner -->
                <div class="profile-cover">
                    <img :src="coverPreview || '{{ $tenant->cover_photo_url }}'" alt="Cover {{ $tenant->name }}">

                    <!-- Overlay Tint Mengikuti Tema Terpilih Realtime -->
                    <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.85), rgba(0,0,0,0.35)); pointer-events: none;"></div>
                    <div style="position: absolute; inset: 0; opacity: 0.25; transition: background-color 0.4s ease; pointer-events: none;"
                         :style="{ backgroundColor: (palettesData[selectedTheme] ? palettesData[selectedTheme].hex : '#0284c7') }"></div>

                    <!-- Badge Indikator Tema Aktif di Cover Pratinjau -->
                    <div style="position: absolute; top: 12px; left: 12px; z-index: 5; display: inline-flex; align-items: center; gap: 6px; padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 700; color: #ffffff; background: rgba(0,0,0,0.55); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.25);">
                        <span style="width: 8px; height: 8px; border-radius: 50%; border: 1.5px solid #ffffff;" :style="{ backgroundColor: (palettesData[selectedTheme] ? palettesData[selectedTheme].hex : '#0284c7') }"></span>
                        <span>Tema: <strong x-text="palettesData[selectedTheme] ? palettesData[selectedTheme].name : 'Light'"></strong></span>
                    </div>
                    


                    <!-- Tombol Upload Cover Banner -->
                    <label class="cover-upload-btn" title="Ganti Cover Banner (Disarankan 1920x600 px)">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#1e293b" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                        <input type="file" name="cover_photo" style="display: none;" accept="image/*" @change="previewCover">
                    </label>
                </div>
                
                <!-- Logo Sekolah -->
                <div class="profile-image-container">
                    <div class="profile-image-wrapper">
                        <img :src="logoPreview || '{{ $tenant->logo_url }}'" alt="Logo {{ $tenant->name }}" class="profile-image">
                        <label class="logo-upload-btn" title="Ganti Logo Sekolah">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#334155" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            <input type="file" name="logo" style="display: none;" accept="image/*" @change="previewLogo">
                        </label>
                    </div>
                </div>
                
                <!-- Konten Sekolah -->
                <div class="profile-content">
                    <div>
                        <h2 class="profile-name">{{ $tenant->name }}</h2>
                        
                        <a href="{{ route('tenant.portal', ['subdomain' => $tenant->subdomain]) }}" target="_blank" class="profile-subdomain" title="Kunjungi Portal Publik">
                            <svg width="12.5" height="12.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                            <span>{{ $fullPortalUrl }}</span>
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                        </a>

                        <!-- Tagline Inline Edit -->
                        <div class="tagline-container">
                            <input type="text" name="tagline" x-model="taglineText" class="tagline-input" placeholder="Tuliskan tagline / motto sekolah di sini...">
                            <span style="position: absolute; right: 4px; top: 7px; color: #94a3b8; pointer-events: none;">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                            </span>
                        </div>
                    </div>
                    
                    <!-- Statistik Mini Pratinjau -->
                    <div class="stats-grid">
                        <div class="stat-item">
                            <div class="stat-num">{{ $tenant->assessments()->count() }}</div>
                            <div class="stat-label">Asesmen</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-num">{{ $tenant->users()->wherePivot('role', 'U')->count() }}</div>
                            <div class="stat-label">Siswa</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-num">{{ $tenant->users()->wherePivot('role', 'T')->count() }}</div>
                            <div class="stat-label">Guru / Staf</div>
                        </div>
                    </div>
                    
                    <!-- Tombol Aksi Hero -->
                    <div class="profile-actions">
                        <button type="submit" class="btn btn-primary">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                            Simpan Branding
                        </button>
                        <a href="{{ route('tenant.portal', ['subdomain' => $tenant->subdomain]) }}" target="_blank" class="btn btn-secondary">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            Buka Portal
                        </a>
                    </div>
                </div>
            </div>

            <!-- ========================================================== -->
            <!-- CARD 1: FAVICON & SIMULATOR TAB BROWSER REALISTIS -->
            <!-- ========================================================== -->
            <div class="content-card">
                <h3>
                    <span style="display: inline-flex; align-items: center; justify-content: center; width: 26px; height: 26px; border-radius: 8px; background: #e0f2fe; color: #0284c7;">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                    </span>
                    Favicon & Tab Browser Pengunjung
                </h3>
                <p style="font-size: 13px; color: #64748b; line-height: 1.45;">
                    Simulasi tampilan tab browser saat siswa, guru, atau wali murid membuka portal resmi sekolah Anda.
                </p>

                <!-- Simulator Browser Window Chrome -->
                <div class="browser-mockup-wrapper">
                    <div class="browser-tab-mockup">
                        <div style="display: flex; gap: 5px; margin-bottom: 7px; margin-right: 4px;">
                            <span class="tab-dot" style="background: #ff5f56; border: 1px solid #e0443e;"></span>
                            <span class="tab-dot" style="background: #ffbd2e; border: 1px solid #dea123;"></span>
                            <span class="tab-dot" style="background: #27c93f; border: 1px solid #1aab29;"></span>
                        </div>
                        
                        <!-- Active Tab -->
                        <div class="browser-tab-pill">
                            <img :src="faviconPreview || '{{ $tenant->favicon_url }}'" style="width: 14px; height: 14px; object-fit: contain; border-radius: 2px;" alt="Favicon">
                            <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $tenant->name }} - Portal</span>
                            <span style="color: #94a3b8; font-size: 11px; margin-left: 2px;">×</span>
                        </div>

                        <!-- Add Tab Icon -->
                        <span style="color: #94a3b8; font-size: 14px; margin-bottom: 4px; padding: 0 4px; cursor: default;">+</span>
                    </div>

                    <!-- Browser Address Bar -->
                    <div class="browser-address-bar">
                        <div style="display: flex; gap: 6px; color: #94a3b8;">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"></polyline></svg>
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                        <div class="url-capsule">
                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                            <span>{{ $portalHttpUrl }}</span>
                        </div>
                    </div>

                    <!-- Upload Favicon Area -->
                    <div class="browser-window-body">
                        <div>
                            <div style="font-size: 12.5px; font-weight: 600; color: #1e293b;">Ikon Tab Web (.ico / .png)</div>
                            <div style="font-size: 11px; color: #64748b; margin-top: 1px;">Disarankan 32×32 px atau 64×64 px, maks 1MB.</div>
                        </div>
                        <label class="btn btn-secondary" style="padding: 7px 16px; font-size: 12px; flex: none; border-radius: 20px; gap: 6px;">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                            Pilih Favicon
                            <input type="file" name="favicon" style="display: none;" accept=".ico,.png" @change="previewFavicon">
                        </label>
                    </div>
                </div>
            </div>

            <!-- ========================================================== -->
            <!-- CARD: TEMA WARNA PORTAL SEKOLAH (14 PALET OPEN COLOR)     -->
            <!-- ========================================================== -->
            <div class="content-card">
                <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px;">
                    <h3>
                        <span style="display: inline-flex; align-items: center; justify-content: center; width: 26px; height: 26px; border-radius: 8px; background: #e0e7ff; color: #4338ca;">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="13.5" cy="6.5" r=".5" fill="currentColor"></circle><circle cx="17.5" cy="10.5" r=".5" fill="currentColor"></circle><circle cx="8.5" cy="7.5" r=".5" fill="currentColor"></circle><circle cx="6.5" cy="12.5" r=".5" fill="currentColor"></circle><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.563-2.512 5.563-5.563C22 6.5 17.5 2 12 2Z"></path></svg>
                        </span>
                        Tema Warna Portal Sekolah
                    </h3>
                    <span style="font-size: 11px; font-weight: 700; background: #f1f5f9; color: #475569; padding: 3px 9px; border-radius: 20px; border: 1px solid #cbd5e1;">
                        14 Palet Open Color
                    </span>
                </div>
                <p style="font-size: 13px; color: #64748b; margin-top: 4px; margin-bottom: 14px; line-height: 1.45;">
                    Pilih skema warna utama portal publik sekolah Anda. Tema yang dipilih di sini akan diterapkan secara penuh dan konsisten pada halaman profil dan portal publik sekolah.
                </p>

                @php
                    $themeColorMap = [
                        'light'  => ['color' => '#1864ab', 'bg' => '#f8f9fa', 'border' => '#a5d8ff'],
                        'gray'   => ['color' => '#212529', 'bg' => '#f1f3f5', 'border' => '#ced4da'],
                        'blue'   => ['color' => '#1864ab', 'bg' => '#e7f5ff', 'border' => '#4dabf7'],
                        'indigo' => ['color' => '#364fc7', 'bg' => '#edf2ff', 'border' => '#748ffc'],
                        'teal'   => ['color' => '#087f5b', 'bg' => '#e6fcf5', 'border' => '#38d9a9'],
                        'cyan'   => ['color' => '#0b7285', 'bg' => '#e3fafc', 'border' => '#3bc9db'],
                        'green'  => ['color' => '#2b8a3e', 'bg' => '#ebfbee', 'border' => '#69db7c'],
                        'lime'   => ['color' => '#5c940d', 'bg' => '#f4fce3', 'border' => '#a9e34b'],
                        'yellow' => ['color' => '#b45309', 'bg' => '#fff9db', 'border' => '#fcc419'],
                        'orange' => ['color' => '#d9480f', 'bg' => '#fff4e6', 'border' => '#ff922b'],
                        'red'    => ['color' => '#c92a2a', 'bg' => '#fff5f5', 'border' => '#ff6b6b'],
                        'pink'   => ['color' => '#a61e4d', 'bg' => '#fff0f6', 'border' => '#f783ac'],
                        'grape'  => ['color' => '#862e9c', 'bg' => '#f8f0fc', 'border' => '#da77f2'],
                        'violet' => ['color' => '#5f3dc4', 'bg' => '#f3f0ff', 'border' => '#9775fa'],
                    ];
                @endphp

                <!-- Grid Card-Card Kecil Tema Warna (Taste & Modern Web Guidance) -->
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(130px, 1fr)); gap: 10px; margin-bottom: 8px;">
                    @foreach($palettes as $pKey => $pVal)
                        @php
                            $cCfg = $themeColorMap[$pKey] ?? ['color' => $pVal['primary'], 'bg' => $pVal['primary'].'15', 'border' => $pVal['primary'].'55'];
                            $themeNameColor = $cCfg['color'];
                            $themeBgColor = $cCfg['bg'];
                            $themeBorderColor = $cCfg['border'];
                            $themeHexCode = strtoupper($pKey === 'light' ? ($pVal['primary'] ?? '#1c7ed6') : ($pVal['hex'] ?? $pVal['primary']));
                            $primaryDot = $themeHexCode;
                        @endphp
                        <label class="theme-mini-card"
                               @click="selectedTheme = '{{ $pKey }}'"
                               :class="{ 'is-active': selectedTheme === '{{ $pKey }}' }"
                               style="background-color: {{ $themeBgColor }} !important;"
                               :style="selectedTheme === '{{ $pKey }}'
                                    ? 'background-color: {{ $themeBgColor }} !important; border: 3px solid {{ $themeNameColor }} !important; padding: 10px 12px !important; box-shadow: 0 6px 16px -4px {{ $themeNameColor }}45 !important;'
                                    : 'background-color: {{ $themeBgColor }} !important; border: 1px solid {{ $themeBorderColor }} !important; padding: 12px 14px !important; box-shadow: 0 1px 3px rgba(0,0,0,0.02) !important;'">
                            <input type="radio" name="theme_palette" value="{{ $pKey }}" x-model="selectedTheme" {{ $tenant->getThemePalette() === $pKey ? 'checked' : '' }} :checked="selectedTheme === '{{ $pKey }}'" style="display: none;">
                            
                            <!-- Baris Atas: Dot Swatch + Kode Warna Tema (Transparan & Font 9px) -->
                            <div style="display: flex; align-items: center; justify-content: space-between; width: 100%; margin-bottom: 6px;">
                                <span style="display: inline-block; width: 13px; height: 13px; border-radius: 50%; background-color: {{ $primaryDot }}; border: 2px solid #ffffff; box-shadow: 0 1px 3px rgba(0,0,0,0.2); flex-shrink: 0;"></span>
                                
                                <span style="font-family: monospace; font-size: 9px; font-weight: 700; color: {{ $themeNameColor }} !important; letter-spacing: 0.03em; background: transparent !important; line-height: 1;">
                                    {{ $themeHexCode }}
                                </span>
                            </div>

                            <!-- Baris Bawah: Nama Tema Berwarna -->
                            <div>
                                <span style="display: block; font-size: 13px; font-weight: 800; color: {{ $themeNameColor }} !important; letter-spacing: -0.015em; line-height: 1.25; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-family: 'Outfit', sans-serif;">
                                    {{ $pVal['name'] }}
                                </span>
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- ========================================================== -->
            <!-- CARD: PENGELOMPOKAN KELAS (SEKOLAH & PRO DARI MASTER DATA)-->
            <!-- ========================================================== -->
            <div class="content-card">
                <h3>
                    <span style="display: inline-flex; align-items: center; justify-content: center; width: 26px; height: 26px; border-radius: 8px; background: #fef3c7; color: #d97706;">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    </span>
                    Pengelompokan Kelas: Sekolah & PRO
                </h3>
                <p style="font-size: 13px; color: #64748b; margin-top: 4px; margin-bottom: 16px; line-height: 1.45;">
                    Sesuaikan katalog resmi sekolah serta pilih grup kelas PRO yang ditampilkan pada slider di bawah cover profil sekolah.
                </p>

                <input type="hidden" name="grade_settings_submitted" value="1">

                <!-- ------------------------------------------------------ -->
                <!-- SUB-BAGIAN 1: SEKOLAH (WAJIB PILIH MINIMAL 1 JENJANG)   -->
                <!-- ------------------------------------------------------ -->
                <div style="background: #ffffff; border: 1.5px solid #e2e8f0; border-radius: 16px; padding: 14px; margin-bottom: 16px;">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
                        <div>
                            <span style="font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: #0284c7;">
                                Bagian 1 • Halaman Resmi Sekolah
                            </span>
                            <div style="font-size: 14px; font-weight: 800; color: #0f172a; margin-top: 1px;">
                                Jenjang Sekolah (Wajib Pilih Minimal 1)
                            </div>
                        </div>
                        <span style="font-size: 10.5px; font-weight: 800; padding: 3px 8px; border-radius: 20px; border: 1px solid;"
                              :style="schoolGradeCount >= 1 ? 'background: #ecfdf5; color: #059669; border-color: #a7f3d0;' : 'background: #fff1f2; color: #e11d48; border-color: #fecdd3;'"
                              x-text="schoolGradeCount + ' Jenjang Dipilih'">
                        </span>
                    </div>
                    <p style="font-size: 12px; color: #64748b; margin-bottom: 12px;">
                        Pilih satu atau lebih jenjang pendidikan yang diselenggarakan sekolah. Bisa dipilih semua oleh sekolah (default: checklist semua):
                    </p>

                    <!-- Peringatan jika < 1 -->
                    <div x-show="schoolGradeCount < 1" style="background: #fff1f2; border: 1px solid #fecdd3; color: #be123c; padding: 8px 12px; border-radius: 10px; font-size: 11.5px; font-weight: 600; margin-bottom: 12px; display: flex; align-items: center; gap: 6px;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                        <span>Wajib memilih minimal 1 jenjang sekolah agar katalog mata pelajaran aktif.</span>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <!-- Opsi SMA -->
                        <label @click="toggleGrade('sma')"
                               style="display: flex; align-items: center; justify-content: space-between; padding: 10px 14px; border-radius: 12px; cursor: pointer; transition: all 0.2s; border: 1.5px solid;"
                               :style="isGradeSelected('sma') ? 'border-color: #0284c7; background: #f0f9ff; box-shadow: 0 2px 6px rgba(2, 132, 199, 0.08);' : 'border-color: #e2e8f0; background: #f8fafc;'">
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <input type="checkbox" name="school_grades[]" value="sma"
                                       :checked="isGradeSelected('sma')"
                                       @click.stop="toggleGrade('sma')"
                                       style="accent-color: #0284c7; width: 18px; height: 18px; cursor: pointer;">
                                <div>
                                    <div style="font-size: 13px; font-weight: 700; color: #0f172a;">SMA / MA / SMK</div>
                                    <div style="font-size: 11px; color: #64748b;">Fase E & F • Kelas 10, 11, dan 12</div>
                                </div>
                            </div>
                            <span style="font-size: 11px; font-weight: 700; padding: 2px 8px; border-radius: 6px; background: #343a40; color: #ffffff;">Fase E & F</span>
                        </label>

                        <!-- Opsi SMP -->
                        <label @click="toggleGrade('smp')"
                               style="display: flex; align-items: center; justify-content: space-between; padding: 10px 14px; border-radius: 12px; cursor: pointer; transition: all 0.2s; border: 1.5px solid;"
                               :style="isGradeSelected('smp') ? 'border-color: #0284c7; background: #f0f9ff; box-shadow: 0 2px 6px rgba(2, 132, 199, 0.08);' : 'border-color: #e2e8f0; background: #f8fafc;'">
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <input type="checkbox" name="school_grades[]" value="smp"
                                       :checked="isGradeSelected('smp')"
                                       @click.stop="toggleGrade('smp')"
                                       style="accent-color: #0284c7; width: 18px; height: 18px; cursor: pointer;">
                                <div>
                                    <div style="font-size: 13px; font-weight: 700; color: #0f172a;">SMP / MTs</div>
                                    <div style="font-size: 11px; color: #64748b;">Fase D • Kelas 7, 8, dan 9</div>
                                </div>
                            </div>
                            <span style="font-size: 11px; font-weight: 700; padding: 2px 8px; border-radius: 6px; background: #228be6; color: #ffffff;">Fase D</span>
                        </label>

                        <!-- Opsi SD -->
                        <label @click="toggleGrade('sd')"
                               style="display: flex; align-items: center; justify-content: space-between; padding: 10px 14px; border-radius: 12px; cursor: pointer; transition: all 0.2s; border: 1.5px solid;"
                               :style="isGradeSelected('sd') ? 'border-color: #0284c7; background: #f0f9ff; box-shadow: 0 2px 6px rgba(2, 132, 199, 0.08);' : 'border-color: #e2e8f0; background: #f8fafc;'">
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <input type="checkbox" name="school_grades[]" value="sd"
                                       :checked="isGradeSelected('sd')"
                                       @click.stop="toggleGrade('sd')"
                                       style="accent-color: #0284c7; width: 18px; height: 18px; cursor: pointer;">
                                <div>
                                    <div style="font-size: 13px; font-weight: 700; color: #0f172a;">SD / MI</div>
                                    <div style="font-size: 11px; color: #64748b;">Fase A, B & C • Kelas 1 s/d 6</div>
                                </div>
                            </div>
                            <span style="font-size: 11px; font-weight: 700; padding: 2px 8px; border-radius: 6px; background: #fa5252; color: #ffffff;">Fase A-C</span>
                        </label>
                    </div>
                </div>

                <!-- ------------------------------------------------------ -->
                <!-- SUB-BAGIAN 2: PRO DARI DATA MASTER KELAS (MINIMAL 3)    -->
                <!-- ------------------------------------------------------ -->
                <div style="background: #ffffff; border: 1.5px solid #e2e8f0; border-radius: 16px; padding: 14px;">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 6px;">
                        <div>
                            <span style="font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: #7c3aed;">
                                Bagian 2 • Slider Eksklusif PRO (Master Kelas)
                            </span>
                            <div style="font-size: 14px; font-weight: 800; color: #0f172a; margin-top: 1px;">
                                Grup Kelas PRO (Wajib Pilih Minimal 3)
                            </div>
                        </div>
                        <span style="font-size: 11px; font-weight: 800; padding: 3px 9px; border-radius: 20px; border: 1px solid;"
                              :style="proCount >= 3 ? 'background: #ecfdf5; color: #059669; border-color: #a7f3d0;' : 'background: #fff1f2; color: #e11d48; border-color: #fecdd3;'"
                              x-text="proCount + ' / Min. 3 Dipilih'">
                        </span>
                    </div>

                    <p style="font-size: 12px; color: #64748b; margin-bottom: 10px; line-height: 1.45;">
                        Pilih minimal 3 kartu grup kelas PRO agar slider horizontal di bawah cover profil dapat digeser (*swipeable*) oleh siswa dan pengunjung.
                    </p>

                    <!-- Peringatan jika < 3 -->
                    <div x-show="proCount < 3" style="background: #fff1f2; border: 1px solid #fecdd3; color: #be123c; padding: 8px 12px; border-radius: 10px; font-size: 11.5px; font-weight: 600; margin-bottom: 12px; display: flex; align-items: center; gap: 6px;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                        <span>Pilih minimal 3 grup kelas PRO agar tombol panah dan geser slider aktif.</span>
                    </div>

                    <!-- Checklist Opsi PRO Diambil Langsung dari Master Kelas -->
                    <div style="display: grid; grid-template-columns: 1fr; gap: 8px;">
                        @forelse($proGradeLevels as $gl)
                            @php
                                $itemValue = $gl->value;
                                $itemTitle = $gl->name;
                                $itemGroup = $gl->group ?? 'PRO';
                            @endphp
                            <label @click="togglePro('{{ $itemValue }}')"
                                   style="display: flex; align-items: center; justify-content: space-between; padding: 11px 14px; border-radius: 12px; cursor: pointer; transition: all 0.2s; border: 1.5px solid;"
                                   :style="isProSelected('{{ $itemValue }}') ? 'border-color: #7c3aed; background: #faf5ff; box-shadow: 0 2px 6px rgba(124, 58, 237, 0.08);' : 'border-color: #e2e8f0; background: #f8fafc;'">
                                <div style="display: flex; align-items: center; gap: 12px; min-width: 0;">
                                    <input type="checkbox" name="pro_groups[]" value="{{ $itemValue }}"
                                           :checked="isProSelected('{{ $itemValue }}')"
                                           @click.stop="togglePro('{{ $itemValue }}')"
                                           style="accent-color: #7c3aed; width: 18px; height: 18px; flex-shrink: 0; cursor: pointer;">
                                    <div style="min-width: 0;">
                                        <div style="font-size: 13.5px; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 6px;">
                                            <span>{{ $itemTitle }}</span>
                                            <span style="font-size: 10px; font-family: monospace; font-weight: 700; color: #64748b; background: #e2e8f0; padding: 1px 6px; border-radius: 4px;">{{ $itemValue }}</span>
                                        </div>
                                        <div style="font-size: 11px; color: #64748b; margin-top: 1px;">
                                            Kelompok {{ $itemGroup }} &bull; Terhubung otomatis ke kartu slider asesmen riil
                                        </div>
                                    </div>
                                </div>
                                <span style="font-size: 10px; font-weight: 700; padding: 2px 8px; border-radius: 6px; background: #f1f5f9; color: #475569; flex-shrink: 0; margin-left: 8px;">
                                    {{ $itemGroup }}
                                </span>
                            </label>
                        @empty
                            <div style="padding: 14px; text-align: center; color: #64748b; font-size: 12px;">
                                Belum ada data master kelas kategori PRO. Silakan tambahkan di Master Kelas.
                            </div>
                        @endforelse
                    </div>

                    <!-- Tautan Cepat ke Master Kelas untuk Menambah TOEIC, DLL -->
                    <div style="margin-top: 14px; padding: 10px 14px; border-radius: 12px; background: #f0fdf4; border: 1px solid #bbf7d0; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px;">
                        <div style="font-size: 11.5px; color: #166534; line-height: 1.45;">
                            <strong>Data Dinamis Master Kelas:</strong> Ingin menambahkan asesmen baru seperti <strong>TOEIC</strong>, <strong>IELTS</strong>, atau sertifikasi lainnya? Cukup tambahkan di Master Kelas dan otomatis muncul di sini.
                        </div>
                        <a href="{{ route('grade-levels.index') }}" target="_blank" style="font-size: 11.5px; font-weight: 800; color: #15803d; text-decoration: underline; display: inline-flex; align-items: center; gap: 4px; flex-shrink: 0;">
                            Buka Master Kelas &rarr;
                        </a>
                    </div>
                </div>
            </div>

            <!-- ========================================================== -->
            <!-- CARD: STATUS LEVEL PAKET & BAGI HASIL -->
            <!-- ========================================================== -->
            <div class="content-card" style="border: 2px solid {{ $tenant->isEnterprise() ? '#c084fc' : ($tenant->isPro() ? '#6ee7b7' : '#cbd5e1') }}; background: {{ $tenant->isEnterprise() ? '#faf5ff' : ($tenant->isPro() ? '#f0fdf4' : '#f8fafc') }};">
                <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px;">
                    <div>
                        <div style="font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: {{ $tenant->isEnterprise() ? '#7e22ce' : ($tenant->isPro() ? '#15803d' : '#475569') }};">
                            Status Tingkat Layanan Institusi
                        </div>
                        <h2 style="font-size: 19px; font-weight: 800; color: #0f172a; margin-top: 2px;">
                            {{ $tenant->level_label }}
                        </h2>
                    </div>

                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="font-size: 12px; font-weight: 800; padding: 4px 12px; border-radius: 20px; background: #ffffff; border: 1px solid #e2e8f0; color: #0f172a; box-shadow: 0 1px 2px rgba(0,0,0,0.04);">
                            Bagi Hasil: {{ $tenant->revenue_share_ratio }} (ADZKIA:TENANT)
                        </span>
                        <span style="font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 20px; background: {{ $tenant->isEnterprise() ? '#ede9fe' : ($tenant->isPro() ? '#dcfce7' : '#f1f5f9') }}; color: {{ $tenant->isEnterprise() ? '#6d28d9' : ($tenant->isPro() ? '#166534' : '#475569') }};">
                            {{ $tenant->isEnterprise() ? 'Full White Label' : ($tenant->isPro() ? 'Pro Custom Domain' : 'Starter Subdomain') }}
                        </span>
                    </div>
                </div>

                <div style="margin-top: 10px; font-size: 12px; color: #64748b; line-height: 1.5;">
                    @if($tenant->isStarter())
                        Institusi Anda berada pada paket <strong>STARTER</strong>. Guru bertindak sebagai Pengawas Ujian kurasi ADZKIA (dilengkapi kontrol buka kunci sesi siswa). Upgrade ke PRO atau ENTERPRISE untuk membuat ujian mandiri, custom domain, dan white-label penuh.
                    @elseif($tenant->isPro())
                        Institusi Anda berada pada paket <strong>PRO</strong>. Anda dapat membuat asesmen mandiri tanpa batas, menggunakan 1 custom domain sekolah, dan co-branding ADZKIA.
                    @else
                        Institusi Anda berada pada paket <strong>ENTERPRISE</strong>. Anda menikmati hak <strong>Full White Label</strong> (100% bebas dari sebutan ADZKIA), multi-domain kustom, tema warna dinamis, nama aplikasi sekolah mandiri, dan kendali katalog ujian kurasi.
                    @endif
                </div>
            </div>

            <!-- ========================================================== -->
            <!-- CARD: MANAJEMEN CUSTOM DOMAIN -->
            <!-- ========================================================== -->
            <div class="content-card">
                <h3>
                    <span style="display: inline-flex; align-items: center; justify-content: center; width: 26px; height: 26px; border-radius: 8px; background: #e0f2fe; color: #0284c7;">
                        🌐
                    </span>
                    Pengaturan Custom Domain
                </h3>

                @if($tenant->isStarter())
                    <!-- Locked for Starter -->
                    <div style="margin-top: 14px; padding: 16px; border-radius: 14px; background: #f8fafc; border: 1px dashed #cbd5e1; text-align: center;">
                        <div style="font-size: 24px; margin-bottom: 6px;">🔒</div>
                        <div style="font-size: 13.5px; font-weight: 700; color: #1e293b;">Fitur Custom Domain Terkunci</div>
                        <p style="font-size: 12px; color: #64748b; margin-top: 4px; max-width: 400px; margin-left: auto; margin-right: auto;">
                            Paket STARTER hanya mendukung subdomain sistem (<code>{{ $tenant->subdomain }}.adzkia.id</code>). Upgrade ke paket <strong>PRO</strong> untuk 1 custom domain atau <strong>ENTERPRISE</strong> untuk multi-domain.
                        </p>
                    </div>
                @elseif($tenant->isPro())
                    <!-- 1 Custom Domain for Pro -->
                    <div style="margin-top: 14px;">
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                            Alamat Custom Domain Sekolah (1 Domain)
                        </label>
                        <input type="text" name="custom_domain" value="{{ old('custom_domain', $tenant->domain) }}" 
                               placeholder="Contoh: ujian.sman8.sch.id" 
                               style="width: 100%; padding: 10px 14px; border-radius: 12px; border: 1px solid #cbd5e1; font-size: 13.5px; font-family: monospace; outline: none;">
                        <p style="font-size: 11.5px; color: #64748b; margin-top: 6px;">
                            Arahkan DNS Record <strong>CNAME</strong> domain Anda ke <code>cname.adzkia.id</code> atau <code>127.0.0.1</code>.
                        </p>
                    </div>
                @else
                    <!-- Multi-Domain Manager for Enterprise -->
                    <div style="margin-top: 14px;">
                        <div style="font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 8px;">
                            Daftar Domain Kustom Aktif (Multi-Domain Enterprise)
                        </div>

                        <div style="display: flex; flex-direction: column; gap: 8px;">
                            @forelse($tenant->domains as $d)
                                <div style="display: flex; align-items: center; justify-content: space-between; padding: 10px 14px; border-radius: 12px; background: #f8fafc; border: 1px solid #e2e8f0;">
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <span style="font-family: monospace; font-weight: 700; font-size: 13px; color: #0f172a;">{{ $d->domain }}</span>
                                        @if($d->is_primary)
                                            <span style="font-size: 10px; font-weight: 800; background: #dcfce7; color: #166534; padding: 2px 8px; border-radius: 10px;">UTAMA</span>
                                        @endif
                                        <span style="font-size: 10px; font-weight: 700; background: #e0f2fe; color: #0369a1; padding: 2px 8px; border-radius: 10px;">TERVERIFIKASI</span>
                                    </div>
                                    <button type="submit" 
                                            formaction="{{ route('tenants.domains.destroy', [$tenant, $d]) }}" 
                                            formmethod="POST"
                                            onclick="return confirm('Hapus domain {{ $d->domain }} dari tenant?')"
                                            style="background: transparent; border: none; color: #ef4444; font-size: 11.5px; font-weight: 700; cursor: pointer;">
                                        @csrf
                                        @method('DELETE')
                                        Hapus
                                    </button>
                                </div>
                            @empty
                                <div style="padding: 12px; border-radius: 10px; background: #f8fafc; border: 1px dashed #cbd5e1; text-align: center; font-size: 12px; color: #94a3b8;">
                                    Belum ada domain kustom tambahan yang didaftarkan.
                                </div>
                            @endforelse
                        </div>

                        <!-- Form Tambah Domain Cepat -->
                        <div style="margin-top: 12px; padding: 12px; border-radius: 12px; background: #faf5ff; border: 1px solid #e9d5ff;">
                            <label style="display: block; font-size: 11.5px; font-weight: 700; color: #6b21a8; margin-bottom: 6px;">
                                Tambah Domain Kustom Baru
                            </label>
                            <div style="display: flex; gap: 8px;">
                                <input type="text" name="domain" placeholder="cbt.sman8.sch.id" 
                                       style="flex: 1; padding: 8px 12px; border-radius: 10px; border: 1px solid #d8b4fe; font-size: 13px; font-family: monospace; outline: none; background: #ffffff;">
                                <button type="submit" 
                                        formaction="{{ route('tenants.domains.store', $tenant) }}" 
                                        formmethod="POST"
                                        style="padding: 8px 16px; border-radius: 10px; background: #7c3aed; color: #ffffff; font-size: 12px; font-weight: 700; border: none; cursor: pointer;">
                                    @csrf
                                    + Tambah
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Tombol Simpan Terpadu (Tepat di Bawah Pengaturan Custom Domain) -->
            <div style="margin-top: 18px; margin-bottom: 24px;">
                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 13px 0; font-size: 14.5px;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                    Simpan Semua Perubahan Branding
                </button>
            </div>

            @if($tenant->isEnterprise())
                <!-- ========================================================== -->
                <!-- CARD: FULL WHITE LABEL SETTINGS (EKSKLUSIF ENTERPRISE)     -->
                <!-- ========================================================== -->
                <div class="content-card" style="border: 2px solid #e9d5ff;">
                    <h3>
                        <span style="display: inline-flex; align-items: center; justify-content: center; width: 26px; height: 26px; border-radius: 8px; background: #ede9fe; color: #7c3aed;">
                            ✨
                        </span>
                        Pengaturan Full White Label (Enterprise)
                    </h3>
                    <p style="font-size: 13px; color: #64748b; margin-bottom: 14px;">
                        Kustomisasi aplikasi secara menyeluruh agar terlihat sepenuhnya sebagai sistem milik institusi Anda.
                    </p>

                    <input type="hidden" name="white_label_submitted" value="1">

                    <div style="display: flex; flex-direction: column; gap: 14px;">
                        <!-- Sakelar Sembunyikan ADZKIA -->
                        <div class="list-item-dashed" style="background: #faf5ff; border: 1px solid #e9d5ff; border-radius: 12px; padding: 12px;">
                            <div>
                                <span class="detail-label" style="color: #6b21a8; font-weight: 800;">Sembunyikan Identitas "Powered by ADZKIA"</span>
                                <div class="detail-value" style="font-size: 12px; color: #475569;">
                                    Menghilangkan watermark, kredit, dan sebutan ADZKIA di seluruh portal publik dan footer.
                                </div>
                            </div>
                            <label style="display: inline-flex; align-items: center; gap: 8px; cursor: pointer;">
                                <input type="checkbox" name="hide_adzkia_branding" value="1" {{ $tenant->isWhiteLabel() ? 'checked' : '' }} style="width: 20px; height: 20px; accent-color: #7c3aed; cursor: pointer;">
                                <span style="font-size: 13px; font-weight: 700; color: #6b21a8;">100% Bersih</span>
                            </label>
                        </div>

                        <!-- Nama Aplikasi Kustom -->
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 4px;">
                                Nama Aplikasi Sekolah / Sistem Mandiri
                            </label>
                            <input type="text" name="app_name" value="{{ old('app_name', $tenant->settings['app_name'] ?? $tenant->name) }}" 
                                   placeholder="Contoh: SMAN 8 Smart CBT" 
                                   style="width: 100%; padding: 10px 14px; border-radius: 12px; border: 1px solid #cbd5e1; font-size: 13.5px; outline: none;">
                            <p style="font-size: 11px; color: #64748b; margin-top: 4px;">Nama ini akan menggantikan "ADZKIA" pada judul tab browser, header sistem, dan email.</p>
                        </div>

                        <!-- Warna Tema Primer -->
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 4px;">
                                Warna Tema Primer Antarmuka (Hex Code)
                            </label>
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <input type="color" name="theme_color_picker" 
                                       value="{{ $tenant->theme_color }}" 
                                       oninput="document.getElementById('theme_color_input').value = this.value"
                                       style="width: 44px; height: 44px; border: none; border-radius: 10px; cursor: pointer; background: transparent;">
                                <input type="text" id="theme_color_input" name="theme_color" 
                                       value="{{ old('theme_color', $tenant->theme_color) }}" 
                                       placeholder="#0284c7" 
                                       style="flex: 1; padding: 10px 14px; border-radius: 12px; border: 1px solid #cbd5e1; font-size: 13.5px; font-family: monospace; outline: none;">
                            </div>
                        </div>

                        <!-- Pengirim Email -->
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                            <div>
                                <label style="display: block; font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 4px;">
                                    Nama Pengirim Notifikasi Email
                                </label>
                                <input type="text" name="sender_name" value="{{ old('sender_name', $tenant->settings['sender_name'] ?? '') }}" 
                                       placeholder="CBT SMAN 8" 
                                       style="width: 100%; padding: 10px 14px; border-radius: 12px; border: 1px solid #cbd5e1; font-size: 13px; outline: none;">
                            </div>
                            <div>
                                <label style="display: block; font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 4px;">
                                    Alamat Email Pengirim
                                </label>
                                <input type="email" name="sender_email" value="{{ old('sender_email', $tenant->settings['sender_email'] ?? '') }}" 
                                       placeholder="cbt@sman8.sch.id" 
                                       style="width: 100%; padding: 10px 14px; border-radius: 12px; border: 1px solid #cbd5e1; font-size: 13px; outline: none;">
                            </div>
                        </div>

                        <!-- Kop Sertifikat -->
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 4px;">
                                Judul Kop Sertifikat Ujian
                            </label>
                            <input type="text" name="certificate_title" value="{{ old('certificate_title', $tenant->settings['certificate_title'] ?? '') }}" 
                                   placeholder="Sertifikat Kelulusan Ujian Standar Nasional {{ $tenant->name }}" 
                                   style="width: 100%; padding: 10px 14px; border-radius: 12px; border: 1px solid #cbd5e1; font-size: 13px; outline: none;">
                        </div>
                    </div>
                </div>

                <!-- ========================================================== -->
                <!-- CARD: KENDALI ON/OFF ASESMEN ADZKIA (ENTERPRISE ONLY)      -->
                <!-- ========================================================== -->
                <div class="content-card" style="border: 2px solid #fed7aa;">
                    <h3>
                        <span style="display: inline-flex; align-items: center; justify-content: center; width: 26px; height: 26px; border-radius: 8px; background: #ffedd5; color: #ea580c;">
                            🎛️
                        </span>
                        Kendali Katalog Asesmen ADZKIA (Enterprise)
                    </h3>
                    <p style="font-size: 13px; color: #64748b; margin-bottom: 14px;">
                        Pilih asesmen kurasi ADZKIA yang ingin Anda tayangkan. Asesmen dengan tanda <strong>🔒 Wajib Tayang Nasional</strong> dipaksa tampil oleh Owner ADZKIA dan tidak dapat dimatikan.
                    </p>

                    <input type="hidden" name="adzkia_toggles_submitted" value="1">

                    <div style="display: flex; flex-direction: column; gap: 8px; max-height: 380px; overflow-y: auto; padding-right: 4px;">
                        @foreach($adzkiaAssessments as $adzkiaItem)
                            @php
                                $isMandatory = (bool) $adzkiaItem->is_mandatory;
                                $isEnabled = $tenant->isAssessmentVisible($adzkiaItem);
                            @endphp
                            <div style="display: flex; align-items: center; justify-content: space-between; padding: 10px 14px; border-radius: 12px; background: {{ $isMandatory ? '#fffbeb' : '#f8fafc' }}; border: 1px solid {{ $isMandatory ? '#fde68a' : '#e2e8f0' }};">
                                <div style="flex: 1; padding-right: 12px;">
                                    <div style="display: flex; align-items: center; gap: 6px; flex-wrap: wrap;">
                                        <span style="font-weight: 700; font-size: 13px; color: #0f172a;">{{ $adzkiaItem->title }}</span>
                                        @if($isMandatory)
                                            <span style="font-size: 10px; font-weight: 800; background: #fef3c7; color: #b45309; border: 1px solid #fcd34d; padding: 2px 8px; border-radius: 10px;">
                                                🔒 WAJIB TAYANG NASIONAL (OWNER)
                                            </span>
                                        @else
                                            <span style="font-size: 10px; font-weight: 700; background: #e0f2fe; color: #0369a1; padding: 2px 8px; border-radius: 10px;">
                                                PILIHAN
                                            </span>
                                        @endif
                                    </div>
                                    <div style="font-size: 11.5px; color: #64748b; margin-top: 2px;">
                                        {{ $adzkiaItem->subject?->name ?? 'Umum' }} &bull; {{ $adzkiaItem->duration_minutes }} menit &bull; {{ $adzkiaItem->grade_level ?: 'Semua Jenjang' }}
                                    </div>
                                </div>

                                <div>
                                    @if($isMandatory)
                                        <input type="hidden" name="adzkia_assessments[{{ $adzkiaItem->id }}]" value="1">
                                        <span style="font-size: 11px; font-weight: 800; color: #b45309; background: #fff7ed; padding: 4px 10px; border-radius: 14px; border: 1px solid #ffedd5;">
                                            Terkunci ON
                                        </span>
                                    @else
                                        <label style="display: inline-flex; align-items: center; gap: 6px; cursor: pointer;">
                                            <input type="checkbox" name="adzkia_assessments[{{ $adzkiaItem->id }}]" value="1" {{ $isEnabled ? 'checked' : '' }} style="width: 18px; height: 18px; accent-color: #ea580c; cursor: pointer;">
                                            <span style="font-size: 12.5px; font-weight: 600; color: #334155;">Tayang</span>
                                        </label>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif



            <!-- Toast Salin URL -->
            <div x-show="copied" x-transition.opacity.duration.200ms class="copy-toast" style="display: none;">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#34d399" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                <span>Tautan portal berhasil disalin ke clipboard!</span>
            </div>

        </form>
    </div>

    <script>
        function brandingForm() {
            return {
                coverPreview: null,
                logoPreview: null,
                faviconPreview: null,
                taglineText: @json($tenant->tagline ?? 'Mewujudkan generasi cerdas, berkarakter, dan berdaya saing global.'),
                selectedTheme: @json($tenant->getThemePalette()),
                selectedGrades: @json($tenant->getSchoolGrades()),
                selectedPro: @json($tenant->getProGroups()),
                palettesData: @json($palettes),
                copied: false,
                
                get schoolGradeCount() {
                    return this.selectedGrades.length;
                },
                toggleGrade(grade) {
                    if (this.selectedGrades.includes(grade)) {
                        this.selectedGrades = this.selectedGrades.filter(g => g !== grade);
                    } else {
                        this.selectedGrades.push(grade);
                    }
                },
                isGradeSelected(grade) {
                    return this.selectedGrades.includes(grade);
                },
                get proCount() {
                    return this.selectedPro.length;
                },
                togglePro(key) {
                    if (this.selectedPro.includes(key)) {
                        this.selectedPro = this.selectedPro.filter(k => k !== key);
                    } else {
                        this.selectedPro.push(key);
                    }
                },
                isProSelected(key) {
                    return this.selectedPro.includes(key);
                },
                previewCover(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.coverPreview = URL.createObjectURL(file);
                    }
                },
                previewLogo(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.logoPreview = URL.createObjectURL(file);
                    }
                },
                previewFavicon(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.faviconPreview = URL.createObjectURL(file);
                    }
                },
                copyToClipboard(text) {
                    navigator.clipboard.writeText(text).then(() => {
                        this.copied = true;
                        setTimeout(() => {
                            this.copied = false;
                        }, 2500);
                    }).catch(err => {
                        console.error('Gagal menyalin tautan:', err);
                    });
                }
            }
        }
    </script>
</x-layouts.app>
