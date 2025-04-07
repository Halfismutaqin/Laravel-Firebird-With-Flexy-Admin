<footer class="bg-white shadow-sm text-center py-3 mt-auto">
    <div class="container">
        <p class="mb-0 text-muted text-md"> 
            Design and Developed by 
            <a href="https://www.wrappixel.com/" class="text-decoration-underline text-primary" target="_blank">
                Wrappixel.com
            </a>
        </p>

        @if(session('user_session.user_id'))
            {{-- <p class="text-muted small mt-1 mb-0">
                Logged in as: {{ session('user_session.user_id') }}
            </p> --}}
        @endif
    </div>
</footer>