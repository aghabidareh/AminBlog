@extends('layouts.app')

@section('content')
      <!-- Detail Start -->
      <div class="container py-5">
        <div class="row pt-5">
          <div class="col-lg-8">
            <div class="d-flex flex-column text-left mb-3">
              <h1 class="mb-3">{{ $blog->title }}</h1>
              <div class="d-flex">
                <p class="mr-3"><i class="fa fa-user text-primary"></i> {{ $blog->user_name }}</p>
                <p class="mr-3">
                  <i class="fa fa-folder text-primary"></i> {{ $blog->categories_name }}
                </p>
                <p class="mr-3"><i class="fa fa-comments text-primary"></i> 0</p>
              </div>
            </div>
            <div class="mb-5">
              <img style="width: 100px;height:100px;object-fit: cover;"
                class="img-fluid rounded w-100 mb-4"
                src="{{ $blog->getImage() }}"
                alt="Image"
              />

              {!! $blog->description !!}

            </div>

            <!-- Related Post -->
            <div class="mb-5 mx-n3">
              <h2 class="mb-4 ml-3">Related Post</h2>
              <div class="owl-carousel post-carousel position-relative">
                @foreach($relatedPosts as $relatedPost)
                <div class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mx-3">
                  <img class="img-fluid" src="{{ $relatedPost->getImage() }}" style="width: 80px; height: 80px"/>
                  <div class="pl-3">
                    <a href="{{ route('blog-show' , $relatedPost->slug) }}">
                        <h5 class="">{{ $relatedPost->title }}</h5>
                    </a>
                    <div class="d-flex">
                      <small class="mr-3"
                        ><i class="fa fa-user text-primary"></i> {{ $relatedPost->user_name }}</small>
                      <small class="mr-3"><i class="fa fa-folder text-primary"></i> {{ $relatedPost->categories_name }}</small>
                      <small class="mr-3"><i class="fa fa-comments text-primary"></i> 0</small>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
  
            <!-- Comment List -->
            <div class="mb-5">
              <h2 class="mb-4">3 Comments</h2>
              <div class="media mb-4">
                <img
                  src="{{ asset('home/img/user.jpg') }}"
                  alt="Image"
                  class="img-fluid rounded-circle mr-3 mt-1"
                  style="width: 45px"
                />
                <div class="media-body">
                  <h6>
                    John Doe <small><i>01 Jan 2045 at 12:00pm</i></small>
                  </h6>
                  <p>
                    Diam amet duo labore stet elitr ea clita ipsum, tempor labore
                    accusam ipsum et no at. Kasd diam tempor rebum magna dolores
                    sed sed eirmod ipsum. Gubergren clita aliquyam consetetur
                    sadipscing, at tempor amet ipsum diam tempor consetetur at
                    sit.
                  </p>
                  <button class="btn btn-sm btn-light">Reply</button>
                </div>
              </div>
              <div class="media mb-4">
                <img
                  src="{{ asset('home/img/user.jpg') }}"
                  alt="Image"
                  class="img-fluid rounded-circle mr-3 mt-1"
                  style="width: 45px"
                />
                <div class="media-body">
                  <h6>
                    John Doe <small><i>01 Jan 2045 at 12:00pm</i></small>
                  </h6>
                  <p>
                    Diam amet duo labore stet elitr ea clita ipsum, tempor labore
                    accusam ipsum et no at. Kasd diam tempor rebum magna dolores
                    sed sed eirmod ipsum. Gubergren clita aliquyam consetetur
                    sadipscing, at tempor amet ipsum diam tempor consetetur at
                    sit.
                  </p>
                  <button class="btn btn-sm btn-light">Reply</button>
                  <div class="media mt-4">
                    <img
                      src="{{ asset('home/img/user.jpg') }}"
                      alt="Image"
                      class="img-fluid rounded-circle mr-3 mt-1"
                      style="width: 45px"
                    />
                    <div class="media-body">
                      <h6>
                        John Doe <small><i>01 Jan 2045 at 12:00pm</i></small>
                      </h6>
                      <p>
                        Diam amet duo labore stet elitr ea clita ipsum, tempor
                        labore accusam ipsum et no at. Kasd diam tempor rebum
                        magna dolores sed sed eirmod ipsum. Gubergren clita
                        aliquyam consetetur, at tempor amet ipsum diam tempor at
                        sit.
                      </p>
                      <button class="btn btn-sm btn-light">Reply</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  
            <!-- Comment Form -->
            <div class="bg-light p-5">
              <h2 class="mb-4">Leave a comment</h2>
              <form>
                <div class="form-group">
                  <label for="name">Name *</label>
                  <input type="text" class="form-control" id="name" />
                </div>
                <div class="form-group">
                  <label for="email">Email *</label>
                  <input type="email" class="form-control" id="email" />
                </div>
                <div class="form-group">
                  <label for="website">Website</label>
                  <input type="url" class="form-control" id="website" />
                </div>
  
                <div class="form-group">
                  <label for="message">Message *</label>
                  <textarea
                    id="message"
                    cols="30"
                    rows="5"
                    class="form-control"
                  ></textarea>
                </div>
                <div class="form-group mb-0">
                  <input
                    type="submit"
                    value="Leave Comment"
                    class="btn btn-primary px-3"
                  />
                </div>
              </form>
            </div>
          </div>
  
          <div class="col-lg-4 mt-5 mt-lg-0">
            <!-- Search Form -->
            <div class="mb-5">
              <form action="{{ route('blog') }}" method="GET">
                <div class="input-group">
                  <input required name="search" type="text" class="form-control form-control-lg" placeholder="Keyword"/>
                  <div class="input-group-append">
                    <button class="input-group-text bg-transparent text-primary"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </form>
            </div>
  
            <!-- Category List -->
            <div class="mb-5">
              <h2 class="mb-4">Categories</h2>
              <ul class="list-group list-group-flush">
                @foreach ($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                    <a href="">{{ $category->name }}</a>
                    <span class="badge badge-primary badge-pill">{{ $category->totalBlogs() }}</span>
                  </li>
                @endforeach

              </ul>
            </div>
            <!-- Recent Post -->
            <div class="mb-5">
              <h2 class="mb-4">Recent Post</h2>
              
              @foreach($recents as $recent)
              <div class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mb-3">
                <img class="img-fluid" src="{{ $recent->getImage() }}" style="width: 80px; height: 80px" \/>
                <div class="pl-3">
                  <a href="{{ route('blog-show' , $recent->slug) }}">
                    <h5 class="text-warning">{{ $recent->title }}</h5>
                  </a>
                  <div class="d-flex">
                    <small class="mr-3"
                      ><i class="fa fa-user text-primary"></i> {{ $recent->user_name }}</small
                    >
                    <small class="mr-3"
                      ><i class="fa fa-folder text-primary"></i> {{ $recent->categories_name }}</small
                    >
                    <small class="mr-3"
                      ><i class="fa fa-comments text-primary"></i> 0</small
                    >
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <!-- Detail End -->

@endsection