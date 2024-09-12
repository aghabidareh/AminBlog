@extends('backend.layouts.app')

@section('content')


<div class="pagetitle">


  <section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add Blog</h5>

            <form class="row g-3" action="{{ route('store-blog') }}" method="POST" enctype="multipart/form-data">
                @csrf

              <div class="col-12">
                <label class="form-label">Title</label>
                <input type="text" name="title"  required class="form-control">
              </div>

              <div class="col-12">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-control" required>
                    @foreach ($records as $record)
                    <option value="{{ $record->id }}">{{ $record->name }}</option>
                    @endforeach
                </select>
              </div>

              <div class="col-12">
                <label class="form-label">Image</label>
                <input type="file" name="image" required class="form-control">
              </div>

              <div class="col-12">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control tinymce-editor"></textarea>
              </div>

              <div class="col-12">
                <label class="form-label">Tags</label>
                <input type="text" name="tags" required class="form-control">
              </div>

              <div class="col-12">
                <label class="form-label">Meta Keywords</label>
                <input type="text" name="meta_keywords" required class="form-control">
              </div>

              <div class="col-12">
                <label class="form-label">Meta Description</label>
                <textarea name="meta_description" class="form-control"></textarea>
              </div>

              <hr>

              <div class="col-12">
                <label for="inputPassword4" class="form-label">Publish</label>
                <select name="is_publish" id="" class="form-control">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
              </div>


              <div class="col-12">
                <label for="inputPassword4" class="form-label">Status</label>
                <select name="status" id="" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">InActive</option>
                </select>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
              </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </section>


@endsection