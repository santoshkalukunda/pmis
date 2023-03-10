<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            @php
                $district = '';
            @endphp
            <label for="district" class="form-label required">जिल्ला</label>
            <select name="district" wire:model="districtName" class="form-control @error('district') is-invalid @enderror">
                <option value="">जिल्ला छान्नुहोस्</option>
                @foreach ($municipalities as $municipality)
                    @if ($district == $municipality->district)
                        @php
                            continue;
                        @endphp
                    @else
                        <option value="{{ $municipality->district }}">{{ $municipality->district }}</option>
                        @php
                            $district = $municipality->district;
                        @endphp
                    @endif
                @endforeach
            </select>
            <div class="invalid-feedback">
                @error('district')
                    {{ $message }}
                @enderror

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            @php
                $name = '';
            @endphp
            <label for="municipality" class="form-label required">स्थानीय तह</label>
            <select name="municipality" wire:model="municipality"
                class="form-control @error('municipality') is-invalid @enderror" id="municipality"
                aria-describedby="municipality">
                <option value="">स्थानीय तह छान्नुहोस्</option>
                @foreach ($municipalities as $municipality)
                    @if ($districtName == $municipality->district)
                        <option value="{{ $municipality->name }}">{{ $municipality->name }}</option>
                    @endif
                @endforeach
            </select>
            <div class="invalid-feedback">
                @error('municipality')
                    {{ $message }}
                @enderror

            </div>
        </div>
    </div>
</div>
