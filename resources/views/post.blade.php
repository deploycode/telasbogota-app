@extends('layouts.main')
@section('section')
  <div class="row"><h1 id="title" class="text-center teme-blog">{{$post->name}}</h1></div>
  <article id="post">
    <div class="row">
      <div class="col-xs-12">
        <hr>
          {!!$post->content!!}
        <hr>
          <label for="">Tags:</label>
          @foreach($post->tags as $tag)
            <a href="#">{{$tag->name}}</a>
          @endforeach
        <hr>
          <div id="disqus_thread"></div>
          <script>
            (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = '//deploycode.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
            })();
          </script>
          <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        <hr>
      </div>
    </div>
  </article>
@endsection
