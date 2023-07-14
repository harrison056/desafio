<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <form action="/sent-email" method="POST">
            @csrf    
                <div class="container">
                    <div> 
                        <div class="div-container">
                            <label for="subject">Subject: </label>
                        </div>
                        <div>
                            <input type="text" name="subject">
                        </div>
                    </div>
                        <div class="div-container">
                            <div>
                                <label for="message">Message: </label>
                            </div>
                            <div>
                                <textarea name="message" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="div-container">
                            <div>   
                                <label for="emails-list">Emails Lists: </label>
                            </div>
                            <div>
                            <textarea name="emails-list" rows="10"></textarea>
                            </div>
                        </div>
                        <div>
                            <br><button type="submit">Enviar</button>
                        </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</x-app-layout>
