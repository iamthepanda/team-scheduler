$(document).ready(function(){
            newClass = '';
//    update a button's contents and post to php
    for(i=0;i<(24);i++){
        for(j=0;j<(7);j++){
                
            if($('.editbtn_row'+i+'_col'+j).html()== 'Available'){
                $('.editbtn_row'+i+'_col'+j).addClass('available');
            }
            else{
                $('.editbtn_row'+i+'_col'+j).addClass('not-available');
            }


            (function(i,j){
//                index all buttons to enable update of appropriate button
                $('.editbtn_row'+i+'_col'+j).click(function(){
//                    toggle button's data
                    $(this).html($(this).html() == 'Available' ? '----------' : 'Available');
                    
                    if ( $(this).hasClass('available') ){
                        $(this).removeClass('available');
                        $(this).addClass('not-available');
                        newClass = 'not-available';
                    }
                    else if ( $(this).hasClass('not-available') ){
                        $(this).removeClass('not-available');
                        $(this).addClass('available');
                        newClass = 'available';
                    }
                    
                    if ($($(this).html()).val() != 0) {
//                        url is relative to the document that loaded the js
                        $.post("models/db_update.php", {
                            stringDataVariable:$(this).html(), stringRowVariable:i, stringColVariable:j, stringClassVariable:newClass
                        }, function(data) {
                            if (data != "") {
        //                        alert('We sent Jquery string to PHP : ' + data);
//                                location.reload ();
                            }
                        });
                    }
                });
            })(i,j);
        }
    }
});