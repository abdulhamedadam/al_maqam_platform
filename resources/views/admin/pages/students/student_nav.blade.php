<div class="separator"></div>

<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
    <li class="nav-item">
        <a class="nav-link text-active-primary py-5 me-6 {{ request()->routeIs('admin.students.courses') ? 'active' : '' }}"
            href="{{ route('admin.students.courses', $all_data->id) }}">
            {{ trans('students.courses') }}
        </a>
    </li>

</ul>
