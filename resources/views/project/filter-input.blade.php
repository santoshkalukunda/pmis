@isset($_GET['municipality'])
    <input type="text" name="municipality" value="{{$_GET['municipality']}}" class="form-control @error('municipality') is-invalid @enderror" id="municipality"
        aria-describedby="municipality" hidden>
@endisset
@isset($_GET['district'])
    <input type="text" name="district" value="{{$_GET['district']}}" class="form-control @error('district') is-invalid @enderror" hidden>
@endisset
@isset($_GET['fiscal_year_id'])
    <input type="text" name="fiscal_year_id" class="form-select" value="{{$_GET['fiscal_year_id']}}" hidden>
@endisset

@isset($_GET['name'])
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ $_GET['name']}}" id="name" aria-describedby="name" hidden>
@endisset

@isset($_GET['project_type_id'])
    <input type="text" name="project_type_id" value="{{$_GET['project_type_id']}}" class="form-control @error('project_type_id') is-invalid @enderror"
        id="project_type_id" aria-describedby="project_type_id" hidden>
@endisset
@isset($_GET['status'])
    <input type="text" name="status" value="{{$_GET['status']}}" class="form-control @error('status') is-invalid @enderror" id="status"
        aria-describedby="status" hidden>
@endisset
