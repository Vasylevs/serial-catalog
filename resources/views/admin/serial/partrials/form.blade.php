<div class="form-group">
    <label for="title">Название сериала</label>
    <input type="text" value="@if(isset($serial->id)) {{$serial->title}} @endif" name="title" class="form-control" id="title" aria-describedby="textHelp" placeholder="Введите название сериала" required>
</div>
<div class="form-group">
    @if(isset($serial->id))
    <p>Картинка</p>
    <div class="row">
        <div class="col-12">
            <img style="width: 100px;" src="{{'/assets/img/'.$serial->img}}" alt="">
        </div>
    </div>
    @endif
    <label for="img">Выберите картинку</label>
    <input type="file" name="img" class="form-control-file" id="img">
</div>
<div class="form-group">
    <label for="short_desc">Краткое описение</label>
    <textarea rows="3" type="text" name="short_desc" class="form-control" id="short_desc" aria-describedby="textHelp">
        @if(isset($serial->id))
            {{$serial->short_desc}}
        @endif
    </textarea>
</div>
<div class="form-group">
    <label for="all_desc">Полное описение</label>
    <textarea rows="5" type="text"name="all_desc" class="form-control" id="all_desc" aria-describedby="textHelp">
        @if(isset($serial->id))
            {{$serial->all_desc}}
        @endif

    </textarea>
</div>
<div class="form-group">
    <label for="director">Режисер</label>
    <input type="text" value="@if(isset($serial->id)) {{$serial->all_desc}} @endif" name="director" class="form-control" id="director" aria-describedby="textHelp" placeholder="Введите режисера сериала">
</div>
<div class="form-group">
    <label for="actors">Актеры</label>
    <input type="text" value="@if(isset($serial->id)) {{$serial->all_desc}} @endif" name="actors" class="form-control" id="actors" aria-describedby="textHelp" placeholder="Введите актеров сериала">
</div>
<div class="form-group">
    <label for="date_start">Дата старта</label>
    <input type="date" value="@if(isset($serial->id)){{trim($serial->date_start)}}@endif" name="date_start" class="form-control" id="date_start">
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="Сохранить">
</div>
