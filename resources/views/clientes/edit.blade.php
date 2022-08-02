<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight col-sm-11">
                {{ __('Clientes') }}
            </h2>
            <a href="{{ route('clientes.index') }}" class="btn btn-sm btn-primary col-sm-1">Voltar</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('clientes.update', ['id'=>$cliente->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" value="{{ $cliente->nome }}" class="form-control" placeholder="Informe um nome para o cliente" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" value="{{ $cliente->email }}" class="form-control" placeholder="Informe um email para o cliente" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="telefone">Telefone:</label>
                        <input type="phone" name="telefone" id="telefone" value="{{ $cliente->telefone }}" class="form-control" placeholder="Informe um telefone para o cliente" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="sexo">Selecione uma sexo:</label>
                        <select class="form-control" id="sexo" name="sexo">
                            <option value="M" {{ $cliente->sexo == 'm' ? 'selected' : '' }}>Masculino</option>
                            <option value="F" {{ $cliente->sexo == 'f' ? 'selected' : '' }}>Feminino</option>
                            <option value="O" {{ $cliente->sexo == 'o' ? 'selected' : '' }}>Outro</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="cidade">Selecione uma cidade:</label>
                        <select class="form-control" id="cidade" name="cidade_id">
                            @foreach($cidades as $cidade)
                                <option value="{{ $cidade->id }}" {{ $cliente->cidade_id == $cidade->id ? 'selected' : '' }}>{{ $cidade->nome }}</option>
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