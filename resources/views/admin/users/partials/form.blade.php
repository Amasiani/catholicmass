<div class="col-md-6">
    <label for="name">Name:</label>
    <input type="text" value="{{ old('name') }} @isset($user) {{ $user->name }} @endisset" name="name" autofocus class="form-control @error('name') is-invalid @enderror"  />
    @error('name')
    <span role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="col-md-6">
    <label for="email">Email:</label>
    <input type="email" value="{{ old('email') }} @isset($user) {{ $user->email }} @endisset" name="email" placeholder="email" autofocus class="form-control @error('email') is-invalid @enderror" />
    @error('email')
    <span role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
@isset($create)
<div class="col-md-6">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror"  required autocomplete="TRUE" name="password" autofocus id="password" placeholder="Password">
    @error('password')
       <span role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="col-md-6">
    <label for="password_confirmation" class="form-label">Confirm password</label>
    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm password" required autocomplete="TRUE" name="password_confirmation" autofocus id="password_confirmation" placeholder="Confirm password">
    @error('password_confirmation')
        <span role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
@endisset
<div class="col-md-6">                                                                        
    <select name="churches[]" id="church" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
        <option>--Select church--</option>
        @foreach($churches as $church)                                        
            <option value="{{ $church->id }}" id="{{ $church->name }}" @isset($user) @if(in_array($church->id, $user->churches->pluck('id')->toArray())) selected @endif @endisset>{{ $church->name }}</option>                                   
        @endforeach
    </select>                                                                         
</div> 
<div class="col-md-6">
    <div class="form-check form-check-inline">                                        
        @foreach($roles as $role)
        <input value="{{ $role->id }}" name="roles[]" type="checkbox" id="{{ $role->name }}" @isset($user) @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif @endisset>
        <label class="form-check-label" for="{{ $role->name }}">
            {{ $role->name }}
        </label>
        @endforeach
    </div>
</div>
