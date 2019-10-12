<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Comments App</title>
</head>
<link rel="stylesheet" href="{{mix('css/app.css')}}">
<style>
    body {
        background-color: #eaebec;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 40 40'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23cbc9ce' fill-opacity='0.4'%3E%3Cpath d='M0 38.59l2.83-2.83 1.41 1.41L1.41 40H0v-1.41zM0 1.4l2.83 2.83 1.41-1.41L1.41 0H0v1.41zM38.59 40l-2.83-2.83 1.41-1.41L40 38.59V40h-1.41zM40 1.41l-2.83 2.83-1.41-1.41L38.59 0H40v1.41zM20 18.6l2.83-2.83 1.41 1.41L21.41 20l2.83 2.83-1.41 1.41L20 21.41l-2.83 2.83-1.41-1.41L18.59 20l-2.83-2.83 1.41-1.41L20 18.59z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    @media screen and (min-width: 640px) {
        .login {
            width: 400px;
        }
    }
</style>
<body class="h-screen flex flex-col justify-center">
<div class="flex flex-col justify-center">
    <div class="lg:mx-auto md:mx-auto sm:w-full login">
        @if(session('error'))
            <div class="w-full bg-orange-600 p-1 text-white font-bold text-center mb-6">{{session('error')}}</div>
        @endif
        <div class="bg-white shadow p-8">
            <h4 class="mb-6 text-center text-2xl">Sign In</h4>
            @include('auth.partials.login__form')
        </div>
        <div class="text-center mt-2">
            <span class="text-gray-800">Don't have an account?</span> <a href="#" class="underline">Sign up here!</a>
        </div>
    </div>
</div>
</body>
</html>

