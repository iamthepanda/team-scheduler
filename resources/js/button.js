$(document).ready(function(){
            newClass = '';
            buttonClicked = false;
    
    buttonOver = false;
//    update a button's contents and post to php
    for(i=0;i<(24);i++){
        for(j=0;j<(7);j++){
            currentButton = '.editbtn_row'+i+'_col'+j;
            if($(currentButton).html()== 'Available'){
                $(currentButton).addClass('available');
            }
            else{
                $(currentButton).addClass('not-available');
            }
            
            

            (function(i,j){
//                index all buttons to enable update of appropriate button
                
                    $(currentButton).mousedown(function(){
                    
                        i0 = i;
                        j0 = j;
                    buttonClicked = true;
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
                    
                }).mouseup(function() {
    buttonClicked = false;    // When mouse goes up, set isDown to false
if ($($(this).html()).val() != 0) {
//                        url is relative to the document that loaded the js
//    if(buttonOver===false){
                        $.post("models/db_update.php", {
                            stringDataVariable:$(this).html(),stringRowVariable0:i, stringColVariable0:j,stringRowVariable:(iEnd), stringColVariable:(jEnd)
                        }, function(data) {
                            if (data != "") {
        //                        alert('We sent Jquery string to PHP : ' + data);
//                                location.reload ();
                            }
                        });
//                    }
                    }
  }); //mousedown
            
//                    buttonClicked = true;
                
                $(currentButton).mouseover(function(){
                    buttonOver = true;
                    if(buttonClicked===true)
                {
                    
                    $('.editbtn_row'+i+'_col'+j).html($('.editbtn_row'+i0+'_col'+j0).html() == 'Available' ? 'Available' : '----------');
                    
//                    if(j>j0){
                    
                    i >= i0 ? height=i-i0 : height = i0-i;
                    j >= j0 ? width=j-j0 : width=j0-j;
                    
                    if(i>=i0){
                        for(i=i0;i<=i0+height;i++){
                            if(j>=j0){
                                for(j=j0;j<=j0+width;j++){
                                    $('.editbtn_row' + i + '_col' +(j)).html(
                                        $('.editbtn_row'+i0+'_col'+(j0)).html() == 'Available' ? 'Available' : '----------');
                                if ( $('.editbtn_row'+i0+'_col'+j0).hasClass('available') &&
                                    $('.editbtn_row'+i+'_col'+(j)).hasClass('not-available')){
                                $('.editbtn_row'+i+'_col'+(j)).removeClass('not-available');
                                $('.editbtn_row'+i+'_col'+(j)).addClass('available');
        //                        newClass = 'not-available';
                            }
                            else if ( $('.editbtn_row'+i0+'_col'+j0).hasClass('not-available')  &&
                                    $('.editbtn_row'+i+'_col'+(j)).hasClass('available')){
                                        $('.editbtn_row'+i+'_col'+(j)).removeClass('available');
                                        $('.editbtn_row'+i+'_col'+(j)).addClass('not-available');
                //                        newClass = 'available';
                                    }
                                }
                            }
                            else if(j<j0){
                            for(j=j0;j>j0+width;j--){
                                    $('.editbtn_row' + i + '_col' +(j)).html(
                                        $('.editbtn_row'+i0+'_col'+(j0)).html() == 'Available' ? 'Available' : '----------');
                                if ( $('.editbtn_row'+i0+'_col'+j0).hasClass('available') &&
                                    $('.editbtn_row'+i+'_col'+(j)).hasClass('not-available')){
                                $('.editbtn_row'+i+'_col'+(j)).removeClass('not-available');
                                $('.editbtn_row'+i+'_col'+(j)).addClass('available');
        //                        newClass = 'not-available';
                            }
                            else if ( $('.editbtn_row'+i0+'_col'+j0).hasClass('not-available')  &&
                                    $('.editbtn_row'+i+'_col'+(j)).hasClass('available')){
                                        $('.editbtn_row'+i+'_col'+(j)).removeClass('available');
                                        $('.editbtn_row'+i+'_col'+(j)).addClass('not-available');
                //                        newClass = 'available';
                                    }
                                }
                            }
                        }
                        
                    }
                    else if(i<i0){
                        for(i=i0;i>i0+height;i--){
                            if(j>=j0){
                                for(j=j0;j<=j0+width;j++){
                                    $('.editbtn_row' + i + '_col' +(j)).html(
                                        $('.editbtn_row'+i0+'_col'+(j0)).html() == 'Available' ? 'Available' : '----------');
                                if ( $('.editbtn_row'+i0+'_col'+j0).hasClass('available') &&
                                    $('.editbtn_row'+i+'_col'+(j)).hasClass('not-available')){
                                $('.editbtn_row'+i+'_col'+(j)).removeClass('not-available');
                                $('.editbtn_row'+i+'_col'+(j)).addClass('available');
        //                        newClass = 'not-available';
                            }
                            else if ( $('.editbtn_row'+i0+'_col'+j0).hasClass('not-available')  &&
                                    $('.editbtn_row'+i+'_col'+(j)).hasClass('available')){
                                        $('.editbtn_row'+i+'_col'+(j)).removeClass('available');
                                        $('.editbtn_row'+i+'_col'+(j)).addClass('not-available');
                //                        newClass = 'available';
                                    }
                                }
                            }
                            else if(j<j0){
                            for(j=j0;j>j0+width;j--){
                                    $('.editbtn_row' + i + '_col' +(j)).html(
                                        $('.editbtn_row'+i0+'_col'+(j0)).html() == 'Available' ? 'Available' : '----------');
                                if ( $('.editbtn_row'+i0+'_col'+j0).hasClass('available') &&
                                    $('.editbtn_row'+i+'_col'+(j)).hasClass('not-available')){
                                $('.editbtn_row'+i+'_col'+(j)).removeClass('not-available');
                                $('.editbtn_row'+i+'_col'+(j)).addClass('available');
        //                        newClass = 'not-available';
                            }
                            else if ( $('.editbtn_row'+i0+'_col'+j0).hasClass('not-available')  &&
                                    $('.editbtn_row'+i+'_col'+(j)).hasClass('available')){
                                        $('.editbtn_row'+i+'_col'+(j)).removeClass('available');
                                        $('.editbtn_row'+i+'_col'+(j)).addClass('not-available');
                //                        newClass = 'available';
                                    }
                                }
                            }
                        }
                    }
                        
                        
                        iEnd=i;
                        jEnd=j;
                        
                    
//                    if ($($(this).html()).val() != 0) {
////                        url is relative to the document that loaded the js
//                        $.post("models/db_update.php", {
//                            stringDataVariable:$(this).html(),stringRowVariable0:i0, stringColVariable0:j0,stringRowVariable:(i-1), stringColVariable:(j-1)
//                        }, function(data) {
//                            if (data != "") {
//        //                        alert('We sent Jquery string to PHP : ' + data);
////                                location.reload ();
//                            }
//                        });
//                    }
                    
                        
                        
                }
                }); //mouseover
                
                
                
            })(i,j);
            
            
            
            
        }
    }
    
    
});

