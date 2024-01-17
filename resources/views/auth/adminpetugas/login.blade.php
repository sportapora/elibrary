<x-guest-layout>
    <x-slot name="title">Admin Login</x-slot>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>


    <div class="flex flex-col lg:flex-row gap-20 justify-center items-center">
        <img src="{{asset('img/logo_without_text.png')}}" class="w-[360px] h-[200px]" alt="Balen">

        <div class="bg-[#879EA6] rounded-2xl p-10">
            <h1 class="text-3xl font-bold mb-6 text-center">Admin Login</h1>
            <form method="POST" action="{{ route('admin.login.store') }}">
                @csrf
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')"/>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')"/>

                    <x-text-input id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  />

                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>

                <div class="flex justify-center mt-8">
                    <x-primary-button>
                        {{ __('LOGIN') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
