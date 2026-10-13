<x-layouts.app>
    <!-- Font Open Sans & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Outfit:wght@500;600;700;800;900&display=swap" rel="stylesheet">

    @php
        $user = auth()->user();
        $isSuper = $user->isSuperUser();
        $isAdmin = $user->isAdmin();
        $isTeacher = $user->isTeacher();
        $isStudent = (! $isSuper && ! $isAdmin && ! $isTeacher);

        $roleTitle = $isTeacher ? 'Profil Tenaga Pendidik' : ($isAdmin || $isSuper ? 'Profil Administrator Lembaga' : 'Profil Siswa');
    @endphp

    <style>
        .custom-profile-wrapper * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Open Sans', sans-serif;
        }

        .custom-profile-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            color: #212529;
            padding: 10px 0 50px 0;
        }

        .font-display, h1, h2, h3, .profile-name, .content-card h3 {
            font-family: 'Outfit', sans-serif;
        }

        /* Container Utama */
        .main-container {
            width: 100%;
            max-width: 1140px;
            padding: 0 16px;
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        /* 2-KOLOM LAYOUT (KANAN-KIRI KE BAWAH) */
        .profile-two-columns {
            display: grid;
            grid-template-columns: 1fr;
            gap: 22px;
            width: 100%;
            align-items: start;
        }

        @media (min-width: 992px) {
            .profile-two-columns {
                grid-template-columns: 1fr 1fr;
                gap: 24px;
            }
        }

        .profile-column {
            display: flex;
            flex-direction: column;
            gap: 22px;
            width: 100%;
            min-width: 0;
        }

        /* CARD PROFIL UTAMA */
        .profile-card {
            background: #ffffff;
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05), 0 1px 3px rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(226, 232, 240, 0.8);
            overflow: hidden;
            text-align: center;
            position: relative;
            display: flex;
            flex-direction: column;
            min-height: auto;
        }

        /* SOCIAL MEDIA BUTTONS & POPUP */
        .social-icons-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        @media (min-width: 480px) {
            .social-icons-grid {
                grid-template-columns: repeat(8, 1fr);
            }
        }

        .social-icon-btn {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 54px;
            border-radius: 14px;
            border: 1.5px solid #e2e8f0;
            background: #f8fafc;
            color: #94a3b8;
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
            user-select: none;
            padding: 4px;
        }

        .social-icon-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.06);
            border-color: #cbd5e1;
            color: #64748b;
        }

        .social-icon-btn.is-active {
            border-width: 2px;
            transform: translateY(-1px);
        }

        .social-active-dot {
            position: absolute;
            top: 4px;
            right: 4px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #10b981;
            border: 1.5px solid #ffffff;
            box-shadow: 0 1px 3px rgba(0,0,0,0.2);
        }

        /* MODAL OVERLAY */
        .social-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
        }

        .social-modal-content {
            background: #ffffff;
            border-radius: 20px;
            max-width: 440px;
            width: 100%;
            padding: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(226, 232, 240, 0.9);
            position: relative;
            animation: modalPop 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes modalPop {
            from {
                opacity: 0;
                transform: scale(0.95) translateY(10px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        /* Area Cover Dinamis Sesuai Peran */
        .profile-cover {
            width: 100%;
            height: 29%;
            overflow: hidden;
            position: relative;
            @if($isTeacher)
                background: linear-gradient(135deg, #059669, #0d9488);
            @elseif($isAdmin || $isSuper)
                background: linear-gradient(135deg, #4f46e5, #7c3aed);
            @else
                background: linear-gradient(135deg, #0284c7, #2563eb);
            @endif
        }

        .profile-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cover-upload-btn {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(4px);
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
            transition: all 0.2s ease;
            z-index: 5;
        }
        .cover-upload-btn:hover {
            background: #ffffff;
            transform: scale(1.05);
        }

        /* Foto Profil Bulat */
        .profile-image-container {
            width: 110px;
            height: 110px;
            margin: -55px auto 10px;
            position: relative;
            z-index: 2;
        }

        .profile-image {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: #f1f5f9;
            object-fit: cover;
            border: 4px solid #ffffff;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.12);
        }

        .avatar-upload-btn {
            position: absolute;
            bottom: 0;
            right: 0;
            background: #ffffff;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.12);
            transition: all 0.2s ease;
        }
        .avatar-upload-btn:hover {
            transform: scale(1.08);
            border-color: #0284c7;
        }

        /* Konten Utama */
        .profile-content {
            padding: 0 24px 22px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .profile-name {
            font-size: 22px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.01em;
            width: 100%;
            text-align: center;
            border: none;
            border-bottom: 1px dashed #cbd5e1;
            padding-bottom: 4px;
            margin-bottom: 6px;
            background: transparent;
            outline: none;
            font-family: 'Outfit', sans-serif;
            transition: border-color 0.2s ease;
        }
        .profile-name:focus { border-bottom-color: #0284c7; }

        .profile-username-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14.5px;
            font-weight: 700;
            margin-top: 1px;
            margin-bottom: 6px;
            gap: 2px;
            @if($isTeacher)
                color: #059669;
            @elseif($isAdmin || $isSuper)
                color: #4f46e5;
            @else
                color: #0284c7;
            @endif
        }

        .profile-username {
            font-size: 14.5px;
            font-weight: 700;
            border: none;
            border-bottom: 1px dashed #cbd5e1;
            background: transparent;
            outline: none;
            padding: 1px 4px;
            font-family: 'Open Sans', sans-serif;
            transition: border-color 0.2s ease;
            text-align: center;
            color: inherit;
        }
        .profile-username:focus { border-bottom-color: #0284c7; }

        .role-pill-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 12px;
            border-radius: 20px;
            font-size: 11.5px;
            font-weight: 700;
            margin-bottom: 8px;
            @if($isTeacher)
                background: #dcfce7;
                color: #15803d;
                border: 1px solid #bbf7d0;
            @elseif($isAdmin || $isSuper)
                background: #ede9fe;
                color: #6d28d9;
                border: 1px solid #ddd6fe;
            @else
                background: #e0f2fe;
                color: #0369a1;
                border: 1px solid #bae6fd;
            @endif
        }

        .profile-bio {
            font-size: 13.5px;
            color: #475569;
            line-height: 1.55;
            margin-bottom: 12px;
            width: 100%;
            text-align: center;
            border: 1px dashed #cbd5e1;
            border-radius: 12px;
            padding: 8px 12px;
            background: transparent;
            outline: none;
            resize: none;
            font-family: 'Open Sans', sans-serif;
            transition: border-color 0.2s ease;
        }
        .profile-bio:focus { border-color: #0284c7; }

        /* Area Data Detail Ringkas */
        .profile-details {
            text-align: left;
            background-color: #f8f9fa;
            border-radius: 14px;
            border: 1px solid #edf2f7;
            padding: 12px 16px;
            margin-bottom: 14px;
        }

        .detail-item {
            font-size: 13.5px;
            color: #4b5563;
            margin-bottom: 8px;
            display: flex;
            flex-direction: column;
        }

        .detail-item:last-child {
            margin-bottom: 0;
        }

        .detail-label {
            font-size: 11px;
            text-transform: uppercase;
            color: #64748b;
            font-weight: 700;
            letter-spacing: 0.5px;
            margin-bottom: 2px;
        }

        .detail-value {
            color: #0f172a;
            font-weight: 600;
            font-size: 14.5px;
        }

        .detail-input {
            width: 100%;
            border: none;
            border-bottom: 1px dashed #cbd5e1;
            background: transparent;
            font-weight: 600;
            color: #0f172a;
            font-size: 14.5px;
            outline: none;
            padding: 3px 0;
            font-family: 'Open Sans', sans-serif;
            transition: border-color 0.2s ease;
        }
        .detail-input:focus { border-bottom-color: #0284c7; }
        
        .detail-textarea {
            width: 100%;
            border: none;
            border-bottom: 1px dashed #cbd5e1;
            background: transparent;
            font-weight: 600;
            color: #0f172a;
            font-size: 14px;
            outline: none;
            padding: 3px 0;
            resize: none;
            font-family: 'Open Sans', sans-serif;
            line-height: 1.5;
            transition: border-color 0.2s ease;
        }
        .detail-textarea:focus { border-bottom-color: #0284c7; }

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
            font-size: 14.5px;
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
            transform: translateY(-1px);
        }

        .btn-save {
            color: #ffffff;
            @if($isTeacher)
                background-color: #059669;
                box-shadow: 0 4px 14px rgba(5, 150, 105, 0.3);
            @elseif($isAdmin || $isSuper)
                background-color: #4f46e5;
                box-shadow: 0 4px 14px rgba(79, 70, 229, 0.3);
            @else
                background-color: #0284c7;
                box-shadow: 0 4px 14px rgba(2, 132, 199, 0.3);
            @endif
        }
        .btn-save:hover {
            @if($isTeacher)
                background-color: #047857;
            @elseif($isAdmin || $isSuper)
                background-color: #4338ca;
            @else
                background-color: #0369a1;
            @endif
        }

        .btn-public {
            background-color: #f1f5f9;
            color: #334155;
            border: 1px solid #cbd5e1;
        }
        .btn-public:hover { background-color: #e2e8f0; color: #0f172a; }

        /* CARD TAMBAHAN DI BAWAH */
        .content-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 22px 24px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(226, 232, 240, 0.8);
            width: 100%;
        }

        .content-card h3 {
            font-size: 16.5px;
            color: #0f172a;
            margin-bottom: 12px;
            font-weight: 700;
            letter-spacing: -0.01em;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* RADIX UI HORIZONTAL SCROLL GRID (1 BARIS ASESMEN) */
        .rt-scroll-area {
            width: 100%;
            overflow-x: auto;
            overflow-y: hidden;
            padding-bottom: 8px;
            padding-top: 2px;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: thin;
            scrollbar-color: #cbd5e1 transparent;
        }

        .rt-scroll-area::-webkit-scrollbar { height: 5px; }
        .rt-scroll-area::-webkit-scrollbar-track { background: transparent; }
        .rt-scroll-area::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }

        .rt-Grid {
            display: grid;
            grid-auto-flow: column;
            grid-auto-columns: 210px;
            grid-template-rows: 1fr;
            gap: 12px;
            width: max-content;
        }

        .rt-reset {
            margin: 0;
            padding: 0;
            text-decoration: none;
            color: inherit;
        }

        .rt-BaseCard, .rt-Card {
            width: 210px;
            min-width: 210px;
            max-width: 210px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 14px;
            display: flex;
            flex-direction: column;
            scroll-snap-align: start;
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
            cursor: pointer;
            text-align: left;
            box-sizing: border-box;
        }

        .rt-BaseCard:hover, .rt-Card:hover {
            border-color: #0284c7;
            box-shadow: 0 8px 20px rgba(2, 132, 199, 0.12);
            transform: translateY(-2px);
        }

        .rt-Box { box-sizing: border-box; }
        .rt-r-mb-3 { margin-bottom: 10px; }

        .rt-Heading {
            font-family: 'Outfit', sans-serif;
            font-size: 14.5px;
            font-weight: 700;
            color: #0f172a;
            line-height: 1.35;
        }

        .rt-r-mb-1 { margin-bottom: 5px; }

        .rt-Text {
            font-family: 'Open Sans', sans-serif;
            font-size: 12.5px;
            color: #64748b;
            line-height: 1.5;
        }

        /* Detail List Item with Dashed Lines */
        .list-item-dashed {
            border-bottom: 1px dashed #e2e8f0;
            padding-bottom: 10px;
            margin-bottom: 10px;
            display: flex;
            flex-direction: column;
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
    </style>

    <div class="custom-profile-wrapper">
        <div class="main-container">
            <!-- Dedicated Form Ganti Password (Terhubung via form='password-form' dari card kolom kanan) -->
            <form id="password-form" action="{{ route('profile.password.update') }}" method="POST" style="display: none;">
                @csrf
                @method('PUT')
            </form>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 22px; width: 100%;" x-data="profileForm()">
                @csrf
                @method('PUT')
            
            @if(session('success'))
                <div style="background-color: #d4edda; color: #155724; padding: 12px 18px; border-radius: 12px; font-size: 14px; text-align: center; width: 100%; font-weight: 600; border: 1px solid #c3e6cb; box-shadow: 0 2px 6px rgba(0,0,0,0.02);">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div style="background-color: #f8d7da; color: #721c24; padding: 12px 18px; border-radius: 12px; font-size: 13.5px; width: 100%; border: 1px solid #f5c6cb;">
                    <ul style="list-style: disc; padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="profile-two-columns">
                <!-- ================= DIV KOLOM KIRI: DATA DIRI, KONTAK & MEDSOS, DOMISILI ================= -->
                <div class="profile-column">
                    <!-- CARD 1: IDENTITAS PROFIL SISWA & GURU (LIVE PREVIEW & EDIT) -->
                    <div class="profile-card">
                        <!-- Area Cover Natural -->
                        <div class="profile-cover" style="height: auto; max-height: 220px; overflow: hidden; position: relative;">
                            <img :src="coverPreview || '{{ $user->cover_photo_url }}'" alt="Gambar Sampul" style="width: 100%; height: auto; max-height: 220px; object-fit: cover; display: block;">
                            <template x-if="coverPreview">
                                <span class="absolute top-3 left-3 bg-black/70 text-white text-[11px] font-bold px-2.5 py-1 rounded-full backdrop-blur-md shadow-xs flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                    <span>Sampul Baru Siap Disimpan</span>
                                </span>
                            </template>
                            <label class="cover-upload-btn" title="Ganti Sampul (Maks 5MB)">
                                <svg class="w-4 h-4 text-gray-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                                    <circle cx="12" cy="13" r="4"></circle>
                                </svg>
                                <input type="file" name="cover_photo" style="display: none;" accept="image/*" @change="previewCover">
                            </label>
                        </div>
                        
                        <!-- Foto Profil Bulat: Separuh Atas Menutupi Cover -->
                        <div class="profile-image-container" style="width: 100px; height: 100px; margin: -50px auto 12px; position: relative; z-index: 5;">
                            <img :src="avatarPreview || '{{ $user->profile_photo_url }}'" alt="Foto Profil" class="profile-image" style="width: 100px; height: 100px; border-radius: 50%; border: 4px solid #ffffff; box-shadow: 0 6px 18px rgba(0,0,0,0.12); object-fit: cover;">
                            <template x-if="avatarPreview">
                                <span class="absolute -bottom-2 left-1/2 -translate-x-1/2 bg-blue-600 text-white text-[9px] font-extrabold px-2 py-0.5 rounded-full shadow-md whitespace-nowrap">
                                    Foto Baru
                                </span>
                            </template>
                            <label class="avatar-upload-btn" title="Ganti Foto Profil (Maks 2MB)">
                                <svg class="w-4 h-4 text-gray-800" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                                    <circle cx="12" cy="13" r="4"></circle>
                                </svg>
                                <input type="file" name="profile_photo" style="display: none;" accept="image/*" @change="previewAvatar">
                            </label>
                        </div>
                        
                        <div class="profile-content">
                            <div>
                                <div style="display: flex; align-items: center; justify-content: center; gap: 6px;">
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="profile-name" 
                                           placeholder="{{ $isTeacher ? 'Nama Guru & Gelar' : ($isAdmin ? 'Nama Administrator' : 'Nama Siswa') }}" required>
                                    <span title="Akun Terverifikasi" style="color: #0284c7; display: inline-flex; align-items: center;">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="#0284c7"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                                    </span>
                                </div>
                                
                                <div class="profile-username-wrapper">
                                    <span>@</span>
                                    <input type="text" name="username" value="{{ old('username', $user->username) }}" 
                                           class="profile-username" placeholder="username_anda"
                                           x-on:input="$event.target.value = $event.target.value.replace(/[@\s]/g, '_').toLowerCase()">
                                </div>
                                <p class="text-[11px] text-gray-500 mb-2">Gunakan huruf, angka, titik (.), strip (-), atau garis bawah (_).</p>
                                @error('username')
                                    <p class="text-xs text-red-600 font-bold mb-2">{{ $message }}</p>
                                @enderror
                                
                                <textarea name="bio" class="profile-bio" rows="2" 
                                          placeholder="{{ $isTeacher ? 'Tuliskan bidang studi atau moto pembelajaran Anda...' : ($isAdmin ? 'Tuliskan peran dan tanggung jawab pengelola institusi...' : 'Tuliskan deskripsi singkat atau moto belajar Anda...') }}">{{ old('bio', $user->bio) }}</textarea>
                            </div>
                            
                            <div>
                                @if($isTeacher)
                                    <!-- 3-Column Stats untuk Guru -->
                                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 6px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 14px; padding: 10px 4px; margin-bottom: 14px;">
                                        <div style="text-align: center;">
                                            <div style="font-family: 'Outfit', sans-serif; font-size: 18px; font-weight: 800; color: #0f172a;">{{ $user->assessments()->count() }}</div>
                                            <div style="font-size: 10px; color: #64748b; font-weight: 700; text-transform: uppercase;">Ujian Dibuat</div>
                                        </div>
                                        <div style="text-align: center; border-left: 1px solid #e2e8f0; border-right: 1px solid #e2e8f0;">
                                            <div style="font-family: 'Outfit', sans-serif; font-size: 18px; font-weight: 800; color: #0f172a;">-</div>
                                            <div style="font-size: 10px; color: #64748b; font-weight: 700; text-transform: uppercase;">Total Soal</div>
                                        </div>
                                        <div style="text-align: center;">
                                            <div style="font-family: 'Outfit', sans-serif; font-size: 18px; font-weight: 800; color: #0f172a;">-</div>
                                            <div style="font-size: 10px; color: #64748b; font-weight: 700; text-transform: uppercase;">Peringkat Guru</div>
                                        </div>
                                    </div>
                                @elseif($isAdmin || $isSuper)
                                    <div style="padding: 10px 14px; border-radius: 14px; background: #f8fafc; border: 1px solid #e2e8f0; font-size: 12px; color: #64748b; text-align: center; margin-bottom: 14px; font-weight: 600;">
                                        🛡️ Akun Administrator / Pengelola Institusi (Profil Publik Non-aktif)
                                    </div>
                                @endif
                                
                                <div class="profile-actions">
                                    <button type="submit" class="btn btn-save">Simpan Profil</button>
                                    @if($user->username && $user->hasPublicProfile())
                                        <a href="{{ route('global.student.profile', $user->username) }}" target="_blank" class="btn btn-public">
                                            <x-radix-icon name="external-link" style="width: 15px; height: 15px;" />
                                            <span>Lihat Publik</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CARD KONTEN 1: INFORMASI KONTAK & KOMUNIKASI (MODERN & AKTIF) -->
                    <div class="content-card" id="kontak-card">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 6px;">
                            <h3 style="margin-bottom: 0;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                Informasi Kontak &amp; Komunikasi
                            </h3>
                            <span style="font-size: 11px; font-weight: 700; color: #0284c7; background: #e0f2fe; padding: 2px 8px; border-radius: 6px;">
                                Verifikasi Resmi
                            </span>
                        </div>
                        <p style="font-size: 12.5px; color: #64748b; margin-bottom: 16px;">
                            Nomor WhatsApp dan email aktif digunakan untuk pengiriman token ujian CBT, notifikasi hasil, dan pemulihan akun.
                        </p>

                        @if(session('success_contact'))
                            <div style="background-color: #d1fae5; color: #065f46; padding: 10px 14px; border-radius: 12px; font-size: 13px; font-weight: 600; margin-bottom: 14px; border: 1px solid #a7f3d0; display: flex; align-items: center; gap: 8px;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                <span>{{ session('success_contact') }}</span>
                            </div>
                        @endif
                        @if(session('error_contact'))
                            <div style="background-color: #fee2e2; color: #991b1b; padding: 10px 14px; border-radius: 12px; font-size: 13px; font-weight: 600; margin-bottom: 14px; border: 1px solid #fecaca; display: flex; align-items: center; gap: 8px;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                <span>{{ session('error_contact') }}</span>
                            </div>
                        @endif
                        @if(session('info_contact'))
                            <div style="background-color: #e0f2fe; color: #075985; padding: 10px 14px; border-radius: 12px; font-size: 13px; font-weight: 600; margin-bottom: 14px; border: 1px solid #bae6fd; display: flex; align-items: center; gap: 8px;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                <span>{{ session('info_contact') }}</span>
                            </div>
                        @endif

                        <div style="display: flex; flex-direction: column; gap: 14px;">
                            <!-- BLOK WHATSAPP -->
                            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 14px; padding: 14px 16px;">
                                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px; flex-wrap: wrap; gap: 6px;">
                                    <div style="display: flex; items-center; gap: 6px;">
                                        <span style="color: #25d366; font-size: 16px;">💬</span>
                                        <span class="detail-label" style="font-size: 12px; color: #334155; margin-bottom: 0;">Nomor WhatsApp</span>
                                    </div>
                                    @if($user->isWhatsappVerified())
                                        <span style="display: inline-flex; align-items: center; gap: 5px; font-size: 11px; font-weight: 700; color: #166534; background: #dcfce7; padding: 3px 9px; border-radius: 20px; border: 1px solid #bbf7d0;">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                            Terverifikasi ({{ $user->whatsapp_verified_at->format('d M Y H:i') }})
                                        </span>
                                    @else
                                        <span style="display: inline-flex; align-items: center; gap: 5px; font-size: 11px; font-weight: 700; color: #b45309; background: #fef3c7; padding: 3px 9px; border-radius: 20px; border: 1px solid #fde68a;">
                                            ⚠️ Belum Terverifikasi
                                        </span>
                                    @endif
                                </div>

                                <div style="display: flex; align-items: center; border: 1px solid #cbd5e1; border-radius: 10px; background: #ffffff; overflow: hidden; margin-bottom: 10px;">
                                    <div style="padding: 7px 10px; background: #f1f5f9; border-right: 1px solid #cbd5e1; font-size: 12px; font-weight: 700; color: #475569; display: flex; align-items: center; gap: 4px;">
                                        <span>🇮🇩</span><span>+62</span>
                                    </div>
                                    <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number', $user->whatsapp_number) }}" 
                                           style="width: 100%; border: none; padding: 7px 10px; font-size: 13.5px; font-weight: 600; color: #0f172a; outline: none; background: transparent;" 
                                           placeholder="Contoh: 081234567890">
                                </div>

                                <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px;">
                                    @if(! $user->isWhatsappVerified())
                                        <button type="submit" formaction="{{ route('profile.verify.whatsapp') }}" 
                                                style="background: #16a34a; color: #ffffff; border: none; padding: 7px 14px; border-radius: 10px; font-size: 12px; font-weight: 700; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; box-shadow: 0 2px 6px rgba(22, 163, 74, 0.25);">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                            <span>Verifikasi WhatsApp Sekarang</span>
                                        </button>
                                    @else
                                        <span style="font-size: 11px; color: #64748b;">Notifikasi otomatis aktif ke nomor ini.</span>
                                        <button type="submit" formaction="{{ route('profile.unverify.contact') }}" name="type" value="whatsapp"
                                                style="background: transparent; color: #94a3b8; border: 1px dashed #cbd5e1; padding: 4px 8px; border-radius: 6px; font-size: 10.5px; font-weight: 600; cursor: pointer;"
                                                title="Reset status verifikasi untuk pengujian">
                                            Reset Status WA
                                        </button>
                                    @endif
                                </div>
                            </div>

                            <!-- BLOK EMAIL -->
                            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 14px; padding: 14px 16px;">
                                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px; flex-wrap: wrap; gap: 6px;">
                                    <div style="display: flex; items-center; gap: 6px;">
                                        <span style="color: #0284c7; font-size: 16px;">✉️</span>
                                        <span class="detail-label" style="font-size: 12px; color: #334155; margin-bottom: 0;">Alamat Email Utama</span>
                                    </div>
                                    @if($user->email_verified_at)
                                        <span style="display: inline-flex; align-items: center; gap: 5px; font-size: 11px; font-weight: 700; color: #166534; background: #dcfce7; padding: 3px 9px; border-radius: 20px; border: 1px solid #bbf7d0;">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                            Terverifikasi ({{ $user->email_verified_at->format('d M Y H:i') }})
                                        </span>
                                    @else
                                        <span style="display: inline-flex; align-items: center; gap: 5px; font-size: 11px; font-weight: 700; color: #b45309; background: #fef3c7; padding: 3px 9px; border-radius: 20px; border: 1px solid #fde68a;">
                                            ⚠️ Belum Terverifikasi
                                        </span>
                                    @endif
                                </div>

                                <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 10px; padding: 8px 12px; margin-bottom: 10px; display: flex; align-items: center; justify-content: space-between;">
                                    <span style="font-size: 13.5px; font-weight: 700; color: #0f172a;">{{ $user->email }}</span>
                                    <span style="font-size: 11px; color: #94a3b8; font-weight: 600;">(Akun Login)</span>
                                </div>

                                <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px;">
                                    @if(! $user->email_verified_at)
                                        <button type="submit" formaction="{{ route('profile.verify.email') }}" 
                                                style="background: #0284c7; color: #ffffff; border: none; padding: 7px 14px; border-radius: 10px; font-size: 12px; font-weight: 700; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; box-shadow: 0 2px 6px rgba(2, 132, 199, 0.25);">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                            <span>Verifikasi Email Sekarang</span>
                                        </button>
                                    @else
                                        <span style="font-size: 11px; color: #64748b;">Email ini diakui valid untuk pengiriman laporan ujian.</span>
                                        <button type="submit" formaction="{{ route('profile.unverify.contact') }}" name="type" value="email"
                                                style="background: transparent; color: #94a3b8; border: 1px dashed #cbd5e1; padding: 4px 8px; border-radius: 6px; font-size: 10.5px; font-weight: 600; cursor: pointer;"
                                                title="Reset status verifikasi untuk pengujian">
                                            Reset Status Email
                                        </button>
                                    @endif
                                </div>
                            </div>

                            <!-- BLOK MEDIA SOSIAL (TERHUBUNG KE BIOLINK PROFIL - LETAK DI BAWAH EMAIL) -->
                            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 14px; padding: 14px 16px;">
                                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px; flex-wrap: wrap; gap: 6px;">
                                    <div style="display: flex; align-items: center; gap: 6px;">
                                        <span style="font-size: 16px;">🌐</span>
                                        <span class="detail-label" style="font-size: 12px; color: #334155; margin-bottom: 0;">Media Sosial Biolink</span>
                                    </div>
                                    <span style="font-size: 11px; font-weight: 700; color: #0284c7; background: #e0f2fe; padding: 2px 8px; border-radius: 20px;">
                                        Klik Icon untuk Input URL
                                    </span>
                                </div>
                                <p style="font-size: 11.5px; color: #64748b; margin-bottom: 12px; line-height: 1.45;">
                                    Pilih platform di bawah ini. Icon warna abu-abu menandakan tautan belum diisi. Setelah diisi link, warna icon otomatis menyala sesuai warna asli platform dan ditampilkan di profil biolink Anda.
                                </p>

                                <!-- Hidden Inputs untuk Social Links agar tersimpan ke Backend -->
                                <template x-for="p in socialPlatforms" :key="p.key">
                                    <input type="hidden" :name="'social_links[' + p.key + ']'" :value="socialLinks[p.key] || ''">
                                </template>

                                <!-- Grid 8 Icon Media Sosial (Abu vs Cerah) -->
                                <div class="social-icons-grid">
                                    <template x-for="p in socialPlatforms" :key="p.key">
                                        <button type="button" 
                                                @click="openSocialEdit(p.key)"
                                                class="social-icon-btn"
                                                :class="{ 'is-active': hasSocial(p.key) }"
                                                :style="hasSocial(p.key) ? {
                                                    backgroundColor: p.bg,
                                                    borderColor: p.border,
                                                    color: p.text,
                                                    boxShadow: '0 4px 12px ' + p.border + '35'
                                                } : {}"
                                                :title="p.name + (hasSocial(p.key) ? ': ' + socialLinks[p.key] : ' (Belum diisi - Klik untuk isi URL)')">
                                            
                                            <!-- Dot Indikator Hijau Jika Terhubung -->
                                            <span x-show="hasSocial(p.key)" class="social-active-dot"></span>

                                            <!-- SVG Icon Masing-Masing Platform -->
                                            <template x-if="p.key === 'instagram'">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 20px; height: 20px;"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                                            </template>
                                            <template x-if="p.key === 'tiktok'">
                                                <svg viewBox="0 0 24 24" fill="currentColor" style="width: 20px; height: 20px;"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1.04-.1z"/></svg>
                                            </template>
                                            <template x-if="p.key === 'whatsapp'">
                                                <svg viewBox="0 0 24 24" fill="currentColor" style="width: 20px; height: 20px;"><path d="M17.472 14.382c-.301-.15-1.777-.877-2.052-.977-.275-.1-.476-.15-.676.15-.2.301-.776.977-.951 1.178-.175.2-.351.226-.652.075-.3-.15-1.27-.468-2.42-1.494-.894-.798-1.497-1.784-1.672-2.084-.176-.301-.019-.464.132-.614.135-.136.301-.351.451-.527.151-.176.201-.301.302-.502.1-.2.05-.376-.026-.526-.075-.151-.676-1.63-.927-2.232-.244-.587-.493-.507-.677-.517-.175-.01-.376-.01-.577-.01-.2 0-.526.075-.802.376-.276.301-1.053 1.028-1.053 2.508 0 1.48 1.079 2.909 1.229 3.109.15.201 2.124 3.243 5.145 4.549.719.311 1.28.497 1.718.636.723.23 1.381.198 1.901.12.579-.087 1.777-.727 2.027-1.43.25-.702.25-1.304.175-1.43-.075-.126-.276-.201-.577-.351zM12.042 21.84c-1.787 0-3.535-.48-5.064-1.388l-.363-.215-3.766.988 1.005-3.67-.236-.375c-.998-1.587-1.526-3.425-1.526-5.31C2.1 6.57 6.562 2.1 12.043 2.1c2.656 0 5.153 1.034 7.03 2.91 1.876 1.877 2.909 4.373 2.909 7.03 0 5.473-4.462 9.943-9.94 9.943z"/></svg>
                                            </template>
                                            <template x-if="p.key === 'youtube'">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 20px; height: 20px;"><path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"/><polygon points="10 15 15 12 10 9 10 15"/></svg>
                                            </template>
                                            <template x-if="p.key === 'twitter'">
                                                <svg viewBox="0 0 24 24" fill="currentColor" style="width: 18px; height: 18px;"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                            </template>
                                            <template x-if="p.key === 'linkedin'">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 19px; height: 19px;"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg>
                                            </template>
                                            <template x-if="p.key === 'discord'">
                                                <svg viewBox="0 0 24 24" fill="currentColor" style="width: 20px; height: 20px;"><path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028 14.09 14.09 0 0 0 1.226-1.994.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z"/></svg>
                                            </template>
                                            <template x-if="p.key === 'spotify'">
                                                <svg viewBox="0 0 24 24" fill="currentColor" style="width: 20px; height: 20px;"><path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/></svg>
                                            </template>

                                            <span style="font-size: 9px; font-weight: 700; margin-top: 3px; line-height: 1;" x-text="p.name.split(' ')[0]"></span>
                                        </button>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CARD KONTEN 2: ALAMAT & WILAYAH DOMISILI (DIPERCANTIK) -->
                    <div class="content-card" id="alamat-card">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 6px;">
                            <h3 style="margin-bottom: 0;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                Alamat &amp; Wilayah Domisili
                            </h3>
                            <span style="font-size: 11px; font-weight: 700; color: #0284c7; background: #e0f2fe; padding: 2px 8px; border-radius: 6px;">
                                Domisili Resmi
                            </span>
                        </div>
                        <p style="font-size: 12.5px; color: #64748b; margin-bottom: 16px;">
                            Alamat tempat tinggal digunakan untuk pencatatan wilayah akademik, verifikasi lokasi, dan pengiriman sertifikat/modul belajar.
                        </p>

                        <div style="display: flex; flex-direction: column; gap: 14px;">
                            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 14px; padding: 14px 16px;">
                                <label class="detail-label" style="display: flex; align-items: center; gap: 6px; margin-bottom: 6px; font-size: 11.5px; color: #334155;">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="2"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span>Alamat Lengkap (Jalan, RT/RW, Kelurahan, Kecamatan, Kota/Kabupaten)</span>
                                </label>
                                <textarea name="address" rows="3" 
                                          style="width: 100%; border: 1px solid #cbd5e1; border-radius: 10px; padding: 8px 12px; font-size: 13.5px; font-weight: 600; color: #0f172a; outline: none; background: #ffffff; resize: none; line-height: 1.5;"
                                          placeholder="Contoh: Jl. Protokol Sudirman No. 45, RT 03 / RW 02, Kelurahan Menteng, Kecamatan Menteng, Jakarta Pusat">{{ old('address', $user->address) }}</textarea>
                            </div>

                            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 14px; padding: 14px 16px;">
                                <label class="detail-label" style="display: flex; align-items: center; gap: 6px; margin-bottom: 6px; font-size: 11.5px; color: #334155;">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="2"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
                                    <span>Kode Pos Wilayah</span>
                                </label>
                                <div style="max-width: 200px;">
                                    <input type="text" name="postal_code" value="{{ old('postal_code', $user->postal_code) }}" 
                                           style="width: 100%; border: 1px solid #cbd5e1; border-radius: 10px; padding: 8px 12px; font-size: 14px; font-family: monospace; font-weight: 700; color: #0f172a; outline: none; background: #ffffff; letter-spacing: 1px;"
                                           placeholder="Contoh: 10310" maxlength="10">
                                </div>
                                <span style="font-size: 11px; color: #64748b; margin-top: 4px; display: block;">Masukkan 5 digit kode pos domisili tempat tinggal Anda saat ini.</span>
                            </div>
                        </div>

                        <div style="margin-top: 18px;">
                            <button type="submit" class="btn btn-save" style="width: 100%; padding: 13px 0; font-size: 15px;">
                                Simpan Semua Perubahan Profil
                            </button>
                        </div>
                    </div>
                </div>

                <!-- ================= DIV KOLOM KANAN: PERSONALISASI BIOLINK SISWA / GURU ================= -->
                <div class="profile-column">
                    <!-- SECTION SPESIFIK SESUAI PERAN -->
                    @if($isTeacher)
                        <!-- GURU: Ujian & Bank Soal Binaan -->
                        <div class="content-card">
                            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                                <h3 style="margin-bottom: 0;">
                                    <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"></path></svg>
                                    Materi & Asesmen Binaan Pendidik
                                </h3>
                                <a href="{{ route('question-banks.index') }}" style="font-size: 11px; font-weight: 700; color: #059669; background: #dcfce7; padding: 4px 10px; border-radius: 20px; text-decoration: none;">
                                    Kelola Soal &rarr;
                                </a>
                            </div>
                            <p style="font-size: 13.5px; color: #64748b; margin-bottom: 10px;">Daftar asesmen umum terbuka untuk evaluasi kemampuan siswa.</p>

                            <div class="rt-scroll-area">
                                <div class="rt-Grid">
                                    @forelse($publicAssessments ?? [] as $assessment)
                                        <a href="{{ route('exam.gate.show', $assessment->id ?? 1) }}" target="_blank" class="rt-reset rt-BaseCard rt-Card">
                                            <div class="rt-Box rt-r-mb-3" style="display: flex; justify-content: space-between; align-items: center;">
                                                <div style="width: 36px; height: 36px; border-radius: 10px; background: #dcfce7; display: flex; align-items: center; justify-content: center; color: #059669;">
                                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg>
                                                </div>
                                                <span style="font-size: 10.5px; font-weight: 700; background: #dcfce7; color: #15803d; padding: 2px 7px; border-radius: 5px;">
                                                    {{ $assessment->price_type === 'paid' ? 'Rp '.number_format($assessment->price, 0, ',', '.') : 'Gratis' }}
                                                </span>
                                            </div>
                                            <h3 class="rt-Heading rt-r-mb-1">{{ $assessment->title }}</h3>
                                            <p class="rt-Text">
                                                {{ Str::limit($assessment->description ?: 'Asesmen pembelajaran dan evaluasi akademik terstruktur.', 65) }}
                                            </p>
                                            <div style="margin-top: auto; display: flex; align-items: center; justify-content: space-between; font-size: 11.5px; color: #64748b; padding-top: 8px; border-top: 1px dashed #e2e8f0;">
                                                <span>⏱️ {{ $assessment->duration_minutes ?: 90 }} mnt</span>
                                                <span style="color: #059669; font-weight: 700;">Buka &rarr;</span>
                                            </div>
                                        </a>
                                    @empty
                                        <div style="padding: 16px; color: #64748b; font-size: 13px;">Belum ada asesmen yang disematkan.</div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- ================= 1. PENGATURAN TEMA WARNA BIOLINK (14 PALET OPEN COLOR) ================= -->
                        <div class="content-card" id="theme-settings-card">
                            <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px;">
                                <h3 style="margin-bottom: 0;">
                                    <span style="display: inline-flex; align-items: center; justify-content: center; width: 26px; height: 26px; border-radius: 8px; background: #e0e7ff; color: #4338ca;">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="13.5" cy="6.5" r=".5" fill="currentColor"></circle><circle cx="17.5" cy="10.5" r=".5" fill="currentColor"></circle><circle cx="8.5" cy="7.5" r=".5" fill="currentColor"></circle><circle cx="6.5" cy="12.5" r=".5" fill="currentColor"></circle><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.563-2.512 5.563-5.563C22 6.5 17.5 2 12 2Z"></path></svg>
                                    </span>
                                    Tema Warna Biolink Siswa
                                </h3>
                                <span style="font-size: 11px; font-weight: 700; background: #f1f5f9; color: #475569; padding: 3px 9px; border-radius: 20px; border: 1px solid #cbd5e1;">
                                    14 Palet Open Color
                                </span>
                            </div>
                            <p style="font-size: 13px; color: #64748b; margin-top: 4px; margin-bottom: 14px; line-height: 1.45;">
                                Pilih skema warna utama profil biolink publik Anda. Tema yang dipilih di sini akan diterapkan secara penuh dan konsisten pada halaman profil dan biolink siswa.
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
                                @foreach($themes as $pKey => $pVal)
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
                                        <input type="radio" name="biolink_theme" value="{{ $pKey }}" x-model="selectedTheme" {{ $biolinkTheme === $pKey ? 'checked' : '' }} :checked="selectedTheme === '{{ $pKey }}'" style="display: none;">
                                        
                                        <!-- Baris Atas: Dot Swatch + Kode Warna Tema -->
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

                        <!-- ================= 2. PENGATURAN TAB TARGET & LIVE PREVIEW BIOLINK ================= -->
                        <div class="content-card" id="target-settings-card">
                            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 6px;">
                                <h3 style="margin-bottom: 0;">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <circle cx="12" cy="12" r="6"></circle>
                                        <circle cx="12" cy="12" r="2"></circle>
                                    </svg>
                                    Tab Target Belajar &amp; Karir
                                </h3>
                                <span style="font-size: 11px; font-weight: 700; color: #b45309; background: #fef3c7; padding: 2px 8px; border-radius: 6px;">
                                    Tab Target
                                </span>
                            </div>
                            <p style="font-size: 12.5px; color: #64748b; margin-bottom: 16px;">
                                Pilih jenjang fokus belajar Anda. Informasi target akan ditampilkan di tab "Target" pada profil biolink publik murid.
                            </p>

                            <!-- Dropdown Kategori / Kelas Target -->
                            <div style="margin-bottom: 14px;">
                                <label class="detail-label" style="display: block; margin-bottom: 5px;">Pilih Jenjang Target</label>
                                <select name="target_category" x-model="targetCategory" @change="onCategoryChange()"
                                        style="width: 100%; padding: 9px 12px; border-radius: 12px; border: 1px solid #cbd5e1; background: #ffffff; font-size: 13.5px; font-weight: 700; color: #0f172a; outline: none;">
                                    <optgroup label="Sekolah Dasar (SD)">
                                        <option value="1">Kelas 1 SD</option>
                                        <option value="2">Kelas 2 SD</option>
                                        <option value="3">Kelas 3 SD</option>
                                        <option value="4">Kelas 4 SD</option>
                                        <option value="5">Kelas 5 SD</option>
                                        <option value="6">Kelas 6 SD</option>
                                    </optgroup>
                                    <optgroup label="Sekolah Menengah Pertama (SMP)">
                                        <option value="7">Kelas 7 SMP</option>
                                        <option value="8">Kelas 8 SMP</option>
                                        <option value="9">Kelas 9 SMP</option>
                                    </optgroup>
                                    <optgroup label="Sekolah Menengah Atas / Kejuruan (SMA/SMK)">
                                        <option value="10">Kelas 10 SMA</option>
                                        <option value="11">Kelas 11 SMA</option>
                                        <option value="12">Kelas 12 SMA</option>
                                    </optgroup>
                                    <optgroup label="Kelas Group PRO">
                                        <option value="utbk">UTBK SNBT (Soal ASLI dan PEMBAHASAN Sejak 2019)</option>
                                        <option value="skd">SKD Kedinasan &amp; CPNS (Soal ASLI dan PREDIKSI dilengkapi PEMBAHASAN)</option>
                                        <option value="tka_sma">TKA SMA</option>
                                        <option value="tka_smp">TKA SMP</option>
                                        <option value="tka_sd">TKA SD</option>
                                        <option value="pro">Soal Asli dan Prediksi untuk PROFESIONAL</option>
                                    </optgroup>
                                </select>
                            </div>

                            <!-- Input Fields Kondisional -->
                            <div style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 18px;">
                                <!-- Kolom 1 -->
                                <div>
                                    <label class="detail-label" style="display: block; margin-bottom: 4px;">
                                        <span x-show="isRegularGrade()">Nama Sekolah / Rombel Incaran</span>
                                        <span x-show="targetCategory === 'utbk'">Nama Jurusan / Program Studi</span>
                                        <span x-show="targetCategory === 'skd'">Jabatan / Formasi / Jurusan</span>
                                        <span x-show="!isRegularGrade() && targetCategory !== 'utbk' && targetCategory !== 'skd'">Kolom 1 (Jurusan / Bidang)</span>
                                    </label>
                                    <input type="text" name="target_field_1" x-model="targetField1" 
                                           style="width: 100%; padding: 8px 12px; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 13.5px; font-weight: 600; color: #0f172a; outline: none; background: #ffffff;"
                                           :placeholder="isRegularGrade() ? ('Contoh: Kelas ' + targetCategory + ' Reguler / Unggulan') : (targetCategory === 'utbk' ? 'Contoh: Pendidikan Dokter / Teknik Informatika' : (targetCategory === 'skd' ? 'Contoh: Pemeriksa Keimigrasian / Analis Kebijakan' : 'Isi nama bidang target...'))">
                                </div>

                                <!-- Kolom 2 -->
                                <div>
                                    <label class="detail-label" style="display: block; margin-bottom: 4px;">
                                        <span x-show="isRegularGrade()">Mata Pelajaran Unggulan / Peminatan</span>
                                        <span x-show="targetCategory === 'utbk'">Nama PTN / Universitas Impian</span>
                                        <span x-show="targetCategory === 'skd'">Nama Instansi / Sekolah Kedinasan</span>
                                        <span x-show="!isRegularGrade() && targetCategory !== 'utbk' && targetCategory !== 'skd'">Kolom 2 (Instansi / Lembaga)</span>
                                    </label>
                                    <input type="text" name="target_field_2" x-model="targetField2" 
                                           style="width: 100%; padding: 8px 12px; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 13.5px; font-weight: 600; color: #0f172a; outline: none; background: #ffffff;"
                                           :placeholder="isRegularGrade() ? 'Contoh: Matematika, IPA, Literasi' : (targetCategory === 'utbk' ? 'Contoh: Universitas Indonesia / ITB' : (targetCategory === 'skd' ? 'Contoh: Kemenkumham / PKN STAN / IPDN' : 'Isi nama lembaga tujuan...'))">
                                </div>

                                <!-- Kolom 3 -->
                                <div>
                                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 4px;">
                                        <label class="detail-label" style="margin-bottom: 0;">
                                            <span x-show="isRegularGrade()">Passing Target Skor (KKM)</span>
                                            <span x-show="targetCategory === 'utbk'">Target Nilai UTBK</span>
                                            <span x-show="targetCategory === 'skd'">Target Nilai SKD</span>
                                            <span x-show="!isRegularGrade() && targetCategory !== 'utbk' && targetCategory !== 'skd'">Kolom 3 (Target Nilai / Skor)</span>
                                        </label>
                                        <template x-if="isRegularGrade()">
                                            <span style="font-size: 10.5px; font-weight: 700; color: #166534; background: #dcfce7; padding: 1px 7px; border-radius: 6px;">Otomatis 100</span>
                                        </template>
                                    </div>
                                    <input type="text" name="target_field_3" x-model="targetField3" 
                                           :readonly="isRegularGrade()"
                                           :style="{ backgroundColor: isRegularGrade() ? '#f8fafc' : '#ffffff', cursor: isRegularGrade() ? 'not-allowed' : 'text' }"
                                           style="width: 100%; padding: 8px 12px; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 13.5px; font-weight: 700; color: #0f172a; outline: none;"
                                           :placeholder="isRegularGrade() ? '100' : (targetCategory === 'utbk' ? 'Contoh: 740' : (targetCategory === 'skd' ? 'Contoh: 450' : 'Contoh: 850'))">
                                    <template x-if="isRegularGrade()">
                                        <p style="font-size: 11px; color: #059669; font-weight: 600; margin-top: 5px;">
                                            ✓ Target passing otomatis disetel 100 untuk Kelas 1-12 dan aktif sebagai filter asesmen di profil portal tenant.
                                        </p>
                                    </template>
                                </div>
                            </div>

                            <!-- LIVE PREVIEW KARTU KAMPUS & JURUSAN INCARAN BIOLINK -->
                            <div style="border-top: 1px dashed #cbd5e1; padding-top: 14px;">
                                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 10px;">
                                    <span style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: #64748b; display: flex; align-items: center; gap: 6px;">
                                        <span style="width: 7px; height: 7px; border-radius: 50%; background: #10b981; display: inline-block;"></span>
                                        <span>Pratinjau Kartu Biolink (Live Preview)</span>
                                    </span>
                                    <span style="font-size: 10px; color: #0284c7; font-weight: 700; background: #e0f2fe; padding: 2px 7px; border-radius: 20px;">
                                        Pratinjau Langsung
                                    </span>
                                </div>

                                <!-- Kartu Kampus & Jurusan Incaran dari Biolink -->
                                <div style="padding: 14px; border-radius: 16px; border: 1px solid #e2e8f0; background: #ffffff; box-shadow: 0 4px 14px rgba(0,0,0,0.04);">
                                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
                                        <div style="display: flex; align-items: center; gap: 10px;">
                                            <div style="width: 40px; height: 40px; border-radius: 12px; background: rgba(245, 159, 0, 0.15); border: 1px solid rgba(245, 159, 0, 0.3); display: flex; align-items: center; justify-content: center; font-weight: 800; color: #d97706; font-size: 13px;"
                                                 x-text="targetAbbr || 'GOAL'">
                                            </div>
                                            <div>
                                                <h4 style="font-size: 14px; font-weight: 700; color: #0f172a; line-height: 1.3;"
                                                    x-text="targetField1 || (targetCategory === 'utbk' ? 'Pendidikan Dokter' : (targetCategory === 'skd' ? 'Taruna Keimigrasian' : 'Jurusan / Target Incaran'))"></h4>
                                                <p style="font-size: 11.5px; color: #64748b; margin-top: 2px;"
                                                   x-text="(targetField2 || (targetCategory === 'utbk' ? 'Universitas Indonesia' : (targetCategory === 'skd' ? 'Politeknik Keimigrasian' : 'Instansi Tujuan'))) + ' • Pilihan 1'"></p>
                                            </div>
                                        </div>
                                        <span style="font-size: 10px; font-weight: 700; padding: 2px 7px; border-radius: 6px; background: #dcfce7; color: #166534; border: 1px solid #bbf7d0;">
                                            Target Aktif
                                        </span>
                                    </div>

                                    <!-- Progress Bar Skor -->
                                    <div style="margin-top: 10px;">
                                        <div style="display: flex; justify-content: space-between; font-size: 11px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                                            <span>Skor Simulasi: <b style="color: #059669;">712</b></span>
                                            <span>Passing Target: <b style="color: #0f172a;" x-text="targetField3 || '740'"></b></span>
                                        </div>
                                        <div style="width: 100%; height: 8px; border-radius: 9999px; background: #e2e8f0; overflow: hidden;">
                                            <div style="height: 100%; border-radius: 9999px; background: #12b886; transition: width 0.3s ease;"
                                                 :style="{ width: targetProgress + '%' }"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ================= 3. PENGATURAN TAUTAN & AKTIVITAS REKOMENDASI ================= -->
                        <div class="content-card" id="links-settings-card">
                            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 6px;">
                                <h3 style="margin-bottom: 0;">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                                        <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                                    </svg>
                                    Tautan &amp; Aktivitas Rekomendasi
                                </h3>
                                <button type="button" @click="addLink()"
                                        style="padding: 5px 12px; border-radius: 10px; font-size: 11.5px; font-weight: 700; background: #e0f2fe; color: #0284c7; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 4px;">
                                    <span>+ Tambah Tautan</span>
                                </button>
                            </div>
                            <p style="font-size: 12.5px; color: #64748b; margin-bottom: 16px;">
                                Tambahkan tautan rekomendasi untuk menantang tryout bareng, resume materi, sertifikat, atau nomor diskusi.
                            </p>

                            <!-- List Dinamis Links -->
                            <div style="display: flex; flex-direction: column; gap: 12px;">
                                <template x-for="(link, index) in customLinks" :key="index">
                                    <div style="padding: 12px; border-radius: 14px; border: 1px solid #cbd5e1; background: #f8fafc; display: flex; flex-direction: column; gap: 8px;">
                                        <div style="display: flex; items-center; justify-content: space-between;">
                                            <div style="display: flex; align-items: center; gap: 8px;">
                                                <span style="font-size: 11px; font-weight: 700; color: #64748b;">#<span x-text="index + 1"></span></span>
                                                <select :name="'custom_links[' + index + '][icon]'" x-model="link.icon"
                                                        style="padding: 4px 8px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 11.5px; font-weight: 700; color: #0f172a; background: #ffffff; outline: none;">
                                                    <option value="trophy">🏆 Tantang Skor CBT</option>
                                                    <option value="book">📚 Resume / Catatan</option>
                                                    <option value="certificate">📜 E-Sertifikat</option>
                                                    <option value="whatsapp">💬 WhatsApp Chat</option>
                                                    <option value="coffee">☕ Traktir Belajar / Saweria</option>
                                                    <option value="link">🔗 Tautan Bebas</option>
                                                    <option value="youtube">📺 YouTube Channel</option>
                                                    <option value="github">💻 Portofolio / GitHub</option>
                                                </select>
                                            </div>
                                            <button type="button" @click="removeLink(index)"
                                                    style="color: #dc2626; background: none; border: none; font-size: 12px; font-weight: 700; cursor: pointer;"
                                                    title="Hapus Tautan">
                                                ✕ Hapus
                                            </button>
                                        </div>

                                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px;">
                                            <div>
                                                <label style="font-size: 10px; font-weight: 700; color: #64748b; display: block; margin-bottom: 2px;">Judul Tautan *</label>
                                                <input type="text" :name="'custom_links[' + index + '][title]'" x-model="link.title" required
                                                       placeholder="Contoh: Tantang Skor Ujian Bareng"
                                                       style="width: 100%; padding: 6px 8px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 12px; font-weight: 600; color: #0f172a; background: #ffffff; outline: none;">
                                            </div>
                                            <div>
                                                <label style="font-size: 10px; font-weight: 700; color: #64748b; display: block; margin-bottom: 2px;">URL Lengkap *</label>
                                                <input type="text" :name="'custom_links[' + index + '][url]'" x-model="link.url" required
                                                       placeholder="https://..."
                                                       style="width: 100%; padding: 6px 8px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 12px; font-family: monospace; color: #0f172a; background: #ffffff; outline: none;">
                                            </div>
                                        </div>

                                        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 8px;">
                                            <div>
                                                <label style="font-size: 10px; font-weight: 700; color: #64748b; display: block; margin-bottom: 2px;">Keterangan Singkat (Opsional)</label>
                                                <input type="text" :name="'custom_links[' + index + '][subtitle]'" x-model="link.subtitle"
                                                       placeholder="Contoh: Simulasi Tryout UTBK SNBT 2026"
                                                       style="width: 100%; padding: 6px 8px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 12px; color: #0f172a; background: #ffffff; outline: none;">
                                            </div>
                                            <div>
                                                <label style="font-size: 10px; font-weight: 700; color: #64748b; display: block; margin-bottom: 2px;">Badge (Opsional)</label>
                                                <input type="text" :name="'custom_links[' + index + '][badge]'" x-model="link.badge"
                                                       placeholder="HOT / RESMI"
                                                       style="width: 100%; padding: 6px 8px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 12px; font-weight: 700; color: #0f172a; background: #ffffff; outline: none; text-transform: uppercase;">
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <template x-if="customLinks.length === 0">
                                    <div style="padding: 18px; border-radius: 12px; border: 1px dashed #cbd5e1; text-align: center; font-size: 12px; color: #64748b;">
                                        Belum ada tautan rekomendasi. Klik tombol <strong>+ Tambah Tautan</strong> di atas untuk menambahkan link aktivitas Anda!
                                    </div>
                                </template>
                            </div>
                        </div>
                    @endif

                    <!-- CARD FASILITAS GANTI KATA SANDI (TEPAT DI BAWAH TAUTAN REKOMENDASI) -->
                    <div class="content-card" id="password-card" x-data="{ showCurrent: false, showNew: false, showConfirm: false }">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 6px;">
                            <h3 style="margin-bottom: 0;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                Fasilitas Ganti Password
                            </h3>
                            <span style="font-size: 11px; font-weight: 700; color: #4338ca; background: #e0e7ff; padding: 2px 8px; border-radius: 6px;">
                                Keamanan Akun
                            </span>
                        </div>
                        <p style="font-size: 12.5px; color: #64748b; margin-bottom: 16px;">
                            Gunakan kata sandi yang kuat dengan minimal 8 karakter untuk menjaga keamanan akses akun dan riwayat ujian Anda.
                        </p>

                        @if(session('success_password'))
                            <div style="background-color: #d1fae5; color: #065f46; padding: 12px 16px; border-radius: 12px; font-size: 13.5px; font-weight: 600; margin-bottom: 16px; border: 1px solid #a7f3d0; display: flex; align-items: center; gap: 8px;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                <span>{{ session('success_password') }}</span>
                            </div>
                        @endif

                        <div style="display: flex; flex-direction: column; gap: 14px;">
                            <!-- Input 1: Kata Sandi Saat Ini -->
                            <div>
                                <label class="detail-label" style="display: block; margin-bottom: 5px;">Kata Sandi Saat Ini <span style="color: #dc2626;">*</span></label>
                                <div style="display: flex; align-items: center; border: 1px solid #cbd5e1; border-radius: 10px; background: #ffffff; overflow: hidden; padding: 0 10px;">
                                    <input :type="showCurrent ? 'text' : 'password'" form="password-form" name="current_password" required
                                           style="width: 100%; border: none; padding: 8px 0; font-size: 14px; font-weight: 600; color: #0f172a; outline: none; background: transparent;"
                                           placeholder="Masukkan kata sandi lama Anda">
                                    <button type="button" @click="showCurrent = !showCurrent" style="background: none; border: none; color: #64748b; cursor: pointer; padding: 4px; display: flex; align-items: center;" title="Lihat/Sembunyikan">
                                        <template x-if="!showCurrent">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </template>
                                        <template x-if="showCurrent">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                                        </template>
                                    </button>
                                </div>
                                @error('current_password')
                                    <p style="color: #dc2626; font-size: 11.5px; font-weight: 600; margin-top: 4px;">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Input 2: Kata Sandi Baru -->
                            <div>
                                <label class="detail-label" style="display: block; margin-bottom: 5px;">Kata Sandi Baru <span style="color: #dc2626;">*</span></label>
                                <div style="display: flex; align-items: center; border: 1px solid #cbd5e1; border-radius: 10px; background: #ffffff; overflow: hidden; padding: 0 10px;">
                                    <input :type="showNew ? 'text' : 'password'" form="password-form" name="password" required minlength="8"
                                           style="width: 100%; border: none; padding: 8px 0; font-size: 14px; font-weight: 600; color: #0f172a; outline: none; background: transparent;"
                                           placeholder="Minimal 8 karakter">
                                    <button type="button" @click="showNew = !showNew" style="background: none; border: none; color: #64748b; cursor: pointer; padding: 4px; display: flex; align-items: center;" title="Lihat/Sembunyikan">
                                        <template x-if="!showNew">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </template>
                                        <template x-if="showNew">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                                        </template>
                                    </button>
                                </div>
                                @error('password')
                                    <p style="color: #dc2626; font-size: 11.5px; font-weight: 600; margin-top: 4px;">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Input 3: Konfirmasi Kata Sandi Baru -->
                            <div>
                                <label class="detail-label" style="display: block; margin-bottom: 5px;">Konfirmasi Kata Sandi Baru <span style="color: #dc2626;">*</span></label>
                                <div style="display: flex; align-items: center; border: 1px solid #cbd5e1; border-radius: 10px; background: #ffffff; overflow: hidden; padding: 0 10px;">
                                    <input :type="showConfirm ? 'text' : 'password'" form="password-form" name="password_confirmation" required minlength="8"
                                           style="width: 100%; border: none; padding: 8px 0; font-size: 14px; font-weight: 600; color: #0f172a; outline: none; background: transparent;"
                                           placeholder="Ulangi kata sandi baru">
                                    <button type="button" @click="showConfirm = !showConfirm" style="background: none; border: none; color: #64748b; cursor: pointer; padding: 4px; display: flex; align-items: center;" title="Lihat/Sembunyikan">
                                        <template x-if="!showConfirm">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </template>
                                        <template x-if="showConfirm">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                                        </template>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 18px;">
                            <button type="submit" form="password-form" class="btn" style="width: 100%; padding: 12px 0; font-size: 14px; font-weight: 700; background-color: #0f172a; color: #ffffff; border-radius: 12px; box-shadow: 0 4px 14px rgba(15, 23, 42, 0.2); cursor: pointer; transition: all 0.2s ease;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                <span>Perbarui Kata Sandi</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================= POPUP MODAL INPUT URL MEDIA SOSIAL (ALPINE.JS) ================= -->
            <div x-show="activeSocialModal !== null" 
                 x-cloak 
                 class="social-modal-overlay" 
                 @click.self="activeSocialModal = null" 
                 @keydown.escape.window="activeSocialModal = null">
                <div class="social-modal-content" @click.stop>
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <div style="width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px;"
                                 :style="{ backgroundColor: getActivePlatform().bg, color: getActivePlatform().text, border: '1.5px solid ' + getActivePlatform().border }">
                                <span x-text="getActivePlatform().key === 'whatsapp' ? '💬' : (getActivePlatform().key === 'instagram' ? '📷' : (getActivePlatform().key === 'tiktok' ? '🎵' : (getActivePlatform().key === 'youtube' ? '📺' : (getActivePlatform().key === 'twitter' ? '𝕏' : (getActivePlatform().key === 'linkedin' ? '💼' : (getActivePlatform().key === 'discord' ? '👾' : '🎧'))))))"></span>
                            </div>
                            <div>
                                <h3 style="font-size: 16px; font-weight: 800; color: #0f172a; margin-bottom: 2px;" x-text="'Tautkan ' + (getActivePlatform().name || 'Media Sosial')"></h3>
                                <p style="font-size: 11.5px; color: #64748b;">Masukkan URL profil atau tautan akun Anda</p>
                            </div>
                        </div>
                        <button type="button" @click="activeSocialModal = null" style="background: none; border: none; color: #94a3b8; font-size: 20px; cursor: pointer; padding: 4px; line-height: 1;">✕</button>
                    </div>

                    <div style="margin-bottom: 18px;">
                        <label style="display: block; font-size: 11.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                            URL Profil / Channel Lengkap
                        </label>
                        <input type="url" 
                               x-model="tempSocialUrl" 
                               :placeholder="getActivePlatform().placeholder || 'https://...'"
                               @keydown.enter.prevent="saveSocialLink()"
                               style="width: 100%; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 10px 12px; font-size: 13.5px; font-family: monospace; font-weight: 600; color: #0f172a; outline: none; background: #ffffff;"
                               x-ref="socialInput">
                        <p style="font-size: 11px; color: #94a3b8; margin-top: 5px;">Contoh: <span class="font-mono" x-text="getActivePlatform().placeholder"></span></p>
                    </div>

                    <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px;">
                        <div>
                            <button type="button" 
                                    x-show="hasSocial(activeSocialModal)" 
                                    @click="removeSocialLink()" 
                                    style="background: #fee2e2; color: #b91c1c; border: 1px solid #fecaca; padding: 9px 14px; border-radius: 10px; font-size: 12px; font-weight: 700; cursor: pointer; display: inline-flex; align-items: center; gap: 4px;">
                                <span>✕ Hapus Link</span>
                            </button>
                        </div>
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <button type="button" @click="activeSocialModal = null" 
                                    style="background: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; padding: 9px 14px; border-radius: 10px; font-size: 12px; font-weight: 700; cursor: pointer;">
                                Batal
                            </button>
                            <button type="button" @click="saveSocialLink()" 
                                    style="background: #0284c7; color: #ffffff; border: none; padding: 9px 18px; border-radius: 10px; font-size: 12px; font-weight: 700; cursor: pointer; box-shadow: 0 4px 12px rgba(2, 132, 199, 0.3);">
                                Simpan Link
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

    <script>
        function profileForm() {
            return {
                coverPreview: null,
                avatarPreview: null,
                selectedTheme: '{{ $biolinkTheme ?? "teal" }}',
                targetCategory: '{{ $targetConfig["category"] ?? "utbk" }}',
                targetField1: '{{ addslashes($targetConfig["field_1"] ?? "") }}',
                targetField2: '{{ addslashes($targetConfig["field_2"] ?? "") }}',
                targetField3: '{{ addslashes($targetConfig["field_3"] ?? "") }}',
                customLinks: @json($customLinks ?? []),

                init() {
                    if (this.isRegularGrade()) {
                        this.targetField3 = '100';
                    }
                },

                isRegularGrade() {
                    const val = parseInt(this.targetCategory, 10);
                    return !isNaN(val) && val >= 1 && val <= 12;
                },

                onCategoryChange() {
                    if (this.isRegularGrade()) {
                        this.targetField3 = '100';
                    }
                },

                socialPlatforms: [
                    { key: 'instagram', name: 'Instagram', color: '#e1306c', bg: '#fdf2f8', border: '#f472b6', text: '#db2777', placeholder: 'https://instagram.com/username' },
                    { key: 'tiktok', name: 'TikTok', color: '#000000', bg: '#f8fafc', border: '#0f172a', text: '#0f172a', placeholder: 'https://tiktok.com/@username' },
                    { key: 'whatsapp', name: 'WhatsApp', color: '#25d366', bg: '#f0fdf4', border: '#86efac', text: '#16a34a', placeholder: 'https://wa.me/6281234567890' },
                    { key: 'youtube', name: 'YouTube', color: '#ff0000', bg: '#fef2f2', border: '#fca5a5', text: '#dc2626', placeholder: 'https://youtube.com/@channel' },
                    { key: 'twitter', name: 'X (Twitter)', color: '#0f1419', bg: '#f8fafc', border: '#334155', text: '#0f172a', placeholder: 'https://x.com/username' },
                    { key: 'linkedin', name: 'LinkedIn', color: '#0a66c2', bg: '#eff6ff', border: '#93c5fd', text: '#0284c7', placeholder: 'https://linkedin.com/in/username' },
                    { key: 'discord', name: 'Discord', color: '#5865f2', bg: '#eef2ff', border: '#a5b4fc', text: '#4f46e5', placeholder: 'https://discord.gg/server' },
                    { key: 'spotify', name: 'Spotify', color: '#1db954', bg: '#f0fdf4', border: '#86efac', text: '#10b981', placeholder: 'https://open.spotify.com/user/...' },
                ],
                socialLinks: @json((object)($socialLinks ?? [])),
                activeSocialModal: null,
                tempSocialUrl: '',

                openSocialEdit(platformKey) {
                    this.activeSocialModal = platformKey;
                    this.tempSocialUrl = this.socialLinks[platformKey] || '';
                    this.$nextTick(() => {
                        if (this.$refs.socialInput) {
                            this.$refs.socialInput.focus();
                        }
                    });
                },
                saveSocialLink() {
                    if (this.activeSocialModal) {
                        const val = (this.tempSocialUrl || '').trim();
                        if (val) {
                            this.socialLinks[this.activeSocialModal] = val;
                        } else {
                            delete this.socialLinks[this.activeSocialModal];
                        }
                        this.activeSocialModal = null;
                    }
                },
                removeSocialLink() {
                    if (this.activeSocialModal) {
                        delete this.socialLinks[this.activeSocialModal];
                        this.activeSocialModal = null;
                    }
                },
                hasSocial(platformKey) {
                    return Boolean(this.socialLinks[platformKey] && String(this.socialLinks[platformKey]).trim() !== '');
                },
                getActivePlatform() {
                    return this.socialPlatforms.find(p => p.key === this.activeSocialModal) || {};
                },
                
                addLink() {
                    this.customLinks.push({
                        icon: 'trophy',
                        title: '',
                        url: '',
                        subtitle: '',
                        badge: ''
                    });
                },
                removeLink(index) {
                    this.customLinks.splice(index, 1);
                },
                previewCover(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.coverPreview = URL.createObjectURL(file);
                    }
                },
                previewAvatar(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.avatarPreview = URL.createObjectURL(file);
                    }
                },
                get targetAbbr() {
                    const str = (this.targetField2 || (this.targetCategory === 'utbk' ? 'UI' : (this.targetCategory === 'skd' ? 'SKD' : 'GOAL'))).trim();
                    const words = str.split(/\s+/);
                    if (words.length >= 2) {
                        return (words[0][0] + words[1][0]).toUpperCase();
                    }
                    return str.substring(0, 3).toUpperCase();
                },
                get targetProgress() {
                    const target = parseFloat(this.targetField3) || 740;
                    const simScore = 712;
                    const pct = Math.min(Math.round((simScore / target) * 100), 100);
                    return isNaN(pct) ? 84 : Math.max(pct, 15);
                }
            }
        }
    </script>
</x-layouts.app>
