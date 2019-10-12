<form action="{{route('auth.login')}}" method="POST">
    @csrf
    <div>
        <div class="mb-4">
            <input tabindex="1" autocomplete="off" name="email" placeholder="Email Address" class="p-2 h-12 w-full border border-gray-400" type="text">
            @if($errors->has('email'))
                <span class="text-red-600 text-xs">{{$errors->first('email')}}</span>
            @endif
        </div>
        <div class="mb-4">
            <input tabindex="2" autocomplete="off" name="password" placeholder="Password" class="p-2 h-12 w-full border border-gray-400" type="password">
            @if($errors->has('password'))
                <span class="text-red-600 text-xs">{{$errors->first('password')}}</span>
            @endif
        </div>
        <div class="mb-6">
            <button tabindex="3" class="h-12 bg-blue-600 text-white w-full">Sign In</button>
        </div>
        <div class="text-center">
            <a href="#" class="text-blue-600 text-sm">Forgot your password?</a>
        </div>
    </div>
</form>


