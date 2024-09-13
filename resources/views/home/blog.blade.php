@extends('layouts.app')

@section('content')

    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div
          class="d-flex flex-column align-items-center justify-content-center"
          style="min-height: 400px"
        >
          <h3 class="display-3 font-weight-bold text-white">Our Blog</h3>
          <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="{{ route('home') }}">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Our Blog</p>
          </div>
        </div>
      </div>
      <!-- Header End -->
  
      <!-- Blog Start -->
      <div class="container-fluid pt-5">
        <div class="container">
          <div class="text-center pb-2">
            <p class="section-title px-5">
              <span class="px-2">Latest Blog</span>
            </p>
            <h1 class="mb-4">Latest Articles From Blog</h1>
          </div>
          <div class="row pb-3">

            @foreach ($blogs as $blog)
            <div class="col-lg-4 mb-4">
              <div class="card border-0 shadow-sm mb-2">
                <img class="card-img-top mb-2" src="{{ $blog->getImage() }}" alt="" />
                <div class="card-body bg-light text-center p-4">
                  <h4 class="">{{ $blog->title }}</h4>
                  <div class="d-flex justify-content-center mb-3">
                    <small class="mr-3"
                      ><i class="fa fa-user text-primary"></i>{{ $blog->user_name }}</small
                    >
                    <small class="mr-3"
                      ><i class="fa fa-folder text-primary"></i> {{ $blog->categories_name }}</small
                    >
                    <small class="mr-3"
                      ><i class="fa fa-comments text-primary"></i> 0</small
                    >
                  </div>
                  <p>
                    {!! strip_tags(Str::substr($blog->description , 0 , 50)) !!}...
                  </p>
                  <a href="{{ route('blog-show' , $blog->slug) }}" class="btn btn-primary px-4 mx-auto my-2"
                    >Read More</a
                  >
                </div>
              </div>
            </div>
            @endforeach
            <div class="col-md-12 mb-4">
              {!! $blogs->appends(Request::except('page'))->links() !!}
            </div>
          </div>
        </div>
      </div>
      <!-- Blog End -->

@endsection