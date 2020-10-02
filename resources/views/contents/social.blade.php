@extends('welcome')

@section('content1')
<div class="container">
  <div class="row">
      <div class="col-sm-8">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#">Social</a>
          </li>
        </ul>
        <div class="row">
        @foreach ($socials as $item)
          <div class="col-md-6">
              <a style="text-decoration:none" href="{{url('view/article/detail/'.$item->id)}}">
              <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <img src="{{asset($item->articlePhotoFisrt[0]->path)}}" class="img-fluid image-resolution" alt="Responsive image">
                      </div>
                      <div class="col-md-12">
                          <h5 class="card-title">{{ $item->title}}</h5>
                          <hr>
                          <p><span class="fa fa-calendar"></span></span> {{$item->published_at}}</p>
                          <p class="card-text">{{ \Illuminate\Support\Str::limit($item->description, 80) }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
        </div>
        @endforeach
        </div>
      </div>
      <div class="col-sm-4">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#">Download</a>
          </li>
        </ul>
          <!-- Data second column  -->
      </div>
  </div>
<br>
<div class="text-center">
 <span class="">{{ $socials->links() }}</span>
</div>
</div>
@endsection
