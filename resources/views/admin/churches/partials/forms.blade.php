<!--church form partials for creation and editing  -->

<div class="col-md-6">
    <label for="name" class="form-label">Church Name</label>
    <input type="text" value="{{ old('name') }} @isset($church) {{$church->name }} @endisset" class="form-control @error('name') is-invalid @enderror"  name="name" autofocus>
    @error('name')
        <span role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="col-md-6">
    <label for="address" class="form-label">Address</label>
    <input type="text" value="{{ old('address') }} @isset($church) {{ $church->address }} @endisset" class="form-control @error('address') is-invalid @enderror" name="address" autofocus>
    @error('address')
        <span role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
@isset($create)
<div class="col-md-6">
    <label for="latitude" class="form-label">Latitude</label>
    <input type="latitude" value="{{ old('latitude') }} @isset($church) {{ $church->latitude }} @endisset" class="form-control @error('latitude') is-invalid @enderror" name="latitude" autofocus>
    @error('latitude')
        <span role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="col-md-6">
    <label for="longitude" class="form-label">Longitude</label>
    <input type="longitude" value="{{ old('longitude') }} @isset($church) {{ $church->longitude }} @endisset" class="form-control @error('longitude') is-invalid @enderror" name="longitude" autofocus>
    @error('longitude')
        <span role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
@endisset
<div class="col-md-6">
    <label for="program" class="form-label">Church Activites</label>
    <textarea class="form-control @error('program') is-invalid @enderror" name="program" autofocus>{{ old('program') }} @isset($church) {{ $church->program }} @endisset</textarea>
    @error('program')
        <span  role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="col-md-6">
    <label for="website" class="form-label">Church Website</label>
    <input type="website" value="{{ old('website') }} @isset($church) {{ $church->website }} @endisset" class="form-control @error('website') is-invalid @enderror" required autocomplete="website" autofocus name="website">
    @error('website')
        <span  role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>