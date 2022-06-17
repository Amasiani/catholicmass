
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" value="{{ old('name') }} @isset($society) {{ $society->name}} @endisset" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
    @error('name')
    <span role="alert">
        <strong>{{ message }}</strong>
    </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="program" class="form-label">Program</label>
    <textarea type="text" class="form-control @error('program') is-invalid @enderror" id="program" name="program" autocomplete="TRUE" autofocus>{{ old('program') }} @isset($society) {{ $society->program }} @endisset</textarea>
    @error('program')
    <span role="alert">
        <strong>{{ message }}</strong>
    </span>
    @enderror
    @isset($create)
    <div class="mt-3">                                                                        
      <select name="church" id="church" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
          @foreach($churches as $church)                                        
              <option value="{{ $church->id }}" @if(old('church') == $church->id) selected @endif>{{ $church->name }}</option>                                   
          @endforeach
      </select>                                                                         
    </div>
  @endisset
  </div>