@include('common-js')

<script>
    // ----------User-Authentication----------------

    var isUserAuthenticated = false;

    if (getToken() == undefined || getToken() == "undefined") {
        isUserAuthenticated = true;
    }

    isUserAuthenticated = checkAuthToken('{{ route("api.validate_token") }}');

    // console.log(isUserAuthenticated);

    // ---------------------------------------------

    var isProtectedRoute = [
        '{{ route("login") }}',
    ];

    var isWithTokenRoute = [];

    var current_url = window.location.href;

    if (!isProtectedRoute.includes(current_url) && !isUserAuthenticated) {
        window.location.href = '{{ route("login") }}';
    }

    if (isProtectedRoute.includes(current_url) && isUserAuthenticated) {
        window.location.href = '{{ route("welcome") }}';
    }
</script>