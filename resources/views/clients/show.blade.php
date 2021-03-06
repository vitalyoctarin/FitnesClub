@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Клиент {{ $client->full_name }}</h2>
            </div>
        </div>
    </div>



    <table class="table">
        <tbody>
        <tr>
            <td>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Дата рождения:</strong>
                            {{ $client->dob }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Услуга:</strong>
                            {{ $subcategory->subcategory_name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Номер телефона:</strong>
                            {{ $client->phone_number }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Группа:</strong>
                            {{ $group->group_name }}
                        </div>
                    </div>
                    @if($client->application_id != null)
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>ID заявки:</strong>
                            {{ $client->application_id }}
                        </div>
                    </div>
                    @endif
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <form action="{{ route('clients.destroy',$client->id) }}" method="POST">
                            @can('client-edit')
                                <a class="btn btn-warning" href="{{ route('clients.edit',$client->id) }}">Изменить</a>
                            @endcan

                            @csrf
                            @method('DELETE')
                            @can('client-delete')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            @endcan

                        </form>
                    </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>

@endsection
