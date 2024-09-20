$(document).ready(function() {

	// delete.
	$(document).on('click','.delete',function(e){
		e.preventDefault();
		var msg = $(this).data('msg');
		var url = $(this).data('url');
		var conf = confirm(msg);
		if (conf == true) {
			window.location.href = '/' + url;
		}
	});


	// choose | select deal type
	$("#deal_select").change(function() {
		if ($("#discount").is(":selected")) { 
			$("#deal_type_desc").show();
			$("#deal_type_desc").find('label').html("فیصدی تخفیف را وارد کنید");
		} else if ($("#activity").is(":selected")) { 
			$("#deal_type_desc").show();
			$("#deal_type_desc").find('label').html("نوعیت معامله را مشخص کنید");
		} else if ($("#other").is(":selected")) { 
			$("#deal_type_desc").show();
			$("#deal_type_desc").find('label').html("کلمه کلیدی برای اجرای معامله ");
		} else {
			$("#deal_type_desc").hide();
		}
	});

	// add | sum tow number and show in text field.
	$(".txt").on("keydown keyup", function() {
		calculateSum();
	});
    function calculateSum() {
		var sum = 0;
		$(".txt").each(function() {
			if (!isNaN(this.value) && this.value.length != 0) {
				sum += parseInt(this.value);
				$(this).css("border-color", "#d9d9d9");
			}
			else if (this.value.length != 0){
				$(this).css("border-color", "red");
			} else {
				$(this).css("border-color", "#d9d9d9");
			}
		});
		// $("input#total").val(sum.toFixed(2));
		$("input#total").val(sum);
	}


	// this function is for searching in all tables
	$(document).ready(function(){
		$("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});

});
