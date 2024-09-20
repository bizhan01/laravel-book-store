<div class="sidebar-activity animated fadeIn ">
 <form class="card write-something" method="post" action="{{ route('addAdvertisement') }}" enctype="multipart/form-data" style="margin-top: -35px">
     {{ csrf_field() }}
   <input type="file"  name="image" id="input-file-now" class="dropify" required/>
   <div class="card-footer">
     <div class="clearfix">
       <div class="float-xs-right">
         <button type="submit" class="btn btn-rounded bg-flickr">پست</button>
       </div>
     </div>
   </div>
 <!-- </form> -->
 </div>
 <!-- ُSuccess Flash Message -->
   @if($success = session('success'))
   <div class="alert alert-success alert-dismissible fade in" role="alert">
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
       </button>
       <div>{{$success}}</div>
   </div>
   @endif
