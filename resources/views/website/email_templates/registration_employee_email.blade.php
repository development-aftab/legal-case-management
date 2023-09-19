<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>
        Hello {{$data['name']??""}},
    </p>

    <p>
        Freedom Law Chambers has successfully uploaded and registered your profile to our<br>
        Legal Case Management (LCM) Software.
    </p>


    <p>
        Your login credentials are as follows:
    </p>

    <p>
        <b>Username - </b> {{$data['email']??""}}
    </p>

    <p>
        <b>Password - </b> {{$data['password']??""}}
    </p>


    <p>
        To access your account, please use the login portal provided below:
    </p>

    <p>
        Login Portal: <a href="{{$data['login_url']??''}}">LCM</a>
    </p>


    <p>
        Please keep in mind that the password we have provided is temporary and should be <br>
        changed by you at your earliest convenience for security reasons.If you require any <br>
        further assistance, please do not hesitate to contact the Chamber's Manager,<br>
        Mr.  Varma Ramdhan via his mobile 761-5528.
    </p>

    <p>
        <i>
            These login credentials allow you to manage your case files and court attendance in a <br>
            practical, simple and efficient manner.
        </i>
    </p>

    <p>
        <b>Key Features</b>
    </p>
    <ul>
        <li>Creating Client profile</li>
        <li>Uploading your PDF filed court documents in designated filing slots</li>
        <li>Creating summarized notes for each uploaded document</li>
        <li>Calendar to track deadlines, court dates  and reminders</li>
        <li>Color coded deadlines</li>
        <li>Court attendant logs and notes</li>
        <li>Generating master file</li>
        <li>Generating Bill of Costs</li>
        <li>Generating automated invoice</li>
        <li>Shortcut and hyperlinks</li>
    </ul>
    <p><b>
        Freedom Law Chambers <br>
        LCM Software Support Team.
    </b></p>
</body>
</html>