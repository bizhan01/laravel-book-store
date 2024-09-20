@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
      <div class="col-sm-8 push-sm-2">
        <!-- ُSuccess Flash Message -->
          @if($success = session('success'))
          <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            <div>
              <center>
                {{$success}}
                @foreach($sales as $sell)
                  <h6> شماره ثبت: {{$sell->id}} </h6>
                  <div class="col-lg-1">  </div>
                  <p> <a href="editItems/{{ $sell->id }}" class="col-lg-12" style="display: inline-block; padding: 10px 30px; font-size: 14px; color: #fff; background: #5bda19; border-radius: 40px; text-decoration:none; margin-top: 6px"> محاسبه فاکتور</a></p>
                  <br></br>
                @endforeach
              <center>
          </div>
        </div>
      @endif

        <div class="card price-card">
          <div class="card-header price-card-header bg-primary text-xs-center">
            <h6 class="text-uppercase">کتاب فروشی البیرونی</h6>
            <h6 class="text-uppercase">مدیریت فروشات و محاسبه</h6>
            <h6 class="text-uppercase">ثبت محصولات</h6>
          </div>
          <div class="price-card-list" style="padding: 40px">
            <form method="POST" action="{{route('saveSell')}}" >
              {{ csrf_field() }}
                <div class="field_wrapper">
                    <div>
                      @foreach($sell_id as $sell_id)
                         <input type="hidden" name="user_id[]" value="{{Auth::user()->id}}">
                         <input type="hidden" name="sell_id[]" value="{{$sell_id->id}}">
                      @endforeach
                      <div class="row form-group">
                          <div class="col-md-6">
                            <label for="">اسم محصول</label>
                            <select class="form-control col-lg-5" name="product_id[]" required id='selUser'>
                              <option value=""></option>
                              @foreach($books as $book)
                                <option value="{{$book->id}}" >{{$book->book_name}}  &nbsp &nbsp &nbsp{{$book->price}} افغانی</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-md-5">
                          <label for="">تعداد</label>
                          <input type="text"  name="product_qty[]" class="form-control txt" value="" required/>
                        </div>
                        <div class="col-md-1">
                          <label for="">افزودن</label>
                          <a href="javascript:void(0);" class="add_button fa fa-plus-circle" title="Add field" style="font-size: 25px; margin-top: 5px"></a>
                        </div>
                      </div>
                    </div>
                </div>
             </div>
              <input type="submit" name="submit" value="بعدی" class="btn btn-primary btn-block btn-lg">
            </form>
         </div>
     </div>
   </div>
</div>


<!-- Script -->
 <script type="text/javascript" src="{{ asset('../jquery-3.2.1.min.js') }}"></script>
 <script>
 $(document).ready(function(){

		 // Initialize select2
		 $("#selUser").select2();

		 // Read selected option
		 $('#but_read').click(function(){
				 var username = $('#selUser option:selected').text();
				 var userid = $('#selUser').val();

				 $('#result').html("id : " + userid + ", name : " + username);
		 });
 });
 </script>



<script type="text/javascript" src="{{ asset('../vendors/jquery/jquery-1.12.3.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div>  <input type="hidden" name="user_id[]" value="{{Auth::user()->id}}"><input type="hidden" name="sell_id[]" value="{{$sell_id->id}}">  <select class=" " name="product_id[]" required id="selUser" style="width: 50%; height: 40px"> <option value=""></option> @foreach($books as $book) <option value="{{$book->id}}">{{$book->book_name}}  &nbsp &nbsp &nbsp{{$book->price}} افغانی</option>   @endforeach </select>     <input type="text" name="product_qty[]" class="txt" required style="width: 41%; height: 40px"/>  &nbsp &nbsp  <a href="javascript:void(0);" class="remove_button fa fa-minus-circle" style="font-size: 25px; margin-top: 5px"></a> </div> </div>'; //New input field html
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });



});
</script>


@endsection
