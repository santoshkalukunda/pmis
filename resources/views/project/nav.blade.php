<div class="py-3 bg-primary">
    <h3 class="text-center">{{ $office->name }}</h3>
    <h4 class="text-center fn-bold">{{ $project->name }}</h4>
    <div class="text-center">{{ $project->projectType->name ?? '' }}</div>
    <div class="text-center">{{ $project->municipality }}-{{ $project->ward_no }} ,{{ $project->district }}</div>
</div>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link text-dark {{ request()->routeIs('projects.show') ? 'active' : '' }}" aria-current="page"
            href="{{ route('projects.show', [$office, $project]) }}">विवरण</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark  {{ request()->routeIs('projects.budgets') ? 'active' : '' }}"
            href="{{ route('projects.budgets', [$office, $project]) }}">विनियोजित बजेट</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark  {{ request()->routeIs('projects.physicalProgress') ? 'active' : '' }}"
            href="{{ route('projects.physicalProgress', [$office, $project]) }}">सम्झौता विवरण</a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link text-dark {{ request()->routeIs('projects.indicator') ? 'active' : '' }}"
            href="{{ route('projects.indicator', [$office, $project]) }}">सूचकहरू</a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link text-dark {{ request()->routeIs('projects.estimate') ? 'active' : '' }}"
            href="{{ route('projects.estimate', [$office, $project]) }}">सूचकहरू</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark  {{ request()->routeIs('projects.expenditures') ? 'active' : '' }}"
            href="{{ route('projects.expenditures', [$office, $project]) }}">खर्चहरु</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark {{ request()->routeIs('projects.acheivement') ? 'active' : '' }}"
            href="{{ route('projects.acheivement', [$office, $project]) }}">उपलब्धिहरू</a>
    </li>


    <li class="nav-item">
        <a class="nav-link text-dark {{ request()->routeIs('projects.photos') ? 'active' : '' }}"
            href="{{ route('projects.photos', [$office, $project]) }}">कागजातहरू</a>
    </li>
    <li class="nav-item ml-auto">
        <a class="nav-link text-dark"
            href="{{ route('projects.index', [$office, $project]) }}">Back</a>
    </li>
</ul>
