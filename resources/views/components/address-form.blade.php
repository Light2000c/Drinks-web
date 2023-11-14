<div class="">
    <div class="form-group border p-3">
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" name="fullname" class="form-control"
                        id="floatingInput" value="{{ $address->fullname ?? '' }}" placeholder="Full Name">
                    <label for="fullname">Full Name</label>
                    @error('fullname')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="tel"  name="phone" class="form-control"
                        id="floatingInput" value="{{ $address->phone ?? '' }}" placeholder="Phone No">
                    <label for="fullname">Phone</label>
                    @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-floating mb-3">
                <input type="text" name="delivery_address" class="form-control"
                    id="floatingInput" value="{{ $address->delivery_address ?? '' }}"  placeholder="Delivery Address">
                <label for="delivery_address">Delivery Address</label>
                @error('delivery_address')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="col">
            <div class="form-floating mb-3">
                <input type="text" name="additional_information" class="form-control"
                    id="floatingInput" value="{{ $address->additional_information ?? '' }}" placeholder="Additional Information">
                <label for="additional_infromation">Additional Address (Optional)</label>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" name="region" class="form-control"
                        id="floatingInput" value="{{ $address->region ?? '' }}" placeholder="Region">
                    <label for="region">Region</label>
                    @error('region')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" name="city" class="form-control"
                        id="floatingInput" value="{{ $address->city ?? '' }}" placeholder="City">
                    <label for="city">City</label>
                    @error('city')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mt-3 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary"> Save Address</button>
        </div>
    </div>

</div>