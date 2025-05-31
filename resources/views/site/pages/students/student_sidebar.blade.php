<div class="col-xl-3 col-lg-4">
    <div class="student-profile-sidebar mb-30">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                    role="tab" aria-controls="home" aria-selected="true">
                    <i class="fas fa-house"></i>
                    {{ trans('profile.dashboard') }}
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ request()->routeIs('user.student_profile') ? 'active' : '' }}"
                    href="{{ route('user.student_profile') }}" role="tab">
                    <i class="fas fa-user"></i> {{ trans('profile.my_profile') }}
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ request()->routeIs('user.enrolled_courses') ? 'active' : '' }}"
                    href="{{ route('user.enrolled_courses') }}" role="tab">
                    <i class="fas fa-graduation-cap"></i> {{ trans('profile.enrolled_courses') }}
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ request()->routeIs('user.student.calendar') ? 'active' : '' }}"
                    href="{{ route('user.student.calendar') }}" role="tab" aria-controls="contact"
                    aria-selected="false">
                    <i class="fas fa-calendar-alt"></i> {{ trans('profile.student_calendar') }}
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ request()->routeIs('user.student.appointments') ? 'active' : '' }}"
                    href="{{ route('user.student.appointments') }}" role="tab" aria-controls="contact"
                    aria-selected="false">
                    <i class="fas fa-calendar-check"></i> {{ trans('profile.student_appointments') }}
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ request()->routeIs('user.notifications') ? 'active' : '' }}"
                    href="{{ route('user.notifications') }}" role="tab" aria-controls="contact"
                    aria-selected="false">
                    <i class="fas fa-bell"></i> {{ trans('profile.student_notifications') }}
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ request()->routeIs('user.cancellations.index') ? 'active' : '' }}"
                    href="{{ route('user.cancellations.index') }}" role="tab" aria-controls="contact"
                    aria-selected="false">
                    <i class="fas fa-times-circle"></i> {{ trans('profile.cancellations') }}
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button"
                    role="tab" aria-controls="reviews" aria-selected="false">
                    <i class="fas fa-star"></i> {{ trans('profile.reviews') }}
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="history-tab" data-bs-toggle="tab" data-bs-target="#history" type="button"
                    role="tab" aria-controls="history" aria-selected="false">
                    <i class="fas fa-cart-plus"></i> {{ trans('profile.order_history') }}
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="setting-tab" data-bs-toggle="tab" data-bs-target="#setting" type="button"
                    role="tab" aria-controls="setting" aria-selected="false">
                    <i class="fas fa-cog"></i> {{ trans('profile.settings') }}
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <form method="POST" action="{{ route('user.logout') }}" class="d-inline">
                    @csrf
                    <button class="nav-link" type="submit" role="button">
                        <i class="fas fa-sign-out-alt"></i> {{ __('profile.logout') }}
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
