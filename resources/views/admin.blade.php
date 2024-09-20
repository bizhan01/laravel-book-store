@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="row row-md mb-1">
      <div class="col-md-12">
        <div style="margin-bottom: -50px">
          <ul class="  nav nav-tabs" role="tablist" style="background-color: #d9dee6; padding: 5px">
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab-1" role="tab">ثبت آگاهی</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab">جستجو</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab-4" role="tab"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab-4" role="tab"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab-4" role="tab"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab-4" role="tab"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab-4" role="tab"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab-4" role="tab"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab-4" role="tab"></a>
            </li>
          </ul>
          <div class="tab-content ">
            <div class="tab-pane active" id="tab-1" role="tabpanel">
              @include('advertisement.addAdv');
            </div>
            <div class="tab-pane" id="tab-2" role="tabpanel">
              @include('search.generalSearch');
            </div>
          </div>
        </div>
        @include('PopularBook.PopularBook');
      </div>
    </div>
  </div>
</div>
@endsection
