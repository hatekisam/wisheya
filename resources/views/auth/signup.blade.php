<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WiSheya</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="w-full h-full">
    <div class="absolute bottom-0  left-[23vw] text-gray-500">&copy;
        <?php
        $currentYear = date('Y');
        echo $currentYear;
        ?> All Rights Reserved</div>
    <div class="w-full h-full flex flex-row justify-between">
        <div class="w-[60%] h-[100vh] flex flex-col justify-center items-center">
            <h1 class="text-3xl font-[700] my-2">Welcome Let's Get Started</h1>
            <p class="text-lg text-gray-500 my-2">Start managing your time faster and better</p>
            <form action="{{ route('signup-user') }}" method="POST" class="w-[50%]">
                @if(Session::has('success'))
                <p class="text-rose-600">{{Session::get('success')}}</p>
                @endif
                @if(Session::has('fail'))
                <p class="text-rose-600">{{Session::get('fail')}}</p>
                @endif
                @csrf
                <div class="relative my-2">
                    <div class="absolute left-2 top-2 w-8 h-8 bg-[white] rounded-md flex justify-center items-center">
                        <i class="fa-regular fa-user fa-lg" style="color:blue"></i>
                    </div>
                    <input type="text" name="name" value="{{old('name')}}"
                        class="w-full border-[2px] border-gray-700 py-3 pl-12 pr-2 bg-[#f5f7f9] rounded-md"
                        placeholder="Name">
                </div>
                <p class="text-rose-600 text-xs my-0">@error('name') {{$message}} @enderror</p>
                <div class="relative my-2">
                    <div class="absolute left-2 top-2 w-8 h-8 bg-[white] rounded-md flex justify-center items-center">
                        <i class="fa-regular fa-envelope fa-lg" style="color:blue"></i>
                    </div>
                    <input type="text" name="email" value="{{old('email')}}"
                        class="w-full border-[2px] border-gray-700 py-3 pl-12 pr-2 bg-[#f5f7f9] rounded-md"
                        placeholder="Email">
                </div>
                <p class="text-rose-600 text-xs my-0">@error('email') {{$message}} @enderror</p>
                <div class="relative my-2">
                    <div class="absolute left-2 top-2 w-8 h-8 bg-[white] rounded-md flex justify-center items-center">
                        <i class="fa-solid fa-phone fa-lg" style="color: blue"></i>
                    </div>
                    <input type="text" name="telephone" value="{{old('telephone')}}"
                        class="w-full border-[2px] border-gray-700 py-3 pl-12 pr-2 bg-[#f5f7f9] rounded-md"
                        placeholder="Telephone">
                </div>
                <p class="text-rose-600 text-xs my-0">@error('telephone') {{$message}} @enderror</p>
                <div class="relative my-2">
                    <div class="absolute left-2 top-2 w-8 h-8 bg-[white] rounded-md flex justify-center items-center">
                        <i class="fa-solid fa-lock fa-lg" style="color:blue"></i>
                    </div>
                    <input type="password" id="password" name="password" 
                        class="w-full border-[2px] border-gray-700 py-3 px-12  bg-[#f5f7f9] rounded-md"
                        placeholder="Password">
                    <div class="absolute right-2  p-1 top-2 w-8 h-8 flex justify-center items-center text-blue-600 cursor-pointer "
                        id="togglePasswordShow">
                        <i class="fa-solid fa-eye fa-lg" id="eye-on" style="color:blue;display:block"></i>
                        <i class="fa-solid fa-eye-slash fa-lg" id="eye-off" style="color:blue;display:none"></i>
                    </div>
                </div>
                <p class="text-rose-600 text-xs my-0">@error('password') {{$message}} @enderror</p>
                <input type="submit" value="Sign Up"
                    class="cursor-pointer outline-none focus:outline-blue-600 bg-blue-600 text-white text-center w-full rounded-md py-3 my-2" />
            </form>
            <div class="text-center my-2">OR</div>
            <div class="flex flex-row gap-4 my-2 justify-between">
                <div
                    class="flex flex-row items-center gap-4 p-2 border-[2px] border-gray-600 rounded-md   cursor-pointer w-[50%] ">
                    <i class="fa-brands fa-google fa-lg"></i>
                    <p>Google</p>
                </div>
                <div
                    class="flex flex-row items-center gap-4 p-2 border-2 border-gray-600 rounded-md  w-[50%] cursor-pointer   ">
                    <i class="fa-brands fa-github fa-lg"></i>
                    <p>Github</p>
                </div>
            </div>
            <p class="text-gray-500">Already a member ? <a href="/signin" class="text-blue-600">Sign in</a></p>
        </div>
        <div class="bg-[#f5f7f9] w-[40%] h-[100vh]">fasd</div>
    </div>
    <script>
        const eyeOn = document.getElementById('eye-on');
        const eyeOff = document.getElementById('eye-off');
        const togglePasswordShow = document.getElementById('togglePasswordShow');
        togglePasswordShow.addEventListener('click', function() {
            const passwordField = document.getElementById('password');
            const passwordIcon = document.getElementById('passwordIcon');
            console.log("did it alread");
            if (passwordField.getAttribute('type') === 'password') {
                passwordField.setAttribute('type', 'text');
                eyeOn.style.display = 'none'
                eyeOff.style.display = 'block';
            } else {
                passwordField.setAttribute('type', 'password');
                eyeOn.style.display = 'block';
                eyeOff.style.display = 'none'
            }
        });
    </script>
</body>

</html>
