<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{!! asset('img/favicon.png') !!}"/>
    <title>  @yield('title', 'Sistema') </title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta/js/bootstrap-select.min.js" integrity="sha512-I0sRMhP0loaoXaytYuOHHU3pGmyQklf5irZZ8cSaIPi9ETq5qvfcDAiBJ4vqpaq8xeUe7ZVwYM5xqQlxYDK3Uw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        window.confirmarExclusao = function(form) {
            Swal.fire({
                title: 'Confirmar a exclusão?',
                text: 'Não será possível reverter esta ação!',
                icon: 'question',
                confirmButtonText: 'Sim, deletar',
                confirmButtonColor: '#dc3545',
                showCancelButton: true,
                cancelButtonText: 'Não, cancelar',

            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(form).submit();
                }
            });
        }
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta/css/bootstrap-select.min.css" integrity="sha512-S/noEArtFzz8UzFxmVcWfUy5f1zE6cmk7ny8spHuuhSuq9mPUZONHtO+U1Bna9tRn6kAo3mRIsWSsqWbWyhUQQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        html {
            overflow-y: scroll;
        }
        .page-container {
            box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.25), 0 0px 20px 0 rgba(0, 0, 0, 0.2);
        }
    </style>

</head>
