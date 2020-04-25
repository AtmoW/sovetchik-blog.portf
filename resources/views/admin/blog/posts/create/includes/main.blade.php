@php
    /** @var \App\Models\Blog\BlogPost $post */
@endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            @php
                //TODO сделать проверку на опубликованность в эдите, скопипастить туда и удалить здесь )00)
            @endphp
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#item1">Основное</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#item2">Дополнительное</a>
                    </li>
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content">
                    <div class=" tab-pane fade show active" id="item1">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input type="text" class="form-control"
                                   id="title"
                                   name="title"
                                   minlength="3"
                                   required>
                        </div>

                        @php
                            //TODO список категорий
                        @endphp
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select name="category_id" id="category_id"
                                    class="form-control" required>
                                @foreach($categoryList as $category)
                                    <option value="{{$category->id}}">{{$category->id_title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="text">Статья</label>
                            <textarea name="text" id="text" rows="20" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="excerpt">Выдержка</label>
                            <textarea name="excerpt" id="excerpt"
                                      class="form-control" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="item2">
                        Некоторое содержимое для Item 2...
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
