

<div class="md-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" value="{{ old('title') }} @isset($announcement) {{ $announcement->title }} @endisset" class="form-control @error('title') is-invalid @enderror" placeholder="Title announcement" required autocomplete="TRUE" name="title" autofocus >
    @error('title')
    <span role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Description" required autocomplete="description" name="description" autofocus>{{ old('description') }} @isset($announcement) {{ $announcement->description }} @endisset</textarea>
    @error('description')
    <span role="alert">
    <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
@isset($create)
<div class="mb-3">                                                                        
    <select name="church" id="church" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
        <option value="">--Select church--</option>
        @foreach($churches as $church)                                        
            <option value="{{ $church->id }}" @if(old('church') == $church->id) selected @endif>{{ $church->name }}</option>                                   
        @endforeach
    </select>                                                                         
 </div>
@endisset