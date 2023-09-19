<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Urgent Reminder</title>
    <style type="text/css">
        .btn_yellow {background-color: #D5AF2A; color: #FFFFFF; text-decoration: none; border-radius: 10px; padding: 8px 15px; font-size: 17px; line-height: 22px;}
    </style>
</head>
<body  offset="0" class="body externalClass" style="padding:0; margin:0; display:block; background:#e8ecf0; -webkit-text-size-adjust:none" bgcolor="#e8ecf0">
<p>Hey, {{@$user_name??''}}</p>

<p><strong>Subject:</strong> Urgent Reminder</p>

<p>This is a reminder of your upcoming event</p>

<p><strong>Event Title:</strong> {{@$eventName}} </p>
<p><strong>Date:</strong> {{@$eventDate}} </p>
<p><strong>Time:</strong>  {{@$eventTime}}</p>
<p><strong>Location:</strong> {{@$eventLocation}} </p>
<p><strong>Description:</strong> {{@$eventDescription}} </p>

<p>Click <a class="btn_yellow" href="{{@$login}}" style="background-color: #D5AF2A; color: #FFFFFF; text-decoration: none; border-radius: 10px; padding: 8px 15px; font-size: 17px; line-height: 22px;">here</a> to view the details of your event on your LCM calendar.</p>

<p>Freedom Law Chambers</p>

<p>LCM Team</p>


</body>
</html>