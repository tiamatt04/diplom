@extends('admins.admin')
@section('title','Товары')
@section('content')
    <div class="container">
        <div class="row m-5">
            <div class="col"></div>
            <div class="col">
                <form method="post" enctype="multipart/form-data" class="text-center">
                    @csrf
                    <h2 class="text-center">Добавить товар</h2>
                    <div class="mb-3">
                        <label for="product_name" class="form-label text-primary">Название</label>
                        <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name">
                        @error('product_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="product_count" class="form-label text-primary">Количество</label>
                        <input type="number" class="form-control @error('product_name') is-invalid @enderror" id="product_count" name="product_count">
                        @error('product_count')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="product_price" class="form-label text-primary">Цена</label>
                        <input type="number" class="form-control @error('product_price') is-invalid @enderror" id="product_price" name="product_price">
                        @error('product_price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label text-primary">Категории</label>
                        <select type="text" class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                            <option selected>Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>

                        @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="product_photo" class="form-label text-primary">Фото</label>
                        <input type="file" class="form-control @error('product_photo') is-invalid @enderror" id="product_photo" name="product_photo">
                        @error('product_photo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="product_description" class="form-label text-primary">Описание</label>
                        <textarea class="form-control @error('product_description') is-invalid @enderror" rows="3" id="product_description" name="product_description"></textarea>
                        @error('product_description')
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
            <div class="col-12">
                @if(session()->has('edit_product'))
                    <div class="alert alert-success">Вы успешно изменили товар {{session()->get('edit_product')}} на {{session()->get('old_edit_category')}}</div>
                @endif
                @if(session()->has('add_product'))
                    <div class="alert alert-success">Вы успешно добавили товар {{session()->get('add_product')}}></div>
                @endif
                @if(session()->has('delete_product'))
                    <div class="alert alert-success">Вы успешно удалили товар {{session()->get('delete')}}</div>
                @endif
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="text-center">Название</th>
                        <th scope="col" class="text-center">Страна поставщик</th>
                        <th scope="col" class="text-center">Количество</th>
                        <th scope="col" class="text-center">Категория</th>
                        <th scope="col" class="text-center">Цена</th>
                        <th scope="col" class="text-center">Фото</th>
                        <th scope="col" class="text-center">Описание</th>
                        <th scope="col" class="text-center">Изменение</th>
                        <th scope="col" class="text-center">Удаление</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <img>
                            <td>{{$product->id}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->product_country}}</td>
                            <td>{{$product->product_count}}</td>
                            <td>{{ $product->category() }}</td>
                            <td>{{$product->product_price}}</td>
                            <td><img style="max-width: 300px" src="{{asset('storage/app/public/'.$product->product_photo)}}" alt="Фото товара"></td>
                            <td>{{$product->product_description}}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-outline-info text-center" data-bs-toggle="modal" data-bs-target="#editModal{{$product->id}}">
                                    Изменить
                                </button>

                                <div class="modal fade" id="editModal{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Изменение товара {{$product->product_name}}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{route('editProduct', $product)}}" enctype="multipart/form-data" class="text-center">
                                                    @csrf
                                                    <h2 class="text-center">Изменить товар</h2>
                                                    <div class="mb-3">
                                                        <label for="product_name" class="form-label text-primary">Название</label>
                                                        <input type="text" value="{{$product->product_name}}" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name">
                                                        @error('product_name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="product_country" class="form-label text-primary">Страна поставщик</label>
                                                        <input type="text" value="{{$product->product_country}}" class="form-control @error('product_name') is-invalid @enderror" id="product_country" name="product_country">
                                                        @error('product_country')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="product_count" class="form-label text-primary">Количество</label>
                                                        <input type="number" value="{{$product->product_count}}" class="form-control @error('product_name') is-invalid @enderror" id="product_count" name="product_count">
                                                        @error('product_count')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="product_price" class="form-label text-primary">Цена</label>
                                                        <input type="number" value="{{$product->product_price}}" class="form-control @error('product_price') is-invalid @enderror" id="product_price" name="product_price">
                                                        @error('product_price')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="category_id" class="form-label text-primary">Категории</label>
                                                        <select type="text" class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                                            <option selected value="{{$product->category_id}}">{{$product->category()}}</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                            @endforeach
                                                        </select>

                                                        @error('category_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="product_photo" class="form-label text-primary">Фото</label>
                                                        <input type="file" class="form-control @error('product_photo') is-invalid @enderror" id="product_photo" name="product_photo">
                                                        @error('product_photo')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 d-flex flex-column align-items-center">
                                                        <label for="product_photo_second" class="form-label text-primary">Активное фото</label>
                                                        <img style="max-width: 300px" src="{{asset('storage/app/public/'.$product->product_photo)}}" alt="Фото активное">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="product_description" class="form-label text-primary">Описание</label>
                                                        <textarea class="form-control @error('product_description') is-invalid @enderror" rows="3" id="product_description" name="product_description">{{$product->product_description}}</textarea>
                                                        @error('product_description')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Изменить</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$product->id}}">
                                    Удалить
                                </button>

                                <div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Удаление товара {{$product->product_name}}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Удаление товара: {{ $product->product_name }} приведет к удалению всех связанных с ним заказов
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                <form action="{{ route('deleteProduct' , $product) }}" method="post">
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
        </div>
    </div>
@endsection
