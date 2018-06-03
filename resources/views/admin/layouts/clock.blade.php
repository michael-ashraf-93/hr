<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <title>Tutorial: How to Make a Digital Clock with jQuery &amp; CSS3</title>

    <!-- The main CSS file -->
    <link href="{{ url('clock/assets/css/style.css') }}" rel="stylesheet" />

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>

<div id="clock" class="light">
    <div class="display">
        <div class="weekdays"></div>
        <div class="ampm"></div>
        <div class="alarm"></div>
        <div class="digits"></div>
    </div>
</div>


<!-- JavaScript Includes -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.0.0/moment.min.js"></script>
<script src="{{ url('clock/assets/js/script.js') }}"></script>

</body>
</html>




