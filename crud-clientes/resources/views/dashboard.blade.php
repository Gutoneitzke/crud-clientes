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
                    <strong class="text-primary">{{ $paises }}</strong> <b>Países</b>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <strong class="text-primary">{{ $estados }}</strong> <b>Estados</b>
                </div>
            </div>
        </div>
        <br><br>
        <div class="col-sm-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <strong class="text-primary">{{ $cidades }}</strong> <b>Cidades</b>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <strong class="text-primary">{{ $clientes }}</strong> <b>Clientes</b>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
