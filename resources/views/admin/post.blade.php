@extends('layouts.admin')

@section('content')
<div class="row align-items-center" style="margin-top: -6.25rem !important;position:absolute;">
  <div class="col-auto mr-auto">
    <h4 style="color:white;">List post</h4>
  </div>
  <div class="col-auto">
    <a href="{{ route('post.create') }}">
      <button type="button" class="btn btn-primary" style="margin-top:1.75rem">
        Tambah post
      </button>
    </a>
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
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <form method="post" action="{{ route('post.destroy', $post->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                          <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                      </form>
                    </div>
                    <div class="col-auto">
                      <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-warning">
                          <i class="now-ui-icons ui-2_settings-90"></i>
                      
                      </a>
                    </div>
                  </div>
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

@endsection
