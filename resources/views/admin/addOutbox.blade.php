@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Tambah Outbox</h4>
      </div>
      <div class="card-body">
        <form method="post" action="{{ route('outbox.store') }}" >

          {{ csrf_field() }}
          <div class="form-group">
            <label for="email">Email Penerima <span style="color:red">*</span></label>
            <input type="text" class="form-control" name="email" id="email" value="{{ $inbox->email }}" required/>
          </div>

          <div class="form-group">
            <label for="subject">Subject <span style="color:red">*</span></label>
            <input type="text" class="form-control" name="subject" id="subject" required/>
          </div>
          
          <div class="form-group">
            <label for="description">Description<span style="color:red">*</span></label>
            <textarea type="textarea" class="form-control" name="description" id="description" rows="3" required></textarea>
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control" name="inbox_id" id="inbox_id" value="{{ $inbox->id }}" />
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control" name="post_id" id="post_id" value="{{ $inbox->post_id }}" />
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Kirim email</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
