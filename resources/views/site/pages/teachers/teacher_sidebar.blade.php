<div class="col-xl-3 col-lg-4">
    <div class="student-profile-sidebar mb-30">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                    role="tab" aria-controls="home" aria-selected="true">
                    <i class="fas fa-house"></i>
                    Dashboard
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ request()->routeIs('user.teacher_profile') ? 'active' : '' }}"
                    href="{{ route('user.teacher_profile') }}" role="tab">
                    <i class="fas fa-user"></i> {{ trans('profile.my_profile') }}
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ request()->routeIs('user.teacher_schedule') ? 'active' : '' }}"
                    href="{{ route('user.teacher_schedule') }}" role="tab" aria-controls="schedule"
                    aria-selected="false">
                    <i class="fas fa-clock"></i> {{ trans('profile.teacher_schedules') }}
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ request()->routeIs('user.teacher.assigned_courses') ? 'active' : '' }}"
                    href="{{ route('user.teacher.assigned_courses') }}" role="tab" aria-controls="contact"
                    aria-selected="false">
                    <i class="fas fa-graduation-cap"></i> {{ trans('profile.assigned_courses') }}
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button"
                    role="tab" aria-controls="reviews" aria-selected="false">
                    <i class="fas fa-star"></i> Reviews
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="history-tab" data-bs-toggle="tab" data-bs-target="#history" type="button"
                    role="tab" aria-controls="history" aria-selected="false">
                    <i class="fas fa-cart-plus"></i> Order History
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="setting-tab" data-bs-toggle="tab" data-bs-target="#setting" type="button"
                    role="tab" aria-controls="setting" aria-selected="false">
                    <i class="fas fa-cog"></i> Settings
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="logout-tab" data-bs-toggle="tab" data-bs-target="#logout" type="button"
                    role="tab" aria-controls="logout" aria-selected="false"
                    onclick="window.location.href='login.html';">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </li>
        </ul>
    </div>
</div>
