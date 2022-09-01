<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Get started with a free and open source Tailwind CSS dashboard featuring a sidebar layout, advanced charts, and hundreds of components based on Flowbite">
    <title>Signin | Aplikasi Pemesanan Kendaraan</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="apple-touch-icon" sizes="180x180" href="https://demo.themesberg.com/windster/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://demo.themesberg.com/windster/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://demo.themesberg.com/windster/favicon-16x16.png">
    <link rel="icon" type="image/png" href="https://demo.themesberg.com/windster/favicon.ico">
</head>

<body class="bg-gray-50">
    <main class="bg-gray-50">
        <div class="mx-auto md:h-screen flex flex-col justify-center items-center px-6 pt-8 pt:mt-0">
            <a href=""
                class="text-2xl font-semibold flex justify-center items-center mb-8 lg:mb-10">
                <img src="https://demo.themesberg.com/windster/images/logo.svg" class="h-10 mr-4" alt="Windster Logo">
                <span class="self-center text-2xl font-bold whitespace-nowrap">Vehicle Booking Apps</span>
            </a>

            <div class="bg-white shadow rounded-lg md:mt-0 w-full sm:max-w-screen-sm xl:p-0">
                <div class="p-6 sm:p-8 lg:p-16 space-y-8">
                    <h2 class="text-2xl lg:text-3xl font-bold text-gray-900">
                        Sign in
                    </h2>
                    <form class="mt-8 space-y-6" action="#">
                        <div>
                            <label for="username" class="text-sm font-medium text-gray-900 block mb-2">Your username</label>
                            <input type="text" name="username" id="username"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="johndoe11!" required>
                        </div>
                        <div>
                            <label for="password" class="text-sm font-medium text-gray-900 block mb-2">Your
                                password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                required>
                        </div>
                        <button type="submit"
                            class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-base px-5 py-3 w-full sm:w-auto text-center">
                            Login to your account
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
