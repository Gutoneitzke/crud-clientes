<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight col-sm-11">
                {{ __('Países') }}
            </h2>
            <a href="{{ route('paises.index') }}" class="btn btn-sm btn-primary col-sm-1">Voltar</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('paises.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control" placeholder="Informe um nome para o país" required>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-md btn-success float-end">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>