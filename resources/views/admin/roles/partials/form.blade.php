
<div class="md-3 py-2">
    <label for="name" class="form-label">Name</label>
    <input type="text" value="{{ old('name') }} @isset($role) {{ $role->name}} @endisset" class="form-control @error('name') is-invalid @enderror" placeholder="Role name" required autocomplete="TRUE" name="name" autofocus >
    @error('title')
    <span role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>  