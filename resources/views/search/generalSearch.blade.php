<div class="box box-block bg-white" style="margin-top: -35px">
    <form method="POST" action="{{ route('search') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="input-group">
      <input type="text" name="q" value=""  class="form-control "  placeholder="جستجوی عمومی..." required >
      <span class="input-group-btn">
        <button type="submit" id="check-minutes" class="btn btn-rounded btn-success">جستجو</button>
      </span>
    </div>
    @include('layouts.errors')
  </form>
</div>
