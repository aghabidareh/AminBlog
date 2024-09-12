@extends('backend.layouts.app')

@section('content')


<div class="pagetitle">


  <section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add Category</h5>

            <form class="row g-3" action="{{ route('store-category') }}" method="POST">
                @csrf
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="form-control" id="inputNanme4">
              </div>
              <div class="text-danger">{{ $errors->first('name') }}</div>

              <div class="col-12">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" required class="form-control">
              </div>
              <div class="text-danger">{{ $errors->first('title') }}</div>

              <hr>

              <div class="col-12">
                <label class="form-label">Meta Title</label>
                <input type="text" name="meta_title" value="{{ old('meta_title') }}" required class="form-control">
              </div>
              <div class="text-danger">{{ $errors->first('meta_title') }}</div>

              <div class="col-12">
                <label class="form-label">Meta Keywords</label>
                <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}" required class="form-control">
              </div>
              <div class="text-danger">{{ $errors->first('meta_keywords') }}</div>

              <div class="col-12">
                <label class="form-label">Meta Description</label>
                <textarea name="meta_description" id="form-control"></textarea>
              </div>
              <div class="text-danger">{{ $errors->first('meta_description') }}</div>

              <hr>


              <div class="col-12">
                <label for="inputPassword4" class="form-label">Status</label>
                <select name="status" id="" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">InActive</option>
                </select>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </section>


@endsection