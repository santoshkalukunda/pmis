<div class="">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-funnel"></i>
        Filter
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('projects.search', $office) }}" method="get">
                        <div class="row">
                            <div class="col-md-12">
                                <livewire:project-municipality :project="$project" />
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fiscal_year_id" class="form-label required">आ.ब.</label>
                                    <select name="fiscal_year_id"
                                        class="form-control @error('fiscal_year_id') is-invalid @enderror"
                                        id="fiscal_year_id" aria-describedby="fiscal_year_id">
                                        <option value="">आ.ब. छान्नुहोस्</option>
                                        @foreach ($fiscalYears as $fiscalYear)
                                            <option value="{{ $fiscalYear->id }}">
                                                {{ $fiscalYear->fiscal_year }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('fiscal_year_id')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label required">आयोजनाको नाम</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" id="name" aria-describedby="name">
                                    <div class="invalid-feedback">
                                        @error('name')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="project_type_id" class="form-label required">आयोजनाको
                                        किसिम</label>
                                    <select name="project_type_id"
                                        class="form-control @error('project_type_id') is-invalid @enderror"
                                        id="project_type_id" aria-describedby="project_type_id">
                                        <option value="">आयोजनाको किसिम छान्नुहोस्</option>
                                        @foreach ($projectTypes as $projectType)
                                            <option value="{{ $projectType->id }}"
                                                {{ $projectType->id == $project->project_type_id ? 'selected' : '' }}>
                                                {{ $projectType->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('project_type_id')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="agreement" class="form-label required">सम्झौताको अवस्था</label>
                                    <select name="agreement"
                                        class="form-control @error('agreement') is-invalid @enderror" id="agreement"
                                        aria-describedby="agreement">
                                        <option value="">सम्झौताको अवस्था छान्नुहोस्</option>
                                        <option value="0">सम्झौताको भयको छैन</option>
                                        <option value="1">
                                            सम्झौताको भयको छ</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('agreement')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label required">आयोजनाको
                                        स्थिति</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror"
                                        id="status" aria-describedby="status">
                                        <option value="">आयोजनाको स्थिति छान्नुहोस्</option>
                                        <option value="0">काम भइरहेको छ</option>
                                        <option value="1">
                                            सम्पन्न भइसकेको छ</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('status')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
