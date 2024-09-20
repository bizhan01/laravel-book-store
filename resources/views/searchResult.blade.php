@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="row row-md mb-1">
      <div class="col-md-8">
        <div style="margin-bottom: -50px">
          <div class="tab-content ">
            <div class="tab-pane active" id="tab-1" role="tabpanel">
              @include('search.generalSearch');
            </div>
          </div>
        </div>

        <div class="box box-block bg-white">
          <div class="box bg-white post post-1">
              <!-- Show Result -->
               <section class="colorlib-skills" data-section="companies" >
                @if(isset($details))
                 <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                     <thead>
                       <tr>
                         <th>تصویر</th>
                         <th>اسم</th>
                         <th>نویسنده</th>
                         <th>کتگوری</th>
                         <th>نسخه</th>
                       </tr>
                     </thead>
                     <tbody>
                       @foreach($details as $book)
                       <tr>
                         <td><a href="details/{{ $book->id }}"><img src="/UploadedImages/books/{{$book->image}}" height="40px" width="40px" /></a></td>
                         <td><a href="details/{{ $book->id }}">{{$book->book_name}}</a></td>
                         <td>{{$book->author}}</td>
                         <td>{{$book->category}}</td>
                         <td>{{$book->edition}}</td>
                       </tr>
                       @endforeach
                     </tbody>
                 </table>
               @endif
             </section>
            <!-- End -->
          </div>
        </div>
      </div>
      <div class="col-md-4">
        @include('advertisement.advertisements');
      </div>
    </div>
  </div>
</div>
@endsection
