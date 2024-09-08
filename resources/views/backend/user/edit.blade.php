@extends('backend.layouts.app')

@section('content')

<div class="pagetitle">


    <section class="section">
      <div class="row">
  
        <div class="col-lg-12">
  
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add User</h5>
  
              <form class="row g-3" action="{{ route('update-user'  , $user->id) }}" method="POST">
                  @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" id="inputNanme4" value="{{ $user->name }}">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="inputEmail4" value="{{ $user->email }}">
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Password</label>
                  <input type="text" name="password" class="form-control" id="inputPassword4" placeholder="change the password if you want:">
                </div>
  
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Status</label>
                  <select name="status" id="" class="form-control">
                      <option {{ ($user->status == 1) ? "selected" : '' }} value="1">Active</option>
                      <option {{ ($user->status == 0) ? "selected" : '' }} value="0">InActive</option>
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