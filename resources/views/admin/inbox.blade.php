@extends('layouts.admin')

@section('content')
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
                name
              </th>
              <th>
                email
              </th>
              <th>
                call number
              </th>
              <th>
                post
              </th>
              <th>
                created
              </th>
              <th>
                action
              </th>
            </thead>
            <tbody>
              @foreach($inboxes as $inbox)
              <tr>
                <td>
                  {{$inbox->name}}
                </td>
                <td>
                  {{$inbox->email}}
                </td>
                <td>
                  {{$inbox->call_numb}}
                </td>
                <td>
                  {{$inbox->post_id}}
                </td>
                <td>
                  {{$inbox->created_at}}
                </td>
                <td>
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <form method="inbox" action="{{ route('inbox.destroy', $inbox->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                          <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                      </form>
                    </div>
                    <div class="col-auto">
                      <a href="{{ route('inbox.destroy', $inbox->id) }}" class="btn btn-sm btn-info">
                          <i class="now-ui-icons ui-1_email-85"></i>
   
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
