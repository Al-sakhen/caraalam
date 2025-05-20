<div class="container py-4">
    <form wire:submit.prevent="submit">
        <div class="row">
            <div class="mb-3 col-md-6">
                <label class="form-label">Name (EN)</label>
                <input type="text" wire:model.defer="name_en"
                    class="form-control @error('name_en') is-invalid @enderror">
                @error('name_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label">Name (AR)</label>
                <input type="text" wire:model.defer="name_ar"
                    class="form-control @error('name_ar') is-invalid @enderror" dir="rtl">
                @error('name_ar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label">Description (EN)</label>
                <textarea wire:model.defer="description_en" class="form-control @error('description_en') is-invalid @enderror"
                    rows="3"></textarea>
                @error('description_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label">Description (AR)</label>
                <textarea wire:model.defer="description_ar" class="form-control @error('description_ar') is-invalid @enderror"
                    rows="3" dir="rtl"></textarea>
                @error('description_ar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label">Image</label>
                <input type="file" wire:model="image" class="form-control @error('image') is-invalid @enderror"
                    accept="image/*">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" alt="image" class="mt-2 img-fluid" width="100">
                @elseif ($category?->image && file_exists(public_path($category->image)))
                    <img src="{{ asset($category->image) }}" alt="image" class="mt-2 img-fluid" width="100">
                @endif
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label">Status</label>
                <select wire:model.defer="status" class="form-select @error('status') is-invalid @enderror">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="submit, image">
            <span wire:loading.remove wire:target="submit">Update</span>
            <span wire:loading wire:target="submit">Updating...</span>
        </button>
        @if (session()->has('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif
    </form>
</div>
