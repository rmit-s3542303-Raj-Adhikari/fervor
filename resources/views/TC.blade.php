<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <style>
        .flex-container {
            display: -webkit-flex;
            display: flex;
            -webkit-flex-flow: row wrap;
            flex-flow: row wrap;
            text-align: center;
        }

        .flex-container > * {
            padding: 15px;
            -webkit-flex: 1 100%;
            flex: 1 100%;
        }

        .article {
            text-align: left;
        }

        header {background: black;color:white;}
        footer {background: #aaa;color:white;}
        .nav {background:#eee;}

        .nav ul {
            list-style-type: none;
            padding: 0;
        }
        .nav ul a {
            text-decoration: none;
        }

        @media all and (min-width: 768px) {
            .nav {text-align:left;-webkit-flex: 1 auto;flex:1 auto;-webkit-order:1;order:1;}
            .article {-webkit-flex:5 0px;flex:5 0px;-webkit-order:2;order:2;}
            footer {-webkit-order:3;order:3;}
        }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>T&C</title>




</head>

<body>
<article class="article">
    <h1>Terms And Conditions</h1>
    <p>This website (the “Website”) is operated by  Fervor , Inc. (“Fervor ”).
        The Terms of Use set forth below are binding on all users of this Website.
        By directing your browser to this Website or otherwise accessing the pages of this Website,
        you accept these Terms of Use. Fervor may change the Terms of Use,
        or may modify or discontinue the Website or services offered thereon, at any time at its sole discretion.
        Fervor reserves the right, at its sole discretion, to deny further or continuing access to the Website to any visitor,
        including, without limitation, any user that Fervor determines has violated any aspect of these Terms of Use.
        Fervor reserves the right, at its sole discretion, to seek and obtain any other remedies
        available to it pursuant to any applicable laws and regulations or at equity as a result of your breach of these
        Terms of Use or any other act or omission by you that gives rise to a claim by Fervor .</p>
    <p><strong>Adult users only</strong></p>
    <p>This Website is not intended for children under 18 years of age. If you are under 18, you are not authorized to use this Website and will not be afforded access to any features of this Website that allow for you to provide information to us or to share information with other users of this Website.</p>
    <p><strong>Limited License</strong></p>
    <p>When you purchase features on the Website for a fee, some purchases grant you an unlimited license to use a feature during a set time period. Other purchases may grant you a limited license to use a feature where the license is governed by the use of “tokens”, “points” or similar terms (“License Triggers”) during a set time period. Upon the expiration of the time period, any unused License Triggers expire. In some cases, we may redeem any unused License Triggers ourselves prior to termination and provide you the feature(s) related thereto so you have no unused License Triggers when the license period expired, although we are not obligated to do so. We may also give you a license to use features that use License Triggers for free or as part of a promotion. In all cases, any license to use any of our Services is subject to your compliance with these Terms & Conditions and a non-exclusive, non-transferable and revocable.
    </p>
</article>

<footer>Copyright &copy; fervor</footer>
</div>
</body>
</html>