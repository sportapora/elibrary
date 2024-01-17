@extends('layouts.main', ['title' => 'Hubungi Kami'])

@section('content')
    <x-session-alert/>

    <div class="flex flex-col-reverse md:flex-row justify-between mt-10">
        <div>
            <h1 class="text-3xl font-bold text-primary">Hubungi Kami</h1>

            <form action="{{route('contact.store')}}" method="post" class="mt-4">
                @csrf
                <div class="mb-3">
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input placeholder="Name" id="name" class="block mt-1 w-full bg-gray-200" type="text"
                                  name="name" :value="auth()->user()->namaLengkap ?? old('name')"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <div class="mb-3">
                    <x-input-label for="email" :value="__('Email')"/>
                    <x-text-input placeholder="Email" id="email" class="block mt-1 w-full bg-gray-200" type="text"
                                  name="email" :value="auth()->user()->email ?? old('email')"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>
                <div class="mb-6">
                    <x-input-label for="message" :value="__('Message')"/>
                    <textarea name="message" id="message" cols="30" rows="10"
                              class="bg-gray-200 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                    <x-input-error :messages="$errors->get('message')" class="mt-2"/>
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="bg-primary font-bold text-gray-100 rounded-3xl px-6 py-2">Send Message
                    </button>
                </div>
            </form>
        </div>

        <div class="w-full md:w-[400px]">
            <img src="{{asset('img/contactus.png')}}" alt="Contact Us Illustration" class="w-full">
        </div>
    </div>
@endsection
