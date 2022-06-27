<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight col-sm-11">
                {{ __('Estados') }}
            </h2>
            <a href="{{ route('estados.create') }}" class="btn btn-sm btn-success col-sm-1">Adicionar</a>
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
                            <th>País</th>
                            <th>...</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($estados as $estado)
                        <tr>
                            <td>{{ $estado->id }}</td>
                            <td>{{ $estado->nome }}</td>
                            <td>{{ $estado->pais->nome}}</td>
                            <td>
                                <a href="{{ route('estados.edit', ['id'=>$estado->id] ) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form method="POST" action="{{ route('estados.destroy', ['id' => $estado->id]) }}" style="display:contents;" class="delete-form">
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