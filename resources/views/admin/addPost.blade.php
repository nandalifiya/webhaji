@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Tambah Post</h4>
      </div>
      <div class="card-body">
        <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">

          {{ csrf_field() }}
          <div class="form-group">
            <label for="title">Title <span style="color:red">*</span></label>
            <input type="text" class="form-control" name="title" id="title" required />
          </div>
          <div id="image-preview-div" style="display: none">
            <label for="exampleInputFile">Selected image:</label>
            <br>
            <div class="row">
              <div class="col-12">
                <img class="img-fluid" id="preview-img" src="noimage">
              </div>
            </div>
          </div>
          <div id="message"></div>
          <div class="form-group">
            <label for="image">Upload gambar <span style="color:red">*</span></label>
            <input type="file" class="form-control-file" name="image" id="image" required />
          </div>
          <div class="form-group">
            <label for="description">Description<span style="color:red">*</span></label>
            <textarea type="textarea" class="form-control" name="description" id="description" rows="3" required></textarea>
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" id="price" />
          </div>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
<script>
  function noPreview() {
    $('#image-preview-div').css("display", "none");
    $('#preview-img').attr('src', 'noimage');
    $('upload-button').attr('disabled', '');
  }

  function selectImage(e) {
    $('#file').css("color", "green");
    $('#image-preview-div').css("display", "block");
    $('#preview-img').attr('src', e.target.result);
    $('#preview-img').css('max-width', '100%');
  }

  $(document).ready(function (e) {

    var maxsize = 500 * 1024; // 500 KB

    $('#max-size').html((maxsize / 1024).toFixed(2));

    $('#image').change(function () {

      $('#message').empty();

      var file = this.files[0];
      var match = ["image/jpeg", "image/png", "image/jpg"];

      if (!((file.type == match[0]) || (file.type == match[1]) || (file.type == match[2]))) {
        noPreview();

        $('#message').html(
          '<div class="alert alert-warning" role="alert">Unvalid image format. Allowed formats: JPG, JPEG, PNG.</div>'
        );

        return false;
      }

      if (file.size > maxsize) {
        noPreview();

        $('#message').html(
          '<div class=\"alert alert-danger\" role=\"alert\">The size of image you are attempting to upload is ' +
          (file.size / 1024).toFixed(2) + ' KB, maximum size allowed is ' + (maxsize / 1024).toFixed(2) +
          ' KB</div>');

        return false;
      }

      var reader = new FileReader();
      reader.onload = selectImage;
      reader.readAsDataURL(this.files[0]);

    });

  });

</script>
@endsection
