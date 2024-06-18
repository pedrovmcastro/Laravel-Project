@extends('admin.layouts.template')

@section('content')
<h1>Usuários</h1>

<!-- use esse comando: table>thread>tr>th*3 -->
<table>
    <thread>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
    </thread>
    <tbody>
        @forelse ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>-</td>
            </tr>
        @empty
            <tr>
                <td colspan="100">Nenhum usuário no banco</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $users->links() }} <!-- esse comando faz todo o css tailwind da paginação -->
@endsection