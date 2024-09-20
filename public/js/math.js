$("document").ready(function(){
$("#sn").change(function(){

   var f=$("#fn").val();
   var s=$("#sn").val();

   var add = parseInt(f) + parseInt(s);
   $("#add").val(add);
   var sub=f-s;
   $("#sub").val(sub);
   var mul=f*s;
   $("#mul").val(mul);
   var div=f/s;
   $("#div").val(div);

});
});
