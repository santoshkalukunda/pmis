@if (Session::has('success'))
    <div class="position-fixed bottom-0 right-0 p-3 mt-5 bg-white" style="z-index: 5; right: 0; bottom: 0 px;">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="500">
            <div class="toast-body text-success">
                <span class=""> <i class="fa fa-check-circle fa-2x"></i></span>
                <span>{{ Session::get('success') }}</span>
            </div>
        </div>
    </div>
@endif

@if (Session::has('error'))
    <div class="position-fixed bottom-0 right-0 p-3 mt-5 bg-white" style="z-index: 5; right: 0; bottom: 0 px;">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="500">
            <div class="toast-body text-danger">
                <span class=""> <i class="bi bi-x-circle fa-2x"></i></span>
                <span>{{ Session::get('error') }}</span>
            </div>
        </div>
    </div>
@endif

@if (Session::has('warning'))
    <div class="position-fixed bottom-0 right-0 p-3  bg-white" style="z-index: 5; right: 0; top: 50px;">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="500">
            <div class="toast-body text-warning">
                <span class=""> <i class="bi bi-exclamation-octagon fa-2x"></i></span>
                <span>{{ Session::get('warning') }}</span>
            </div>
        </div>
    </div>
@endif
@push('scripts')
    <script>
        $(document).ready(function() {
            $("#liveToast").toast('show');
        });
    </script>
@endpush
