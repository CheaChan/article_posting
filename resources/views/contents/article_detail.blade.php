@extends('welcome')

@section('content1')
<section class="container">
 <div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
   <h2>{{$get_article_detail->title}}</h2><br>
   <!-- change  -->
     <div class="row">  
      <!-- <div class="col-md-2"></div> -->
       <div class="col-md-12" style="margin-left: 685px;">
         {{--  {{ url()->current() }}  --}}
         <div class="btn-group">
           <div class="text-nowrap">
             <div id="fb-root"></div>
             <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0&appId=2488896414478775&autoLogAppEvents=1" nonce="TtHGXdEv"></script>
             <div class="fb-share-button"  style="margin-bottom: 20px;" data-href="https://laravel.com/" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div><br>
             <script async src="https://telegram.org/js/telegram-widget.js?11" data-telegram-share-url="https://laravel.com/" data-size="large"></script>  
           </div>
         </div>
       </div>
       <!-- <div class="col-md-2"></div> -->
     </div>
<!-- change -->
   <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset($get_article_detail->articlePhoto[0]->path)}}" style="height: 500px;" class="d-block w-100" alt="...">
      </div>
      {{-- @foreach ($get_article_detail->articlePhoto[0]->path as $item2)
      <div class="carousel-item">
        <img src="{{asset($item2->path)}}" style="height: 500px;" class="d-block w-100" alt="...">
      </div>
      @endforeach --}}
    </div>
    {{-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a> --}}
   </div>
  </div>
  <div class="col-md-2"></div>
 </div>
 <!-- <div class="row">
  <div class="col-md-2"></div>
   <div class="col-md-8">
     {{--  {{ url()->current() }}  --}}
     <div class="btn-group">
       <div class="text-nowrap">
         <div id="fb-root"></div>
         <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0&appId=2488896414478775&autoLogAppEvents=1" nonce="TtHGXdEv"></script>
         <div class="fb-share-button"  style="margin-bottom: 20px;" data-href="https://laravel.com/" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div><br>
         <script async src="https://telegram.org/js/telegram-widget.js?11" data-telegram-share-url="https://laravel.com/" data-size="large"></script>
       </div>
     </div>
   </div>
   <div class="col-md-2"></div>
 </div> -->
 <div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
   <p>{!!$get_article_detail->content!!}</p>
  </div>
  <div class="col-md-2"></div>
 </div>
 <div class="row">
   <div class="col-md-2"></div>
   <div class="col-md-8">
    <iframe width="100%" height="415" src="{{ $get_article_detail->video_link }}" frameborder="0"></iframe>
   </div>
   <div class="col-md-2"></div>
 </div>
</section>
<div class="card-footer text-muted">
 <p class="text-center">Article Created At {{$get_article_detail->created_at}}</p>
</div>
@endsection
