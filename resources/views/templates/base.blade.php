<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTMX Larvel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://unpkg.com/htmx.org@1.9.12"></script>
</head>
<body>
    <div class="w-[1200px] mx-auto">

        <section class="bg-blue-700 text-white flex justify-between">
            <div id="brand" class="text-xl content-center px-3">
                My Awesome App
            </div>
            <nav id="main-nav" class="flex">
                <a href="/" class="p-3 hover:bg-blue-600" >Home</a>
                <a href="/about" class="p-3 hover:bg-blue-600" >About</a>
                <a href="/students" class="p-3 hover:bg-blue-600" >Students</a>
                <a href="/accounts" class="p-3 hover:bg-blue-600" >Accounts</a>
            </nav>

        </section>

        <article id="content">
            @yield('content')
        </article>

        <footer class="text-center text-gray-500 py-3 mt-[30rem]">
            Copyright &copy; 2024. ALl rights reserved.
        </footer>

    </div>
</body>
</html>