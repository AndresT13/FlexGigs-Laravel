<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title data-lang="page_title">FlexGigs — Professional Services</title>

    <link rel="icon" type="image/png" href="{{ asset('main-page/img/favicon.ico') }}" sizes="42x42" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <!-- TOKEN PARA AJAX (OBLIGATORIO) -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('main-page/css/bootstrap.min.css') }}" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('main-page/css/styles.css') }}" />

    <script src="https://maps.googleapis.com/maps/api/js?key=TU_API_KEY&callback=initMap" async defer></script>

       <script src="{{ asset('main-page/js/news-lang.js') }}"></script>

</head>
