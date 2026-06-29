@php
    $currentUser = Auth::user();
    $currentRole = $currentUser->getRoleNames()->first();
@endphp
<style>
    .topbar-bg { background-color: #fff !important; }
    html[data-bs-theme=dark] .topbar-bg { background-color: #1e1e2d !important; }
</style>
<header class="mb-3">
        <div class="d-flex align-items-center justify-content-between px-3 py-2 rounded shadow-sm topbar-bg">
        <a href="#" class="burger-btn d-block">
            <i class="bi bi-justify fs-3"></i>
        </a>

        <div class="dropdown ms-auto">
            <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="user-menu d-flex align-items-center">
                    <div class="user-name text-end me-3">
                        <h6 class="mb-0 text-gray-600" style="font-size:0.9rem">{{ $currentUser->name }}</h6>
                        <p class="mb-0 text-sm text-gray-600 text-capitalize" style="font-size:0.75rem">{{ $currentRole }}</p>
                    </div>
                    <div class="user-img d-flex align-items-center">
                        <div class="avatar avatar-md">
                            <span class="avatar-content bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                style="width:42px;height:42px;font-weight:600;font-size:18px">
                                {{ strtoupper(substr($currentUser->name, 0, 1)) }}
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" style="min-width: 11rem;">
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>
