<div class="row">
  @foreach($books as $book)
  <div class="col-md-3">
    <div class="project img ftco-animate d-flex justify-content-center align-items-end" style="background-image: url(uploadedImages/books/{{$book->image}});">
      <div class="overlay"></div>
      <div class="text p-4" style="text-align: right">
        <h3><a href="details/{{ $book->id }}">{{$book->book_name}}</a></h3>
        <span style="font-size: 15px">{{$book->author}}</span>
        <span style="font-size: 15px;">
          @if( $book->type == 1)
             <button type="button" class="btn btn-success btn-sm float-left">جدید</button>
           @else
             <button type="button" class="btn btn-warning btn-sm float-left">مستعمل</button>
           @endif
        </span>
      </div>
    </div>
  </div>
  @endforeach
</div>
