var pos = 'bottom';
var bg = 'black';
var color = 'yellow';
var h = '28px';
var fh = '14px';
var strToShow = "*** TYLKO MUZYKA I DOBRA ZABAWA *** *** RADIO NA TOTALNYM LUZIE *** SERDECZNIE ZAPRASZAMY DO ODSŁUCHU I NADAWANIA WŁASNYCH AUDYCJI ***";

var wftswi = '#textSaleBar a{ color: ' + color + ' !important; text-decoration: none; } #textSaleBar{} ';

var wfs140216 = document.createElement("style");
wfs140216.type = "text/css";
wfs140216.appendChild(document.createTextNode(wftswi));
document.getElementsByTagName("head")[0].appendChild(wfs140216);
var wfBar = jQuery('<div>')
        .attr('id', 'textSaleBar')
        .css('position', 'fixed')
        .css('color', color)
        .css('line-height', h)
        .css('background-color', bg)
        .css('width', '2000px')
        .height(h)
        .css('font-weight', 'bold')
        .css('font-family', 'arial, tahoma')
        .css('vertical-aligh', 'middle')
        .css('z-index','2147483647')
        .css('left', "0px")
        .css('top-margin', "5%")
        .css('font-size', fh);
if (pos == 'top') {
    wfBar.css('top', '0');
} else {
    wfBar.css('bottom', '0');
}
jQuery('body').append(wfBar);
var t = unescape(strToShow);    
var s = jQuery('<span>').html(t);
s.css('padding', '0px 10px');
wfBar.append(s);
var cw = s.outerWidth();

while (cw < ($(window).width() + s.outerWidth())) {
    wfBar.append(s.clone());
    cw += s.outerWidth();
}

setInterval(function() {
    s.css("margin-left", (parseInt(s.css("margin-left")) - 1) + "px");
    if (-(parseInt(s.css('margin-left'))) == s.outerWidth()) {
        s.css('margin-left', 0);
    }
}, 20);