<div>
    <form wire:submit.prevent="fiscalYearsUpdate">
       
        <div class="row">
            <div class="col-md-2">
                <label for="name" class="form-label required">Active Fiscal Year</label>
            </div>
            <div class="col-md-8">
                <select name="fiscal_year_id" class="form-control @error('fiscal_year_id') is-invalid @enderror"
                    wire:model="fiscal_year_id" aria-describedby="fiscal_year_id">
                    @foreach ($fiscalYears as $fiscalYear)
                        <option value="{{ $fiscalYear->id }}"
                            {{ $activeFiscalYear->id == $fiscalYear->id ? 'selected' : '' }}>
                            {{ $fiscalYear->fiscal_year }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    @error('fiscal_year_id')
                        {{ $message }}
                    @enderror

                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Change</button>
            </div>
        </div>
    </form>
</div>
