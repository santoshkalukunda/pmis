<div>
    <label for="office_id"
    class="col-form-label text-md-end">{{ __('Office Name') }}</label>

    <select id="office_id" class="form-control @error('office_id') is-invalid @enderror" name="office_id"
        value="{{ old('office_id') }}" required autocomplete="office_id">
        <option value="">Selec Office</option>
    </select>
    @error('office_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
