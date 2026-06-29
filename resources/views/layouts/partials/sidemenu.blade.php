@php
    $user = Auth::user();
    $role = $user->getRoleNames()->first();
@endphp

<div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="{{ route('home') }}" class="text-decoration-none d-flex align-items-center gap-2">
                    <span class="fw-bold mb-0" style="font-size:1.25rem">{{ config('app.name', 'SIAP BK') }}</span>
                </a>
            </div>
            <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 21 21" fill="none"
                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4z"
                        opacity=".3" />
                    <path
                        d="M4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                        opacity=".3" />
                    <circle cx="10.5" cy="11.5" r="4" />
                </svg>
                <div class="form-check form-switch fs-6">
                    <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor:pointer">
                    <label class="form-check-label"></label>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    fill="currentColor">
                    <path
                        d="m17.75 4.09-2.53 1.94.91 3.06-2.63-1.81-2.63 1.81.91-3.06-2.53-1.94L12.44 4l1.06-3 1.06 3 3.19.09m3.5 6.91-1.64 1.25.59 1.98-1.7-1.17-1.7 1.17.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95 2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14.4-.4.82-.76 1.27-1.08.75-.53 1.93.36 1.85 1.19-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82-2.81 3.14-2.7 7.96.31 10.98 3.02 3.01 7.84 3.12 10.98.31z" />
                </svg>
            </div>
            <div class="sidebar-toggler x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
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

                    <li class="sidebar-item {{ Str::startsWith(Route::currentRouteName(), 'appointment') ? 'active' : '' }}">
                        <a href="{{ route('appointment.index') }}" class="sidebar-link">
                            <i class="bi bi-calendar-check"></i>
                            <span>Janji Temu Siswa</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ Str::startsWith(Route::currentRouteName(), 'parent-call') ? 'active' : '' }}">
                        <a href="{{ route('parent-call.index') }}" class="sidebar-link">
                            <i class="bi bi-telephone"></i>
                            <span>Panggilan Orang Tua</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Laporan</li>
                    <li class="sidebar-item {{ Route::currentRouteName() == 'report.semester' ? 'active' : '' }}">
                        <a href="{{ route('report.semester') }}" class="sidebar-link">
                            <i class="bi bi-file-text"></i>
                            <span>Laporan BK Semester</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ Str::startsWith(Route::currentRouteName(), 'import-export') ? 'active' : '' }}">
                        <a href="{{ route('import-export.index') }}" class="sidebar-link">
                            <i class="bi bi-database"></i>
                            <span>Import / Export Data</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Pelanggaran & Prestasi</li>
                    <li class="sidebar-item {{ Route::currentRouteName() == 'violation.index' ? 'active' : '' }}">
                        <a href="{{ route('violation.index') }}" class="sidebar-link">
                            <i class="bi bi-x-circle"></i>
                            <span>Pelanggaran</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ Route::currentRouteName() == 'achievment.all' ? 'active' : '' }}">
                        <a href="{{ route('achievment.all') }}" class="sidebar-link">
                            <i class="bi bi-trophy"></i>
                            <span>Prestasi Siswa</span>
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
