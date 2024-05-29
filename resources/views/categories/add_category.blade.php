@extends('admins.admin')
@section('title','Категории')
@section('content')
    <div class="container">
        <div class="row m-5">
            <div class="col"></div>
            <div class="col">
                <form method="post" class="text-center">
                    @csrf
                    <h2 class="text-center">Добавить категорию</h2>
                    <div class="mb-3">
                        <h3 for="category_name" class="form-label text-primary">Название</h3>
                        <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name"
                               name="category_name">
                        @error('category_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                @if(session()->has('edit_category'))
                    <div class="alert alert-success">Вы успешно изменили категорию {{session()->get('edit_category')}} на {{session()->get('old_edit_category')}}</div>
                @endif
                @if(session()->has('delete_category'))
                    <div class="alert alert-success">Вы успешно удалили категорию {{session()->get('delete')}}</div>
                @endif
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="text-center">Название</th>
                        <th scope="col" class="text-center">Изменение</th>
                        <th scope="col" class="text-center">Удаление</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->category_name}}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-outline-info text-center" data-bs-toggle="modal" data-bs-target="#editModal{{$category->id}}">
                                    Изменить
                                </button>

                                <div class="modal fade" id="editModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Изменение категории {{$category->category_name}}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{route('editCategory', $category)}}" class="text-center">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <h3 for="category_name" class="form-label text-primary">Название</h3>
                                                        <input type="text" value="{{$category->category_name}}" class="form-control @error('category_name') is-invalid @enderror" id="category_name"
                                                               name="category_name">
                                                        @error('category_name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <button type="submit" class="btn btn-info">Добавить</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$category->id}}">
                                    Удалить
                                </button>

                                <div class="modal fade" id="deleteModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Удаление категории {{$category->category_name}}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Удаление категории: {{ $category->category_name }} приведет к удалению всех связанных с ней товарами и заказами
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                <form action="{{ route('deleteCategory' , $category) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table></div>
            <div class="col"></div>
        </div>
    </div>
@endsection
