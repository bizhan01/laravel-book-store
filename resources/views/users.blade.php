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
                @include('search.generalSearch')
            </div>
            <div class="tab-pane" id="tab-2" role="tabpanel">
              @include('search.generalSearch')
            </div>
          </div>
        </div>
        @include('book.PopularBook')

        @include('book.latestBook')

        @include('book.recommendedBooks');

      </div>
      <div class="col-md-4">
        @include('advertisement.advertisements');
      </div>
    </div>
  </div>
</div>
@endsection
