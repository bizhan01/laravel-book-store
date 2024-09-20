<div style="margin-top: -50px">
  <ul class="  nav nav-tabs" role="tablist" style="background-color: #d9dee6; padding: 5px">
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#tab-1" role="tab">جستجوی عمومی</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab">جستجوی کتاب های جدید</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab">جستجوی کتاب های مستعمل</a>
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
  <div class="tab-content" style="margin-top: 2px">
    <div class="tab-pane active" id="tab-1" role="tabpanel">
      <div class="box box-block bg-white">
          <form method="POST" action="{{ route('publicSearch') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="input-group">
            <input type="text" name="q" value=""  class="form-control "  placeholder="جستجوی عمومی..." required >
            <span class="input-group-addon">
              <input type="submit"  value="جستجو" class="btn btn-primary py-3 px-4" style="border-radius: 0px">
            </span>
          </div>
          @include('layouts.errors')
        </form>
      </div>
    </div>
    <div class="tab-pane" id="tab-2" role="tabpanel">
      <div class="box box-block bg-white">
          <form method="POST" action="{{ route('search') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="input-group">
            <input type="text" name="q" value=""  class="form-control "  placeholder="جستجوی کتاب های جدید..." required >
            <span class="input-group-addon">
              <input type="submit"  value="جستجو" class="btn btn-primary py-3 px-4" style="border-radius: 0px">
            </span>
          </div>
          @include('layouts.errors')
        </form>
      </div>
    </div>
    <div class="tab-pane" id="tab-3" role="tabpanel">
      <div class="box box-block bg-white">
          <form method="POST" action="{{ route('search') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="input-group">
            <input type="text" name="q" value=""  class="form-control "  placeholder="جستجوی کتاب های مستعمل..." required >
            <span class="input-group-addon">
              <input type="submit"  value="جستجو" class="btn btn-primary py-3 px-4" style="border-radius: 0px">
            </span>
          </div>
          @include('layouts.errors')
        </form>
      </div>
    </div>
  </div>
</div>
