<!-- Content -->
<div class="card">
  <div class="card-header text-uppercase"><b>لیست کتاب های پشنهاد شده</b></div>
    <div class="card-block">
      <div class="row row-sm">
        @foreach($books as $book)
          <div class="col-md-6">
            <div class="box box-block bg-white">
              <div class="row">
                <div class="col-md-4 col-sm-4 text-center">
                  <img class="img-fluid " src="uploadedImages/books/{{$book->image}}" alt="">
                </div>
                <div class="col-md-8 col-sm-8">
                  <h5>{{$book->book_name}}</h5>
                    @if( $book->type == 1)
                       <span class="tag tag-success">جدید</span>
                     @else
                       <span class="tag tag-warning">مستعمل</span>
                     @endif
                  <p>
                  <address>
                    نویسند: {{$book->author}}<br>
                    کتگوری: {{$book->category}}<br>
                  </address>
                  </p>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
</div>
