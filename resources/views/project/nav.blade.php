<div class="py-3 bg-primary">
    <h3 class="text-center">{{ $office->name }}</h3>
    <h4 class="text-center fn-bold">{{ $project->name }}</h4>
    <div class="text-center">{{ $project->projectType->name }}</div>
    <div class="text-center">{{ $project->municipality }}-{{ $project->ward_no }} ,{{ $project->district }}</div>
</div>
<ul class="nav nav-tabs bg-dark">
    <li class="nav-item">
        <a class="nav-link {{ Request::is('projects/$office/$project') ? 'active' : '' }} active" aria-current="page"
            href="#">विवरण</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">उल्लेखनिए कार्यहरू</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">आर्थिक प्रगति</a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
    </li>
</ul>
