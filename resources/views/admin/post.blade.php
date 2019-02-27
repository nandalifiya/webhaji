@extends('layouts.admin')

@section('content')
<div class="row align-items-center" style="margin-top: -6.25rem !important;position:absolute;">
  <div class="col-auto mr-auto">
    <h4 style="color:white;">List post</h4>
  </div>
  <div class="col-auto">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreatePost" style="margin-top:1.75rem">
      Tambah post
    </button>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Inbox </h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>
                title
              </th>
              <th>
                price
              </th>
              <th>
                image
              </th>
              <th>
                created
              </th>
              <th>
                action
              </th>
            </thead>
            <tbody>
              @foreach($posts as $post)
              <tr>
                <td>
                  {{$post->title}}
                </td>
                <td>
                  {{$post->price}}
                </td>
                <td>
                  <img src="{{ url('storage').'/'.$post->filename}}" alt="{{$post->filename}}" style="max-width:100px;max-height:50px;">
                </td>
                <td>
                  {{$post->created_at}}
                </td>
                <td>
                  <form method="post" action="{{ route('post.destroy', $post->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">
                      <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalCreatePost" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          {{ csrf_field() }}
          <div class="form-group">
            <label for="title">Title <span style="color:red">*</span></label>
            <input type="text" class="form-control" name="title" id="title" />
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
            <input type="file" class="form-control-file" name="image" id="image" />
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" id="price" />
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea type="textarea" class="form-control" name="description" id="description" rows="3"></textarea>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
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
