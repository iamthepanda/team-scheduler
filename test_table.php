<table id="main" style="">
    <tr id="headers">
        <td>
            <table border="1" style="width:(100/8)%;">
                <tr>
                    <td>row</td>
                </tr>
            </table></td>
        <td>
            <table border="1" style="width:(100/4)%;">
                <tr>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                </tr>
            </table>
    
        </td>
    </tr>
    <tr>
        <td id="times">
            <table border="1">
                <tr>
                    <td>row</td>
                </tr>
                <tr>
                    <td>row</td>
                </tr>
                <tr>
                    <td>row</td>
                </tr>
                <tr>
                    <td>row</td>
                </tr>
                <tr>
                    <td>row</td>
                </tr>
                <tr>
                    <td>row</td>
                </tr>
                <tr>
                    <td>row</td>
                </tr>
                <tr>
                    <td>row</td>
                </tr>
            
            </table>
        </td>
        <td id="slots">
            <table border="1" style="width:100%;">
                <tr>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                </tr>
                <tr>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                </tr>
                <tr>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                </tr>
                <tr>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                </tr>
                <tr>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                </tr>
                <tr>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                </tr>
                <tr>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                </tr>
                <tr>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                    <td>row</td>
                </tr>
            </table>
        </td>
    </tr>
</table>


    
    <div id="selectionBox" hidden style="border: 1px dotted #000; position: absolute;"></div>

<script>
    var selectionBox = document.getElementById('selectionBox'), x1 = 0, y1 = 0, x2 = 0, y2 = 0;
function reCalc() { //This will restyle the div
    var x3 = Math.min(x1,x2); //Smaller X
    var x4 = Math.max(x1,x2); //Larger X
    var y3 = Math.min(y1,y2); //Smaller Y
    var y4 = Math.max(y1,y2); //Larger Y
    selectionBox.style.left = x3 + 'px';
    selectionBox.style.top = y3 + 'px';
    selectionBox.style.width = x4 - x3 + 'px';
    selectionBox.style.height = y4 - y3 + 'px';
}
onmousedown = function(e) {
    selectionBox.hidden = 0; //Unhide the div
    x1 = e.clientX; //Set the initial X
    y1 = e.clientY; //Set the initial Y
    reCalc();
};
onmousemove = function(e) {
    x2 = e.clientX; //Update the current position X
    y2 = e.clientY; //Update the current position Y
    reCalc();
};
onmouseup = function(e) {
    selectionBox.hidden = 1; //Hide the div
};
</script>

<p draggable="true" ondrag="myFunction(event)">Drag me!</p>