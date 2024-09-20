<div class="content-area py-1" >
    <div class="box box-block bg-white mb-0" >
      <h3>لیست کتاب های پرفروش</h3><hr>
      <div class="owl-carousel" style="text-align: right">
         @foreach($books as $user)
         <a href="details/{{ $user->id }}"><div class="item"><img src="UploadedImages/books/{{$user->image}}" height="150px">
           <span >{{$user->book_name}}</span>
         </div></a>
         @endforeach
      </div>
    </div>
</div>
