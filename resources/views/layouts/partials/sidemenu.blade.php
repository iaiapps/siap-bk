@php
    $user = Auth::user();
    $role = $user->getRoleNames()->first();
@endphp

<div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="{{ route('home') }}">{{ config('app.name', 'SIAP BK') }}</a>
            </div>
            <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278"/>
                </svg>
                <div class="form-check form-switch fs-6">
                    <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
                    <label class="form-check-label"></label>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 1a7 7 0 0 0-2.1 13.65c.35.05.5-.15.5-.33v-.62c0-.26-.1-.45-.2-.55-.2-.2-.3-.5-.3-.9 0-.4.15-.75.45-1 .15-.15.2-.35.15-.55-.35-1.05-.15-1.95.55-2.7.4-.45 1-1.05 1-1.95 0-.5-.2-1-.6-1.35-.4-.35-.65-.85-.65-1.45 0-.5.2-1 .6-1.35.4-.35.65-.85.65-1.45 0-1.05-1.15-1.9-2.7-1.9A5.25 5.25 0 0 0 5.4 1.55C3.8 2.1 2.65 3.7 2.65 5.55c0 1.05.4 1.95 1 2.55.15.15.2.3.15.5-.05.2-.15.35-.3.45-.4.3-.65.7-.65 1.2 0 .65.55 1.15 1.2 1.15h.1c1 .05 1.9.4 2.6 1 .35.3.55.7.55 1.2v1.35c0 .2.15.4.35.35A7 7 0 1 0 8 1"/>
                </svg>
            </div>
            <div class="sidebar-toggler x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
        <div class="text-center mt-2">
            <small>{{ $user->teacher->name ?? $user->name }}</small>
        </div>
    </div>

    <div class="sidebar-menu">
        <ul class="menu">
            @switch($role)
                @case('admin')
                    <li class="sidebar-title">Menu</li>
                    <li class="sidebar-item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                        <a href="{{ route('home') }}" class="sidebar-link">
                            <i class="bi bi-house-door"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Master Data</li>
                    <li class="sidebar-item {{ Route::currentRouteName() == 'user.index' ? 'active' : '' }}">
                        <a href="{{ route('user.index') }}" class="sidebar-link">
                            <i class="bi bi-person-gear"></i>
                            <span>Pengguna</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ Route::currentRouteName() == 'classroom.index' ? 'active' : '' }}">
                        <a href="{{ route('classroom.index') }}" class="sidebar-link">
                            <i class="bi bi-building"></i>
                            <span>Kelas</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ Route::currentRouteName() == 'student.index' ? 'active' : '' }}">
                        <a href="{{ route('student.index') }}" class="sidebar-link">
                            <i class="bi bi-people"></i>
                            <span>Siswa</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Layanan BK</li>
                    <li class="sidebar-item {{ Str::startsWith(Route::currentRouteName(), 'counseling') ? 'active' : '' }}">
                        <a href="{{ route('counseling.index') }}" class="sidebar-link">
                            <i class="bi bi-chat-dots"></i>
                            <span>Catatan Konseling</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Pelanggaran & Prestasi</li>
                    <li class="sidebar-item {{ Route::currentRouteName() == 'violation.index' ? 'active' : '' }}">
                        <a href="{{ route('violation.index') }}" class="sidebar-link">
                            <i class="bi bi-x-circle"></i>
                            <span>Pelanggaran</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ Route::currentRouteName() == 'achievment.index' ? 'active' : '' }}">
                        <a href="{{ route('achievment.index') }}" class="sidebar-link">
                            <i class="bi bi-trophy"></i>
                            <span>Prestasi</span>
                        </a>
                    </li>
                @break

                @case('teacher')
                    <li class="sidebar-title">Menu</li>
                    <li class="sidebar-item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                        <a href="{{ route('home') }}" class="sidebar-link">
                            <i class="bi bi-house-door"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @break
            @endswitch
        </ul>
    </div>

    <div class="px-3 pb-3">
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-block w-100">
                <i class="bi bi-box-arrow-right me-2"></i>Logout
            </button>
        </form>
    </div>
</div>
