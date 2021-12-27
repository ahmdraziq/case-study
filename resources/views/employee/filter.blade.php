<div wire:ignore.self class="accordion accordion-flush mb-3" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Advanced Filtering
            </button>
        </h2>
        <div wire:ignore.self id="flush-collapseOne" class="accordion-collapse collapse"
            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <div class="row mb-3">
                    <div class="col-12 col-md-3">
                        <label for="" class="col-form-label">Country</label>
                        <select class="form-control" wire:model.defer='p_country'>
                            <option value="">-</option>
                            @foreach ($allcountry as $item)
                            <option value="{{ $item->country }}">{{ $item->country }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="" class="col-form-label">State</label>
                        <select class="form-control" wire:model.defer='p_state'>
                            <option value="">-</option>
                            @foreach ($allstate as $item)
                            <option value="{{ $item->state }}">{{ $item->state }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="" class="col-form-label">Postcode</label>
                        <input type="text" class="form-control" wire:model.defer='p_postcode'>
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="" class="col-form-label">City</label>
                        <select class="form-control" wire:model.defer='p_city'>
                            <option value="">-</option>
                            @foreach ($allcity as $item)
                            <option value="{{ $item->city }}">{{ $item->city }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <label for="" class="col-form-label">Status</label>
                        <select class="form-control" wire:model.defer='p_status'>
                            <option value="">All</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>