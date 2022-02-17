
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" value="{{ old('name') }} @isset($adoration) {{ $adoration->name }} @endisset" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="name of Ministry" autofocus>
    @error('name')
    <span role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="mb-3">
    <label for="program" class="form-label">Program</label>
    <textarea type="text" class="form-control @error('program') is-invalid @enderror" id="program" name="program" autocomplete="TRUE" placeholder="Describe Ministry activities" autofocus>{{ old('program') }} @isset($adoration) {{ $adoration->program }} @endisset</textarea>
    @error('program')
    <span role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" value="{{ old('address') }} @isset($adoration) {{ $adoration->address }} @endisset" class="form-control @error('address') is-invalid @enderror" id="address" name="address" autocomplete="TRUE" placeholder="Ministry address" autofocus />
    @error('address')
    <span role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>