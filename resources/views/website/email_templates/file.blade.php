<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>LCM Shared File</title>
      <style type="text/css">
        .ExternalClass{width:100%}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:100%}img{max-width:600px;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;margin:0;padding:0;display:block}a img{border:none}table{border-collapse:collapse!important}#outlook a{padding:0}.ReadMsgBody{width:100%}.ExternalClass{width:100%}.backgroundTable{margin:0 auto;padding:0;width:100%!important}table td{border-collapse:collapse}.ExternalClass *{line-height:115%}td{font-family:Arial,sans-serif}body{-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;width:100%;height:100%;color:#6b7d90;2font-weight:400;font-size:18px}h1{margin:10px 0}a{color:#4baad4;text-decoration:underline}.desktop-hide{display:none}.hero-bg{background:-webkit-linear-gradient(90deg,#2991bf 0%,#7ecaec 100%);background-color:#4baad4}.force-full-width{width:100%!important}.body-padding{padding:0 75px}.force-width-80{width:80%!important}
      </style>
      <style type="text/css" media="screen">
         @media screen {
         /* Thanks Outlook 2013! http://goo.gl/XLxpyl */
         * {
         font-family:'Arial', 'sans-serif' !important;
         }
         .w280 {
         width: 280px !important;
         }
         }
      </style>
</head>
<body>
    <h1>New file Shared</h1>
    <p>{{$title}}</p>
    <b>Hey {{@$user->name??''}}</b><br>
    <p>{{$sharedUserId->name??''}} has shared "{{$title}}" with you in relation to "{{$caseName}}" </p><br>
    <p>Please click the link below to view and download. </p><br>
    <a border="0" style="text-decoration: none !important; font-size: 12px; font-family: arial, sans-serif; border-style:none; color:#D5AF2A; background-color: #333333; padding: 10px 40px !important; line-height: 45px;" href="{{ url($file) }}">Download File</a>
</body>
</html>
