<input type="hidden" name="season_id" value="{{$season->id}}">
<div class="form-group">
    <label for="title">Название серии</label>
    <input type="text" value="@if(isset($serie->id)) {{$serie->title}} @endif" name="title" class="form-control" id="title" aria-describedby="textHelp" placeholder="Введите название сериала" required>
</div>
<div class="form-group">
    @if(isset($serie->id))
        <p>Картинка</p>
        <div class="row">
            <div class="col-12">
                <img style="width: 100px;" src="{{'/assets/img/'.$serie->img}}" alt="">
            </div>
        </div>
    @endif
    <label for="img">Выберите картинку</label>
    <input type="file" name="img" class="form-control-file" id="img">
</div>
<div class="form-group">
    @if(isset($serie->id))
        <p>Видео</p>
        <div class="row">
            <div class="col-12">
                <video width="200" height="150" controls="controls" poster="{{'/assets/img/'.$serie->img}}">
                    <source src="{{'/assets/video/'.$serie->video}}">
                    Элемент video не поддерживается вашим браузером.
                </video>
            </div>
        </div>
    @endif
    <label for="video">Выберите видео</label>
    <input type="file" name="video" class="form-control-file" id="video" accept="video/*">
</div>
<div class="form-group">
    <label for="short_desc">Краткое описение</label>
    <textarea rows="3" type="text" name="short_desc" class="form-control" id="short_desc" aria-describedby="textHelp">
        @if(isset($serie->id))
            {{$serie->short_desc}}
        @endif
    </textarea>
</div>
<div class="form-group">
    <label for="date_start">Дата старта</label>
    <input type="date" value="@if(isset($serie->id)){{trim($serie->date_start)}}@endif" name="date_start" class="form-control" id="date_start">
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="Сохранить">
</div>