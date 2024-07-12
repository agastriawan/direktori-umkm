    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets_admin/dist/libs/apexcharts/dist/apexcharts.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('assets_admin/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('assets_admin/dist/libs/jsvectormap/dist/maps/world.js?1692870487') }}" defer></script>
    <script src="{{ asset('assets_admin/dist/libs/jsvectormap/dist/maps/world-merc.js?1692870487') }}" defer></script>
    <script src="{{ asset('assets_admin/dist/js/tabler.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('assets_admin/dist/js/demo.min.js?1692870487') }}" defer></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let token = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {
            const pathSegments = window.location.pathname.toLowerCase().split('/');
            const lastTwoSegments = pathSegments.slice(-2).join('/');

            if (lastTwoSegments.includes('dashboard')) {
                $('#nav-item-dashboard').addClass('active');
                $('#nav-link-dashboard').addClass('active');
            } else if (lastTwoSegments.includes('umkm')) {
                $('#nav-item-umkm').addClass('active');
                $('#nav-link-umkm').addClass('active');
            } else if (lastTwoSegments.includes('pembina')) {
                $('#nav-item-pembina').addClass('active');
                $('#nav-link-pembina').addClass('active');
            }  else if (lastTwoSegments.includes('kategori')) {
                $('#nav-item-kategori').addClass('active');
                $('#nav-link-kategori').addClass('active');
            }  else if (lastTwoSegments.includes('provinsi')) {
                $('#nav-item-provinsi').addClass('active');
                $('#nav-link-provinsi').addClass('active');
            }  else if (lastTwoSegments.includes('kota')) {
                $('#nav-item-kota').addClass('active');
                $('#nav-link-kota').addClass('active');
            } else {
                console.log('No matching path found');
            }
        });
    </script>
