<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WiSheya</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="w-full h-full">
    <div class="absolute bottom-0  right-[23vw] text-gray-500">&copy;
        <?php
        $currentYear = date('Y');
        echo $currentYear;
        ?> All Rights Reserved</div>
    <div class="w-full h-full flex flex-row justify-between">
        <div class="bg-[#f5f7f9] w-[40%] h-[100vh]">fasd</div>
        <div class="bg-green w-[60%] h-[100vh]">
                <p>Name : {{$data->name}}</p>
                <p>Email : {{$data->email}}</p>
                <a href="logout">Log out</a>
        </div>
    </div>
</body>

</html>
