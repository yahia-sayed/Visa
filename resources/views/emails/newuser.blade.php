<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Register</title>
</head>

<body>
    <div class="">
        <div class="fs-3 fw-bold d-flex justify-content-center">
            Welcome to RS4IT
        </div>
        <p>We sending this email to you to complete your Saudi VIAS entry and travel requirement</p>
        <p> Please click on link below</p>
        <a href="{{ url($appUrl.'/registeration/'.$id) }}">Register</a>
    </div>


</body>

</html>
