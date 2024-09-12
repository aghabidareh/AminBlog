@extends('backend.layouts.app')

@section('content')
<section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">
                Blog List
                <a href="{{ route('add-blog') }}" class="btn btn-primary " style="float: right;">Blog Category</a>
            </h5>

            <!-- Table with stripped rows -->
            @include('layouts.messages')
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Category</th>
                  <th scope="col">Image</th>
                  <th scope="col">Meta Description</th>
                  <th scope="col">Tags</th>
                  <th scope="col">Publish</th>
                  <th scope="col">Status</th>
                  <th scope="col">Created At</th>
                  <th scop="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($records as $record)
                <tr>
                    <th scope="row">{{ $record->id }}</th>
                    <td>{{ $record->name }}</td>
                    <td>{{ $record->title }}</td>
                    <td>{{ $record->category }}</td>
                    <td>{{ $record->image }}</td>
                    <td>{{ $record->meta_description }}</td>
                    <td>{{ $record->meta_title }}</td>
                    <td>{{ $record->meta_keywords }}</td>
                    <td>{{ empty($record->status) ? "Active" : "InActive" }}</td>
                    <td>{{ $record->created_at }}</td>
                    <td>
                        <a href="{{ route('edit-category' , $record->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a onclick="return confirm('are your to delete this user?')" href="{{ route('delete-category' , $record->id) }}" class="btn btn-danger btn-sm">Delete</a></td>
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