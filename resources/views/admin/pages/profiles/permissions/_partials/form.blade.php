@include('admin.includes.alerts')

{{--<div class="form-group">--}}
{{--    <label for="permission">Permissão</label>--}}
{{--    <select class="form-control" name="permission_id">--}}
{{--            <option value="" selected>Selecione uma permissão</option>--}}
{{--        @foreach($permissions as $permission)--}}
{{--            <option value="{{$permission->id}}">{{$permission->name}}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
{{--</div>--}}
<div class="form-group text-right">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>

<div class="card-body">
    <table class="table table-condesed">
        <thead>
        <th>Ativo</th>
        <th>Nome</th>
        <th>Descrição</th>
{{--        <th width="230px" class="text-center">Ações</th>--}}
        </thead>
        <tbody>
        @foreach($permissions as $permission)
            <tr>
                <td><input type="checkbox" name="permissions[]" value="{{ $permission->id }}"/></td>
                <td>{{ $permission->name}}</td>
                <td>{{ $permission->description }}</td>
{{--                <td class="text-right">--}}
{{--                    <a href="{{route('profiles.show', $permission->id)}}" class="btn btn-primary">Ver</a>--}}
{{--                    <a href="{{route('profiles.edit', $permission->id)}}" class="btn btn-info">Editar</a>--}}
{{--                    <form action="{{ route('profiles.permissions.detach', [ 'profile' => $profile->id, 'permission' => $permission->id ]) }}" method="POST">--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <button type="submit" class="btn btn-danger">Deletar <i class="far fa-trash-alt"></i></button>--}}
{{--                    </form>--}}
{{--                </td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
