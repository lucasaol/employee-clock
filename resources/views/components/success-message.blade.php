@if (session('success'))
    <div id="success-alert"
         class="fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg transition-opacity duration-500"
    >
        {{ session('success') }}
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const el = document.getElementById("success-alert");
            if (el) {
                setTimeout(() => {
                    el.classList.add("opacity-0", "transition", "duration-500");
                    setTimeout(() => el.remove(), 500);
                }, 3000);
            }
        });
    </script>
@endif
