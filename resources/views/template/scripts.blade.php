    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/1ace677190.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            console.log(window.location);
            const pathSegments = window.location.pathname.toLowerCase().split('/');
            const lastTwoSegments = pathSegments.slice(-2).join('/');

            if (lastTwoSegments.includes('dashboard')) {
                $('#nav-item-dashboard').addClass('active');
                $('#nav-link-dashboard').addClass('active');
            } else if (lastTwoSegments.includes('umkm')) {
                $('#nav-item-umkm').addClass('active');
                $('#nav-link-umkm').addClass('active');
            } else if (lastTwoSegments.includes('pembina')) {
                console.log(lastTwoSegments);
                $('#nav-item-pembina').addClass('active');
                $('#nav-link-pembina').addClass('active');
            } else {
                console.log('No matching path found');
            }
        });
    </script>
