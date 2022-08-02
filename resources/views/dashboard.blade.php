<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <br><br><br>
    <div class="p-6 row">
        <div class="col-sm-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <x-nav-link :href="route('paises.index')" style="text-decoration: none; font-weight: bold; font-size: 1.1rem; color: #000;">
                        Países
                    </x-nav-link>
                    <br>
                    <strong class="text-primary" style="font-size: 1.5rem;">{{ $paises }}</strong> 
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <x-nav-link :href="route('estados.index')" style="text-decoration: none; font-size: 1.1rem; font-weight: bold; color: #000;">
                        Estados
                    </x-nav-link>
                    <br>
                    <strong class="text-primary" style="font-size: 1.5rem;">{{ $estados }}</strong> 
                </div>
            </div>
        </div>
        <br><br>
        <div class="col-sm-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <x-nav-link :href="route('cidades.index')" style="text-decoration: none; font-size: 1.1rem; font-weight: bold; color: #000;">
                        Cidades
                    </x-nav-link>
                    <br>
                    <strong class="text-primary" style="font-size: 1.5rem;">{{ $cidades }}</strong> 
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <x-nav-link :href="route('clientes.index')" style="text-decoration: none; font-size: 1.1rem; font-weight: bold; color: #000;">
                        Clientes
                    </x-nav-link>
                    <br>
                    <strong class="text-primary" style="font-size: 1.5rem;">{{ $clientes }}</strong>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
