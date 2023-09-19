<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>LCM Calendar</title>
      <style type="text/css">
        .btn_yellow {background-color: #D5AF2A; color: #FFFFFF; text-decoration: none; border-radius: 10px; padding: 8px 15px; font-size: 17px; line-height: 22px;}
      </style>
   </head>
   <body  offset="0" class="body externalClass" style="padding:0; margin:0; display:block; background:#e8ecf0; -webkit-text-size-adjust:none" bgcolor="#e8ecf0">
        <p>Hey  {{$data['name']??""}},</p>

        <p><strong>Subject:</strong> LCM Calendar</p>

        <p><strong>Event Title:</strong>  {{$data['eventName']??""}}</p>

        <p><strong>Date:</strong>  {{$data['date']??""}}</p>

        <p><strong>Time:</strong>  {{$data['time']??""}}</p>

        <p><strong>Location:</strong>  {{$data['location']??""}}</p>

        <p><strong>Description:</strong>  {{$data['description']??""}}</p>

        <p>Click <a class="btn_yellow" href=" {{$data['login']??''}}" style="background-color: #D5AF2A; color: #FFFFFF; text-decoration: none; border-radius: 10px; padding: 8px 15px; font-size: 17px; line-height: 22px;">here</a> to view the details of your event on your LCM calendar.</p>

   </body>
</html>