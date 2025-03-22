<div class="separator"></div>

<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">

    <li class="nav-item">
        <a class="nav-link text-active-primary py-5 me-6 {{ request()->routeIs('admin.teachers.details') ? 'active' : '' }}"
            href="{{ route('admin.teachers.details', $all_data->id) }}">
            {{ trans('teachers.overview') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-active-primary py-5 me-6 {{ request()->routeIs('admin.teachers.courses') ? 'active' : '' }}"
            href="{{ route('admin.teachers.courses', $all_data->id) }}">
            {{ trans('teachers.courses') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-active-primary py-5 me-6 {{ request()->routeIs('admin.teachers.students') ? 'active' : '' }}"
            href="{{ route('admin.teachers.students', $all_data->id) }}">
            {{ trans('teachers.students') }}
        </a>
    </li>

</ul>
