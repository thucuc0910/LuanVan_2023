<p>Dear {{ $admin->username }}</p>
<p>
    Your password on MyShoes system was changed successfully.
    Here is your new login credentials:
    <br>
    <b>Login ID: </b>{{ $admin->username}} or {{ $admin->email}}
    <br>
    <b>Password: </b>{{ $new_password}}
</p>
<br>
Please, keep your credenttial confidential. Your username and password are your own 
credentials and you should never share them with anybody else.
<p>
    MyShoes will not be liable for any misuse of your username or password.
</p>
<br>
-----------------------------------------------------------------------------------
<p>
    This email was automatically sent by MyShoes system. Do not reply it.
</p>
