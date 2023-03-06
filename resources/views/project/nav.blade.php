<div class="py-3 bg-primary">
    <h3 class="text-center">{{ $office->name }}</h3>
    <h4 class="text-center fn-bold">{{ $project->name }}</h4>
    <div class="text-center">{{ $project->projectType->name }}</div>
    <div class="text-center">{{ $project->municipality }}-{{ $project->ward_no }} ,{{ $project->district }}</div>
</div>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link text-dark {{ request()->routeIs('projects.show') ? 'active' : '' }}" aria-current="page"
            href="{{route('projects.show',[$office, $project])}}">विवरण</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark  {{ request()->routeIs('projects.financial') ? 'active' : '' }}" href="{{route('projects.financial',[$office, $project])}}">आर्थिक प्रगति</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark {{ request()->routeIs('projects.acheivement') ? 'active' : '' }}" href="{{route('projects.acheivement',[$office, $project])}}">उपलब्धिहरू</a>
    </li>
   
    <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
    </li>
</ul>
