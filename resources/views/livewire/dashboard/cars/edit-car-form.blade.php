<form wire:submit.prevent="update">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name_en" class="form-label"><i class="fas fa-car me-1"></i> Name (EN)</label>
                        <input type="text" class="form-control" id="name_en" placeholder="Name (EN)"
                            wire:model.defer="name_en">
                        @error('name_en')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name_ar" class="form-label"><i class="fas fa-car me-1"></i> Name (AR)</label>
                        <input type="text" class="form-control" id="name_ar" placeholder="Name (AR)"
                            wire:model.defer="name_ar">
                        @error('name_ar')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="chassis_number" class="form-label"><i class="fas fa-barcode me-1"></i> Chassis
                            Number</label>
                        <input type="text" class="form-control" id="chassis_number" placeholder="Chassis Number"
                            wire:model.defer="chassis_number">
                        @error('chassis_number')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="rating" class="form-label"><i class="fas fa-star me-1"></i> Rating</label>
                        <input type="number" class="form-control" id="rating" placeholder="Rating"
                            wire:model.defer="rating" min="0">
                        @error('rating')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="seats" class="form-label"><i class="fas fa-chair me-1"></i> Seats</label>
                        <input type="number" class="form-control" id="seats" placeholder="Seats"
                            wire:model.defer="seats" min="1">
                        @error('seats')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="engine_capacity" class="form-label"><i class="fas fa-tachometer-alt me-1"></i>
                            Engine Capacity</label>
                        <input type="text" class="form-control" id="engine_capacity" placeholder="Engine Capacity"
                            wire:model.defer="engine_capacity">
                        @error('engine_capacity')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="color" class="form-label"><i class="fas fa-palette me-1"></i> Color</label>
                        <input type="text" class="form-control" id="color" placeholder="Color"
                            wire:model.defer="color">
                        @error('color')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="country" class="form-label"><i class="fas fa-flag me-1"></i> Country</label>
                        <input type="text" class="form-control" id="country" placeholder="Country"
                            wire:model.defer="country">
                        @error('country')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="height" class="form-label"><i class="fas fa-arrows-alt-v me-1"></i> Height</label>
                        <input type="number" step="0.01" class="form-control" id="height"
                            placeholder="Height" wire:model.defer="height">
                        @error('height')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="width" class="form-label"><i class="fas fa-arrows-alt-h me-1"></i>
                            Width</label>
                        <input type="number" step="0.01" class="form-control" id="width"
                            placeholder="Width" wire:model.defer="width">
                        @error('width')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="length" class="form-label"><i class="fas fa-ruler-horizontal me-1"></i>
                            Length</label>
                        <input type="number" step="0.01" class="form-control" id="length"
                            placeholder="Length" wire:model.defer="length">
                        @error('length')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="manufacturer" class="form-label"><i class="fas fa-industry me-1"></i>
                            Manufacturer</label>
                        <input type="text" class="form-control" id="manufacturer" placeholder="Manufacturer"
                            wire:model.defer="manufacturer">
                        @error('manufacturer')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="made_in" class="form-label"><i class="fas fa-globe me-1"></i> Made In</label>
                        <input type="text" class="form-control" id="made_in" placeholder="Made In"
                            wire:model.defer="made_in">
                        @error('made_in')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="model" class="form-label"><i class="fas fa-layer-group me-1"></i>
                            Model</label>
                        <input type="text" class="form-control" id="model" placeholder="Model"
                            wire:model.defer="model">
                        @error('model')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="car_class" class="form-label"><i class="fas fa-list-alt me-1"></i> Car
                            Class</label>
                        <input type="text" class="form-control" id="car_class" placeholder="Car Class"
                            wire:model.defer="car_class">
                        @error('car_class')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="engine" class="form-label"><i class="fas fa-cogs me-1"></i> Engine</label>
                        <input type="text" class="form-control" id="engine" placeholder="Engine"
                            wire:model.defer="engine">
                        @error('engine')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="steering_mode" class="form-label"><i class="fas fa-exchange-alt me-1"></i>
                            Steering Mode</label>
                        <input type="text" class="form-control" id="steering_mode" placeholder="Steering Mode"
                            wire:model.defer="steering_mode">
                        @error('steering_mode')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="anti_lock_brake_system" class="form-label"><i class="fas fa-shield-alt me-1"></i>
                            Anti-lock Brake System</label>
                        <input type="text" class="form-control" id="anti_lock_brake_system"
                            placeholder="Anti-lock Brake System" wire:model.defer="anti_lock_brake_system">
                        @error('anti_lock_brake_system')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="extra_urban_cnsumption" class="form-label"><i class="fas fa-road me-1"></i> Extra
                            Urban Consumption</label>
                        <input type="number" step="0.01" class="form-control" id="extra_urban_cnsumption"
                            placeholder="Extra Urban Consumption" wire:model.defer="extra_urban_cnsumption">
                        @error('extra_urban_cnsumption')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="in_urban_cnsumption" class="form-label"><i class="fas fa-city me-1"></i> In Urban
                            Consumption</label>
                        <input type="number" step="0.01" class="form-control" id="in_urban_cnsumption"
                            placeholder="In Urban Consumption" wire:model.defer="in_urban_cnsumption">
                        @error('in_urban_cnsumption')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="registeration_status" class="form-label">
                            <i class="fas fa-id-card me-1"></i>
                            Registration Status
                        </label>
                        <input type="text" class="form-control" id="registeration_status"
                            placeholder="Registration Status" wire:model.defer="registeration_status">
                        @error('registeration_status')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="used_for" class="form-label">
                            <i class="fas fa-briefcase me-1"></i>
                            Used For
                        </label>
                        <input type="text" class="form-control" id="used_for" placeholder="Used For"
                            wire:model.defer="used_for">
                        @error('used_for')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Countries --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="e_t_countries">History Countries
                            <span class="text-danger">*</span>
                        </label>
                        <div wire:ignore>
                            <select @class([
                                'form-control select2',
                                'is-invalid' => $errors->has('selectedCountries'),
                            ]) name="countries" id="e_t_countries" required
                                wire:model="countries" multiple>
                                <option value="">Select Countries</option>
                            </select>
                        </div>
                        @error('selectedCountries')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mt-4 text-end">
                <button type="update" class="btn btn-primary" wire:loading.attr="disabled"
                    wire:target="update, image">
                    <span wire:loading.remove wire:target="update">Update</span>
                    <span wire:loading wire:target="update">Updating...</span>
                </button>
            </div>
        </div>
    </div>
</form>



@script
    <script>
        // $wire.selectedFeatures = data;
        $('#e_t_countries').select2();
        $('#e_t_countries').on('change', function() {
            let data = $(this).val();
            $wire.set('selectedCountries', data, false);
        });

        Livewire.on('setCountries', (event) => {
            let seletcCountries = $('#e_t_countries');
            let countriesData = event[0].countries;
            seletcCountries.empty();
            $.each(countriesData, function(index, value) {

                // the option is selected if value.id is in the selectedCountries array
                let isSelected = $wire.selectedCountries.includes(value.id);

                seletcCountries.append(`<option value="${value.id}"
                        ${isSelected ? 'selected' : ''}
                    >${value.name_en}</option>`);
            });
            seletcCountries.select2();
        });
    </script>
@endscript
