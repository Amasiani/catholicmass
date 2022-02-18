
<div class="col-12">
    <label for="title" class="form-label">Title</label>
    <input type="text" value="{{ old('title') }} @isset($notification) {{ $notification->title }} @endisset" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title">
    @error('title')
    <span role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="col-12">
    <label for="description" class="form-label">Description</label>
    <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description">{{ old('description') }} @isset($notification) {{ $notification->description }} @endisset</textarea>
    @error('description')
    <span role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Choice image...</label>
        <input class="form-control" name="image" type="file" id="image">
        <img src=" @isset($notification){{ asset('images/' . $notification->img) }}@endisset" width="50px" heigth="50px" alt="notification_image">
</div>
