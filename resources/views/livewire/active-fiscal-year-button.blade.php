<div class="d-flex">
    <label class="p-2"> आ.ब. </label>
    <select wire:model="fiscal_year_id" class="form-select" wire:change="setFiscalYear" >
        @foreach ($fiscalYears as $fiscalYear)
            <option value="{{ $fiscalYear->id }}">
                {{ $fiscalYear->fiscal_year }}</option>
        @endforeach
    </select>
</div>
