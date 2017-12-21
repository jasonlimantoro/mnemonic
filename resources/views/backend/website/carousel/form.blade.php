<form method="POST" action="{{ route('carousel.image.upload', ['carouselId' => 1]) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="inputImage">Upload More Images</label>
        <input type="file" name="image" id="inputImage">
    </div>
    <div class="form-group">
        <label for="carouselCaption">Caption</label>
        <textarea name="caption" class="form-control" id="carouselCaption" cols="30" rows="10" placeholder="Enter caption"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Upload</button>
</form>