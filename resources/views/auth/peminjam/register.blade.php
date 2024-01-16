<x-guest-layout>
    <x-slot name="title">Admin Registration</x-slot>

    <div class="flex flex-col lg:flex-row gap-20 justify-center items-center">
        <img src="{{asset('img/logo_without_text.png')}}" class="w-auto" alt="Balen">
        <div class="bg-[#879EA6] rounded-2xl p-10">
            <h1 class="text-3xl font-bold mb-6 text-center">Member Registration</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name -->
                <div>
                    <x-input-label for="username" :value="__('Username')"/>
                    <x-text-input id="username" class="block mt-1 w-full" type="text" name="username"
                                  :value="old('username')"/>
                    <x-input-error :messages="$errors->get('username')" class="mt-2"/>
                </div>

                <div class="mt-4">
                    <x-input-label for="namaLengkap" :value="__('Nama Lengkap')"/>
                    <x-text-input id="namaLengkap" class="block mt-1 w-full" type="text" name="namaLengkap"
                                  :value="old('namaLengkap')"/>
                    <x-input-error :messages="$errors->get('namaLengkap')" class="mt-2"/>
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')"/>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>

                <div class="mt-4">
                    <x-input-label for="alamat" :value="__('Alamat')"/>
                    <textarea name="alamat" id="alamat" cols="30" rows="10"
                              class="border-gray-300 focus:border-indigo-500 text-primary focus:ring-indigo-500 rounded-md shadow-sm">{{old('alamat')}}</textarea>
                    <x-input-error :messages="$errors->get('alamat')" class="mt-2"/>
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')"/>

                    <x-text-input id="password" class="block mt-1 w-full"
                                  type="password" name="password"/>

                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                  type="password"
                                  name="password_confirmation"/>

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-primary hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                       href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
