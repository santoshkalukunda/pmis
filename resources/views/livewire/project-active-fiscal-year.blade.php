<div>
    <div class="mb-3">
        <label for="fiscal_year_id" class="form-label required">आ.ब.</label>
        <select name="fiscal_year_id"
            class="form-control @error('fiscal_year_id') is-invalid @enderror"
            id="fiscal_year_id" aria-describedby="fiscal_year_id">
            <option value="">आ.ब. छान्नुहोस्</option>
            @foreach ($fiscalYears as $fiscalYear)
                <option value="{{ $fiscalYear->id }}" {{$activeFiscalYear == $fiscalYear->id ? "selected" : ""}}>{{ $fiscalYear->fiscal_year }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            @error('fiscal_year_id')
                {{ $message }}
            @enderror

        </div>
    </div>
</div>
