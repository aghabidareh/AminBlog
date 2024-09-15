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
                <p class="mr-3"><i class="fa fa-comments text-primary"></i> {{ $blog->getCommentsCount() }}</p>
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
              <h2 class="mb-4">{{ $blog->getComment->count() }} Comments</h2>
              @foreach ($blog->getComment as $comment)
              <img
              src="{{ asset('home/img/user.jpg') }}"
              alt="Image"
              class="img-fluid rounded-circle mr-3 mt-1"
              style="width: 45px"
            />
            <div class="media-body">
              <h6>
                {{ $comment->user->name }} <small><i>{{ date('d , M , Y' , strtotime($comment->created_at)) }}</i></small>
              </h6>
              <p>
                {{ $comment->comment }}
              </p>
              <button class="btn btn-sm btn-light ReplayOpen" id="{{ $comment->id }}">Reply</button>


              @foreach ($comment->getReplay as $replay)
              <div class="media mt-4">
                <img
                  src="{{ asset('home/img/user.jpg') }}"
                  alt="Image"
                  class="img-fluid rounded-circle mr-3 mt-1"
                  style="width: 45px"
                />
                <div class="media-body">
                  <h6>
                    {{ $replay->user->name }} <small><i>{{ date('d , M , Y' , strtotime($replay->created_at)) }}</i></small>
                  </h6>
                  <p>
                    {{ $replay->comment }}
                  </p>
                  <button class="btn btn-sm btn-light">Reply</button>
                </div>
              </div>
              @endforeach

                @include('layouts.messages')
              <div class="bg-light p-3 ShowReplay{{ $comment->id }}" style="display: none;">
                <h2 class="mb-4">Replay a comment</h2>
                <form action="{{ route('storeReplayComment') }}" method="POST">
                  @csrf
                  <div class="form-group">
                    <input type="hidden" style="display:block;" name="comment_id" value="{{ $comment->id }}">
                    <label for="message">Replay:</label>
                    <textarea name="comment" id="message" cols="30" rows="5" required class="form-control" ></textarea>
                  </div>
                  <div class="form-group mb-0">
                    <input type="submit" value="Leave Replay" class="btn btn-primary px-3" />
                  </div>
                </form>
              </div>
            </div>
          </div>
              @endforeach
  
            <!-- Comment Form -->
            @include('layouts.messages')
            <div class="bg-light p-5">
              <h2 class="mb-4">Leave a comment</h2>
              <form action="{{ route('storeComment') }}" method="POST">
                @csrf
                <div class="form-group">
                  <input type="hidden" style="display:block;" name="blog_id" value="{{ $blog->id }}">
                  <label for="message">Comment:</label>
                  <textarea name="comment" id="message" cols="30" rows="5" required class="form-control" ></textarea>
                </div>
                <div class="form-group mb-0">
                  <input type="submit" value="Leave Comment" class="btn btn-primary px-3" />
                </div>
              </form>
            </div>
          </div>
  
          <div class="col-lg-4 mt-5 mt-lg-0">
            <!-- Search Form -->
            <div class="mb-5">
              <form action="">
                <div class="input-group">
                  <input
                    type="text"
                    class="form-control form-control-lg"
                    placeholder="Keyword"
                  />
                  <div class="input-group-append">
                    <span class="input-group-text bg-transparent text-primary"
                      ><i class="fa fa-search"></i
                    ></span>
                  </div>
                </div>
              </form>
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
                      ><i class="fa fa-comments text-primary"></i> {{ $recent->getCommentsCount() }}</small
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

@section('scripts')
      <script type="text/javascript">
        $('.ReplayOpen').click(function(){
          var id = $(this).attr('id');
          $('ShowReplay'+id).toggle();
        })
      </script>
@endsection