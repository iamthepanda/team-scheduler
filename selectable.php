<html>
    <head>
        
<style >
html, body {
  height: 100%;
  margin:0px;
}

.ghost-select {
  display: none;
  z-index: 9000;
  position: absolute !important;
  cursor: default !important;
}

h3 {
  position: absolute;
  color: #ffffff;
  border-bottom: 1px solid #fff;
  left: 20px;
}

.elements {
  position: absolute;
}

#square {
  width: 80px;
  height: 80px;
  background-color: #fec72c;
  left: 421px;
  top: 122px;
}

#ball {
  width: 80px;
  height: 80px;
  border-radius: 100%;
  background-color: #aaff8a;
  left: 250px;
  top: 122px;
}

#score {
  position: absolute;
  top: 0px;
  left: 200px;
  color: #ffffff;
}

#big-ghost{
  background-color:rgba(239, 28, 190, 0.6);
  border:1px solid #aaf81a;
  position:absolute;
}

.ghost-select > div {
  position: absolute;
  left: 0px !important;
  top: 2px !important;
}

.ghost-active {
  display: block !important;
}

.ghost-select > span {
  background-color: rgba(239, 28, 190, 0.6);
  border: 1px solid #b20e8c;
  width: 100%;
  height: 100%;
  float: left;
}

#grid {
  width: 100%;
  height: 100%;
  position: absolute;
}

html {
  background-image: linear-gradient(to bottom, #5588cc 0%, #3162a3 100%);
}

body {
  background-image: linear-gradient(0deg, transparent 0%, transparent 9px, rgba(255, 255, 255, 0.2) 9px, rgba(255, 255, 255, 0.2) 10px, transparent 10px, transparent 19px, rgba(255, 255, 255, 0.1) 19px, rgba(255, 255, 255, 0.1) 20px, transparent 20px, transparent 29px, rgba(255, 255, 255, 0.1) 29px, rgba(255, 255, 255, 0.1) 30px, transparent 30px, transparent 39px, rgba(255, 255, 255, 0.1) 39px, rgba(255, 255, 255, 0.1) 40px, transparent 40px, transparent 49px, rgba(255, 255, 255, 0.1) 49px, rgba(255, 255, 255, 0.1) 50px), linear-gradient(-90deg, transparent 0%, transparent 9px, rgba(255, 255, 255, 0.2) 9px, rgba(255, 255, 255, 0.2) 10px, transparent 10px, transparent 19px, rgba(255, 255, 255, 0.1) 19px, rgba(255, 255, 255, 0.1) 20px, transparent 20px, transparent 29px, rgba(255, 255, 255, 0.1) 29px, rgba(255, 255, 255, 0.1) 30px, transparent 30px, transparent 39px, rgba(255, 255, 255, 0.1) 39px, rgba(255, 255, 255, 0.1) 40px, transparent 40px, transparent 49px, rgba(255, 255, 255, 0.1) 49px, rgba(255, 255, 255, 0.1) 50px);
  background-size: 50px 50px;
}

</style>
        
        

<script>
    $(document).ready(function(){
  
  $("#grid").mousedown(function (e) {
       
        $("#big-ghost").remove();
        $(".ghost-select").addClass("ghost-active");
        $(".ghost-select").css({
            'left': e.pageX,
            'top': e.pageY
        });

        initialW = e.pageX;
        initialH = e.pageY;

        $(document).bind("mouseup", selectElements);
        $(document).bind("mousemove", openSelector);

    });
  
  
});

function selectElements(e) {
    $("#score>span").text('0');
    $(document).unbind("mousemove", openSelector);
    $(document).unbind("mouseup", selectElements);
    var maxX = 0;
    var minX = 5000;
    var maxY = 0;
    var minY = 5000;
    var totalElements = 0;
    var elementArr = new Array();
    $(".elements").each(function () {
        var aElem = $(".ghost-select");
        var bElem = $(this);
        var result = doObjectsCollide(aElem, bElem);

        console.log(result);
        if (result == true) {
          $("#score>span").text( Number($("#score>span").text())+1 );
          var aElemPos = bElem.offset();
                var bElemPos = bElem.offset();
                var aW = bElem.width();
                var aH = bElem.height();
                var bW = bElem.width();
                var bH = bElem.height();

                var coords = checkMaxMinPos(aElemPos, bElemPos, aW, aH, bW, bH, maxX, minX, maxY, minY);
                maxX = coords.maxX;
                minX = coords.minX;
                maxY = coords.maxY;
                minY = coords.minY;
                var parent = bElem.parent();

                //console.log(aElem, bElem,maxX, minX, maxY,minY);
                if (bElem.css("left") === "auto" && bElem.css("top") === "auto") {
                    bElem.css({
                        'left': parent.css('left'),
                        'top': parent.css('top')
                    });
                }
          $("body").append("<div id='big-ghost' class='big-ghost' x='" + Number(minX - 20) + "' y='" + Number(minY - 10) + "'></div>");

            $("#big-ghost").css({
                'width': maxX + 40 - minX,
                'height': maxY + 20 - minY,
                'top': minY - 10,
                'left': minX - 20
            });
          
          
        }
    });
    
    $(".ghost-select").removeClass("ghost-active");
    $(".ghost-select").width(0).height(0);

    ////////////////////////////////////////////////

}

function openSelector(e) {
    var w = Math.abs(initialW - e.pageX);
    var h = Math.abs(initialH - e.pageY);

    $(".ghost-select").css({
        'width': w,
        'height': h
    });
    if (e.pageX <= initialW && e.pageY >= initialH) {
        $(".ghost-select").css({
            'left': e.pageX
        });
    } else if (e.pageY <= initialH && e.pageX >= initialW) {
        $(".ghost-select").css({
            'top': e.pageY
        });
    } else if (e.pageY < initialH && e.pageX < initialW) {
        $(".ghost-select").css({
            'left': e.pageX,
            "top": e.pageY
        });
    }
}
  
  
function doObjectsCollide(a, b) { // a and b are your objects
    //console.log(a.offset().top,a.position().top, b.position().top, a.width(),a.height(), b.width(),b.height());
    var aTop = a.offset().top;
    var aLeft = a.offset().left;
    var bTop = b.offset().top;
    var bLeft = b.offset().left;

    return !(
        ((aTop + a.height()) < (bTop)) ||
        (aTop > (bTop + b.height())) ||
        ((aLeft + a.width()) < bLeft) ||
        (aLeft > (bLeft + b.width()))
    );
}  

function checkMaxMinPos(a, b, aW, aH, bW, bH, maxX, minX, maxY, minY) {
    'use strict';

    if (a.left < b.left) {
        if (a.left < minX) {
            minX = a.left;
        }
    } else {
        if (b.left < minX) {
            minX = b.left;
        }
    }

    if (a.left + aW > b.left + bW) {
        if (a.left > maxX) {
            maxX = a.left + aW;
        }
    } else {
        if (b.left + bW > maxX) {
            maxX = b.left + bW;
        }
    }
    ////////////////////////////////
    if (a.top < b.top) {
        if (a.top < minY) {
            minY = a.top;
        }
    } else {
        if (b.top < minY) {
            minY = b.top;
        }
    }

    if (a.top + aH > b.top + bH) {
        if (a.top > maxY) {
            maxY = a.top + aH;
        }
    } else {
        if (b.top + bH > maxY) {
            maxY = b.top + bH;
        }
    }

    return {
        'maxX': maxX,
        'minX': minX,
        'maxY': maxY,
        'minY': minY
    };
}

</script>
    </head>
    <body>
        <h3>Click and drag</h3>
<h2 id="score">Items selected: <span>0</span> </h2>
<div id="grid">
  <div class="ghost-select"><span></span></div>
</div>

<div id="square" class="elements"></div>

<div id="ball" class="elements"></div>

    </body>
</html>