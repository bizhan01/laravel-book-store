
$(document).ready(function() {
    $(".txt").on("keydown keyup", function() {
        calculateSum();
    });
});

function calculateSum() {
var sum = 0;
$(".txt").each(function() {
    if (!isNaN(this.value) && this.value.length != 0) {
        sum += parseFloat(this.value);
        $(this).css("border-color", "#d9d9d9");

    }
    else if (this.value.length != 0){
        $(this).css("border-color", "red");
    }
});

$("input#total").val(sum.toFixed(2));
}
