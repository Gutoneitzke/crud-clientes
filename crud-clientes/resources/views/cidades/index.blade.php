<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight col-sm-11">
                {{ __('Cidades') }}
            </h2>
            <a href="{{ route('cidades.create') }}" class="btn btn-sm btn-success col-sm-1">Adicionar</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Estado</th>
                            <th>...</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cidades as $cidade)
                        <tr>
                            <td>{{ $cidade->id }}</td>
                            <td>{{ $cidade->nome }}</td>
                            <td>{{ $cidade->estado->nome}}</td>
                            <td>
                                <a href="{{ route('cidades.edit', ['id'=>$cidade->id] ) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form method="POST" action="{{ route('cidades.destroy', ['id' => $cidade->id]) }}" style="display:contents;" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>