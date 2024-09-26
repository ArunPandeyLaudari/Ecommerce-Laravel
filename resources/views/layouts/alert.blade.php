@if (Session::has('success'))
    {{-- with ley sucess varaible lai flag ko rup ma ligare check garxa if sucesss vaxw vaney matrw dekha vnxa --}}

    <div class="fixed top-0 left-0 right-0 z-50 flex justify-center" id="message">
        <p class="px-5 py-2 text-2xl font-bold text-white bg-green-700 round-b-lg">{{ session('success') }}</p>
    </div>
    <script>
        setTimeout(() => {
            document.getElementById('message').style.display = 'none';
        }, 2000);
    </script>
@endif
