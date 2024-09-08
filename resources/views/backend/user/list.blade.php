@extends('backend.layouts.app')

@section('content')
<section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">
                Users List
                <a href="{{ route('add-user') }}" class="btn btn-primary " style="float: right;">Add User</a>
            </h5>

            <!-- Table with stripped rows -->
            @include('layouts.messages')
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Status</th>
                  <th scope="col">Created At</th>
                  <th scope="col">Verified</th>
                  <th scop="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($records as $record)
                <tr>
                    <th scope="row">{{ $record->id }}</th>
                    <td>{{ $record->name }}</td>
                    <td>{{ $record->email }}</td>
                    <td>{{ !empty($record->status) ? "Active" : "InActive" }}</td>
                    <td>{{ $record->created_at }}</td>
                    <td>{{ !empty($record->email_verified_at) ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('edit-user' , $record->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a onclick="return confirm('are your to delete this user?')" href="{{ route('delete-user' , $record->id) }}" class="btn btn-danger btn-sm">Delete</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            {!! $records->appends(Request::except('page'))->links() !!}

          </div>
        </div>

      </div>
    </div>
</section>
@endsection