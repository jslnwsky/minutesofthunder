<!--Checks browser version based on capabilities-->
var browservers = '';
if (window.addEventListener)
browservers = 'FF';
else if (window.attachEvent)
browservers = 'IE';
else
browservers = 'OTHER';
<!--End Browser check-->
var lastStatus = '';
var elements;
var inAdFrame = false;
var FFiframeObj;

elements = document.getElementsByTagName("iframe");

for (var i = 0; i < elements.length; i++) {
if(elements[i].src.indexOf('googlesyndication.com') > -1)
{
if (document.layers)
{
elements[i].captureEvents(Events.ONFOCUS);
}
if (browservers == 'IE')
{
elements[i].onfocus = IEgetclickinfo;
}
else if (browservers == 'FF')
{
elements[i].addEventListener('mouseover', onMoveOverFF, true);
window.addEventListener('mouseover', onMoveOutFF, true);
window.addEventListener('unload', FFgetclickinfo, false);
}
else
{
elements[i].onfocus = IEgetclickinfo;
}
}
}

function IEgetclickinfo()
{
var i = 0;
window.focus();

if (window.status && (window.status!= lastStatus))
{
lastStatus = window.status;
adsense_log_url_image = new Image();
adsense_log_url_image.src = adlogger_loc + '/trackclick.php' +
'?entyp=' + escape("click") +
'&page=' + escape(document.location.href) +
'&targ=' + escape(window.status.substring(6)) +
'&ref=' + escape(document.referrer) +
'&form=' + escape(adinfo(event.srcElement, 'format')) +
'&chan=' + escape(adinfo(event.srcElement, 'channel')) +
'&bordcol=' + escape(adinfo(event.srcElement, 'color_border')) +
'&bgcol=' + escape(adinfo(event.srcElement, 'color_bg')) +
'&linkcol=' + escape(adinfo(event.srcElement, 'color_link')) +
'&urlcol=' + escape(adinfo(event.srcElement, 'color_url')) +
'&txtcol=' + escape(adinfo(event.srcElement, 'color_text')) +
'&chid=' + channel_id;
}
}

function onMoveOverFF(e)
{
inAdFrame = true;
FFiframeObj = this;
}

function onMoveOutFF(e)
{
inAdFrame = false;
}

function FFgetclickinfo(e)
{
var i = 0;

if (inAdFrame)
{
adsense_log_url_image = new Image();
adsense_log_url_image.src = adlogger_loc + '/trackclick.php' +
'?entyp=' + escape("click") +
'&page=' + escape(document.location.href) +
'&targ=' + escape("Unknown") +
'&ref=' + escape(document.referrer) +
'&form=' + escape(adinfo(FFiframeObj, 'format')) +
'&chan=' + escape(adinfo(FFiframeObj, 'channel')) +
'&bordcol=' + escape(adinfo(FFiframeObj, 'color_border')) +
'&bgcol=' + escape(adinfo(FFiframeObj, 'color_bg')) +
'&linkcol=' + escape(adinfo(FFiframeObj, 'color_link')) +
'&urlcol=' + escape(adinfo(FFiframeObj, 'color_url')) +
'&txtcol=' + escape(adinfo(FFiframeObj, 'color_text')) +
'&chid=' + channel_id;
}
}

function adinfo(iframeObj, name) {

var dc = iframeObj.src;
var prefix = name + "=";
var begin = dc.indexOf("&" + prefix);
if (begin == -1) {
begin = dc.indexOf("?" + prefix);
if (begin == -1) return null;
} else
begin += 1;
var end = dc.indexOf("&", begin);
if (end == -1)
end = dc.length;

return unescape(dc.substring(begin + prefix.length, end));
}

var impImg = new Image();
impImg.src =  adlogger_loc + '/trackpageview.php' +
'?entyp=' + escape("pageview") +
'&page=' + escape(document.location.href) +
'&ref=' + escape(document.referrer) +
'&chid=' + channel_id;