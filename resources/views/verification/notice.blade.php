<x-layouts :$data>
    <div class="container-fluid position-relative d-flex p-0">
        <div class="bg-light p-5 rounded">
            <h1>Dashboard</h1>

            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    A fresh verification link has been sent to your email address.
                </div>
            @endif

          <p style="color: black">  Before proceeding, please check your email for a verification link. If you did not receive the email,</p>
                <a href="/logout" class="btn btn-primary">Log Out</a>
            <form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="d-inline btn btn-link p-0">
                    click here to request another
                </button>.
            </form>
        </div>
       </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{url('admin/js/main.js')}}"></script>
</x-layouts>
