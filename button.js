$(document).ready(function(){
    for(i=0;i<(24);i++){
        for(j=0;j<(7);j++){
            (function(i,j){
                $('.editbtn_row'+i+'_col'+j).click(function(){
                $(this).html($(this).html() == 'Available' ? '------------' : 'Available');

                if ($($(this).html()).val() != 0) {
                    var temp_row=i;
                    var temp_col=j;
                    $.post("yourphp.php", {
                        stringDataVariable:$(this).html(), stringRowVariable:temp_row, stringColVariable:temp_col
                }, function(data) {
                    if (data != "") {
//                        alert('We sent Jquery string to PHP : ' + data);
                location.reload ();
                    }
                });
//                        break;
                }
            });})(i,j);
        }
    }
});