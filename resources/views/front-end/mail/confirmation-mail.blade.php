<!doctype>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Confirmation Mail | Find Convention Hall</title>
</head>
<body class="text-center bg-dark text-light">
<table class="table">
    <tr>
        <td>&nbsp;</td>
        <td class="container">
            <div class="content">
                <table role="presentation" class="table">
                    <tr>
                        <th>
                            <h2 class="text-center text-primary"><span>F</span>ind Convention <span>H</span>all </h2>
                        </th>
                    </tr>
                    <tr>
                        <td class="wrapper">
                            <table role="presentation" class="table">
                                <tr>
                                    <td>
                                        <span> Hi <h3 class="text-danger">{{ $first_name.' '.$last_name }}</h3> </span>
                                        <span>Thanks for join our community......</span>
                                        <h4 class="text-success">Your Email Address is : <span class="text-danger">{{ $email }}</span> </h4>
                                        <h4 class="text-success">Your Mobile Number is : <span class="text-danger">{{ $phone_number }}</span> </h4>
                                        <h4 class="text-success">Your Confirmation Code : <span class="text-danger">{{ $confirmation_code }}</span> </h4>

                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                                            <tbody>
                                            <tr>
                                                <td align="left">
                                                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <a href="{{ url('http://127.0.0.1:8000/registration/confirmation') }}">
                                                                    <input type="submit" class="btn btn-success" value="Confirm Account" />
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <h4 class="text-success">Thanks By.......
                                            <span class="text-danger">Find Convention Hall Team</span>
                                        </h4>

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <td>&nbsp;</td>
    </tr>
</table>
</body>
</html>
