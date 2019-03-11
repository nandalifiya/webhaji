@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">outbox </h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>
                email
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
              @foreach($outboxes as $outbox)
              <tr>
                <td>
                  {{$outbox->email}}
                </td>
                <td>
                  {{$outbox->post}}
                </td>
                <td>
                  {{$outbox->created_at}}
                </td>
                <td>
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <form method="outbox" action="{{ route('outbox.destroy', $outbox->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                          <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                      </form>
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
