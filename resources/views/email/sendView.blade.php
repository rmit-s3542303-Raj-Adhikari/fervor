<img alt="Fervor" src="/img/logo-white.png" class="nav-logo">

  <h2>Verify Your Email Address</h2>

<p>Thank you for joining the Fervor network.
Please click the link below to validate your email address and activate your account.</p>
<a href="{{route('sendEmailDone',["email"=>$user->email,"verifytoken"=>$user->verifytoken])}}"
class="btn btn-info" role="button">Active Account</a>