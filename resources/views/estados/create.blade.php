<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight col-sm-11">
                {{ __('Estados') }}
            </h2>
            <a href="{{ route('estados.index') }}" class="btn btn-sm btn-primary col-sm-1">Voltar</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('estados.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control" placeholder="Informe um nome para o estado" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="pais">Selecione um país:</label>
                        <select class="form-control" id="pais" name="pais_id">
                            @foreach($paises as $pais)
                                <option value="{{ $pais->id }}">{{ $pais->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-md btn-success float-end">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>