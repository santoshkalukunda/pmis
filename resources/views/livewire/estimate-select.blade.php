<div class="col-md-5">
    <div class="row mt-n3">
        <div class="col-md-5">
            <label class="p-2 required">विवरण</label>
            <select name="estimate_id" class="form-select" wire:model="estimate_id" wire:change="setEstimate">
                <option value="">छान्नुहोस्</option>
                @foreach ($estimates as $estimates)
                    <option value="{{ $estimates->id }}">
                        {{ $estimates->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label class="p-2">एकाई</label>
            <input class="form-control" type="text" name="unit" value="{{ old('unit') }}" wire:model="unit" id="" readonly>
        </div>
        <div class="col-md-3">
            <label class="p-2">दर</label>
            <input class="form-control text-right" type="text" name="rate" value="{{ old('rate') }}" wire:model="rate" id="" readonly>

        </div>
    </div>
</div>
