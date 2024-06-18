<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
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
</body>
</html>