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
            max-width: 520px;
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        /* CARD PROFIL UTAMA (1:1 DI LAPTOP) */
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
        }

        @media (min-width: 768px) {
            .profile-card {
                aspect-ratio: 1 / 1;
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

        .list-item-dashed:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
    </style>

    <div class="custom-profile-wrapper">
        <div class="main-container">
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
                        @if($user->hasPublicProfile())
                            <!-- 3-Column Stats: Asesmen Dikerjakan, Total Nilai, Ranking -->
                            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 6px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 14px; padding: 10px 4px; margin-bottom: 14px;">
                                <div style="text-align: center;">
                                    <div style="font-family: 'Outfit', sans-serif; font-size: 18px; font-weight: 800; color: #0f172a;">{{ $isTeacher ? $user->assessments()->count() : 8 }}</div>
                                    <div style="font-size: 10px; color: #64748b; font-weight: 700; text-transform: uppercase;">{{ $isTeacher ? 'Ujian Dibuat' : 'Asesmen Dikerjakan' }}</div>
                                </div>
                                <div style="text-align: center; border-left: 1px solid #e2e8f0; border-right: 1px solid #e2e8f0;">
                                    <div style="font-family: 'Outfit', sans-serif; font-size: 18px; font-weight: 800; color: #0f172a;">{{ $isTeacher ? '-' : 765 }}</div>
                                    <div style="font-size: 10px; color: #64748b; font-weight: 700; text-transform: uppercase;">{{ $isTeacher ? 'Total Soal' : 'Total Nilai' }}</div>
                                </div>
                                <div style="text-align: center;">
                                    <div style="font-family: 'Outfit', sans-serif; font-size: 18px; font-weight: 800; color: #0f172a;">{{ $isTeacher ? '-' : '#4' }}</div>
                                    <div style="font-size: 10px; color: #64748b; font-weight: 700; text-transform: uppercase;">{{ $isTeacher ? 'Peringkat Guru' : 'Ranking Siswa' }}</div>
                                </div>
                            </div>
                        @else
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
                                <a href="{{ route('assessments.show', $assessment->id ?? 1) }}" target="_blank" class="rt-reset rt-BaseCard rt-Card">
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
            @elseif(! $isAdmin && ! $isSuper)
                <!-- SISWA / MURID: Asesmen untuk Siswa -->
                <div class="content-card asesmen-umum-section">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                        <h3 style="margin-bottom: 0;">
                            <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            Asesmen & Latihan Soal Siswa
                        </h3>
                        <span style="font-size: 11px; font-weight: 700; color: #0284c7; background: #e0f2fe; padding: 3px 9px; border-radius: 20px;">
                            Scroll &rarr;
                        </span>
                    </div>

                    <div class="rt-scroll-area">
                        <div class="rt-Grid">
                            @forelse($publicAssessments ?? [] as $assessment)
                                <a href="{{ route('assessments.show', $assessment->id ?? 1) }}" target="_blank" class="rt-reset rt-BaseCard rt-Card">
                                    <div class="rt-Box rt-r-mb-3" style="display: flex; justify-content: space-between; align-items: center;">
                                        <div style="width: 36px; height: 36px; border-radius: 10px; background: #e0f2fe; display: flex; align-items: center; justify-content: center; color: #0284c7;">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"></path></svg>
                                        </div>
                                        <span style="font-size: 10.5px; font-weight: 700; background: #dcfce7; color: #15803d; padding: 2px 7px; border-radius: 5px;">
                                            {{ $assessment->price_type === 'paid' ? 'Rp '.number_format($assessment->price, 0, ',', '.') : 'Gratis' }}
                                        </span>
                                    </div>
                                    <h3 class="rt-Heading rt-r-mb-1">{{ $assessment->title }}</h3>
                                    <p class="rt-Text">
                                        {{ Str::limit($assessment->description ?: 'Asesmen terbuka untuk melatih kompetensi dan penguasaan materi akademik.', 65) }}
                                    </p>
                                    <div style="margin-top: auto; display: flex; align-items: center; justify-content: space-between; font-size: 11.5px; color: #64748b; padding-top: 8px; border-top: 1px dashed #e2e8f0;">
                                        <span>⏱️ {{ $assessment->duration_minutes ?: 90 }} mnt</span>
                                        <span style="color: #0284c7; font-weight: 700;">Buka &rarr;</span>
                                    </div>
                                </a>
                            @empty
                                <a href="#" class="rt-reset rt-BaseCard rt-Card">
                                    <div class="rt-Box rt-r-mb-3" style="display: flex; justify-content: space-between; align-items: center;">
                                        <div style="width: 36px; height: 36px; border-radius: 10px; background: #dbeafe; display: flex; align-items: center; justify-content: center; color: #1d4ed8;">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                        </div>
                                        <span style="font-size: 10.5px; font-weight: 700; background: #dcfce7; color: #15803d; padding: 2px 7px; border-radius: 5px;">Gratis</span>
                                    </div>
                                    <h3 class="rt-Heading rt-r-mb-1">Try Out UTBK-SNBT</h3>
                                    <p class="rt-Text">Simulasi tes potensi skolastik dan literasi format IRT terstandar.</p>
                                    <div style="margin-top: auto; display: flex; align-items: center; justify-content: space-between; font-size: 11.5px; color: #64748b; padding-top: 8px; border-top: 1px dashed #e2e8f0;">
                                        <span>⏱️ 120 mnt</span>
                                        <span style="color: #0284c7; font-weight: 700;">Buka &rarr;</span>
                                    </div>
                                </a>
                            @endforelse
                        </div>
                    </div>
                </div>
            @endif

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
                </div>
            </div>

            <!-- CARD KONTEN 2: ALAMAT & WILAYAH DOMISILI -->
            <div class="content-card">
                <h3>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                    Alamat & Wilayah Domisili
                </h3>
                <div style="margin-top: 14px;">
                    <div class="list-item-dashed">
                        <span class="detail-label">Alamat Lengkap</span>
                        <textarea name="address" class="detail-textarea" rows="2" placeholder="Jl. Protokol No. 123, Kelurahan, Kecamatan...">{{ old('address', $user->address) }}</textarea>
                    </div>
                    <div class="list-item-dashed">
                        <span class="detail-label">Kodepos</span>
                        <input type="text" name="postal_code" value="{{ old('postal_code', $user->postal_code) }}" class="detail-input" placeholder="Contoh: 12345">
                    </div>
                </div>
            </div>

            <!-- CARD KONTEN 3: KEANGGOTAAN & HAK AKSES -->
            <div class="content-card">
                <h3>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"></path><path d="M6 12v5c3 3 9 3 12 0v-5"></path></svg>
                    Keanggotaan & Hak Akses
                </h3>
                <div style="margin-top: 14px;">
                    <div class="list-item-dashed">
                        <span class="detail-label">User ID Unik</span>
                        <span class="detail-value" style="font-family: monospace; color: #64748b;">#{{ $user->id }}</span>
                    </div>
                    <div class="list-item-dashed">
                        <span class="detail-label">Cabang / Tenant Aktif</span>
                        <span class="detail-value">
                            {{ $user->currentTenant ? $user->currentTenant->name . ' (ID: #' . $user->current_tenant_id . ')' : 'Tidak Ada (Global / Pusat)' }}
                        </span>
                    </div>
                    <div class="list-item-dashed">
                        <span class="detail-label">Peran Pengguna (Role)</span>
                        <span class="detail-value" style="margin-top: 3px;">
                            @if($isSuper)
                                <span style="background: #f3f4f6; color: #374151; padding: 4px 10px; border-radius: 8px; font-weight: 700; font-size: 13px;">Super User (S)</span>
                            @elseif($isAdmin)
                                <span style="background: #ede9fe; color: #6d28d9; padding: 4px 10px; border-radius: 8px; font-weight: 700; font-size: 13px;">Administrator (A)</span>
                            @elseif($isTeacher)
                                <span style="background: #dcfce7; color: #15803d; padding: 4px 10px; border-radius: 8px; font-weight: 700; font-size: 13px;">Guru / Tenaga Pendidik (T)</span>
                            @else
                                <span style="background: #e0f2fe; color: #0369a1; padding: 4px 10px; border-radius: 8px; font-weight: 700; font-size: 13px;">Siswa / Pengguna (U)</span>
                            @endif
                        </span>
                    </div>
                    <div class="list-item-dashed">
                        <span class="detail-label">Sesi Login Tetap</span>
                        <span class="detail-value">{{ $user->remember_token ? 'Aktif' : 'Tidak Aktif' }}</span>
                    </div>
                </div>
            </div>

            <!-- CARD KONTEN 4: RIWAYAT AKUN & KEAMANAN -->
            <div class="content-card">
                <h3>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                    Riwayat Akun & Keamanan
                </h3>
                <div style="margin-top: 14px;">
                    <div class="list-item-dashed">
                        <span class="detail-label">Waktu Akun Dibuat</span>
                        <span class="detail-value">{{ $user->created_at ? $user->created_at->format('d M Y - H:i:s') : '-' }}</span>
                    </div>
                    <div class="list-item-dashed">
                        <span class="detail-label">Waktu Terakhir Diperbarui</span>
                        <span class="detail-value">{{ $user->updated_at ? $user->updated_at->format('d M Y - H:i:s') : '-' }}</span>
                    </div>
                    <div class="list-item-dashed">
                        <span class="detail-label">Kata Sandi (Password)</span>
                        <span class="detail-value" style="font-family: monospace; letter-spacing: 2px; color: #64748b;">••••••••••••</span>
                    </div>
                </div>

                <div style="margin-top: 18px;">
                    <button type="submit" class="btn btn-save" style="width: 100%; padding: 13px 0; font-size: 15px;">
                        Simpan Semua Perubahan Profil
                    </button>
                </div>
            </div>

        </form>

        <!-- CARD KONTEN 5: FASILITAS GANTI KATA SANDI (DEDICATED FORM) -->
        <form action="{{ route('profile.password.update') }}" method="POST" class="content-card" id="password-card" x-data="{ showCurrent: false, showNew: false, showConfirm: false }">
            @csrf
            @method('PUT')

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
                        <input :type="showCurrent ? 'text' : 'password'" name="current_password" required
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
                        <input :type="showNew ? 'text' : 'password'" name="password" required minlength="8"
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
                        <input :type="showConfirm ? 'text' : 'password'" name="password_confirmation" required minlength="8"
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
                <button type="submit" class="btn" style="width: 100%; padding: 12px 0; font-size: 14px; font-weight: 700; background-color: #0f172a; color: #ffffff; border-radius: 12px; box-shadow: 0 4px 14px rgba(15, 23, 42, 0.2); cursor: pointer; transition: all 0.2s ease;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                    <span>Perbarui Kata Sandi</span>
                </button>
            </div>
        </form>
    </div>
</div>

    <script>
        function profileForm() {
            return {
                coverPreview: null,
                avatarPreview: null,
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
                }
            }
        }
    </script>
</x-layouts.app>
