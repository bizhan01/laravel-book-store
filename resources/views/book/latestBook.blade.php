<div class="card">
  <div class="card-header text-uppercase"><b>لیست جدیدترین کتاب ها</b></div>
  <div class="card-block">
    <div class="gallery">
      <div class="row row-sm">
        @foreach($latestBooks as $latestBook)
          <div class="col-xs-4">
            <a href="details/{{ $latestBook->id }}">
              <div class="g-icon"><i class="ti-search"></i></div>
              <img class="img-fluid" src="UploadedImages/books/{{$latestBook->image}}" alt="">
            </a>
          </div>
       @endforeach
      </div>
    </div>
    <div class="text-xs-center">
      <a href="{{ route('newBooks') }}"><button type="submit" class="btn btn-outline-primary btn-rounded">دیدن همه</button></a>
    </div>
  </div>
</div>
