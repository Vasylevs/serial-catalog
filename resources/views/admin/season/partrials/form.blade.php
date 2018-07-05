<input type="hidden" name="serial_id" value="{{$serial->id}}">
<div class="form-group">
    <label for="title">Название сезона</label>
    <input type="text" value="@if(isset($season->id)) {{$season->title}} @endif" name="title" class="form-control" id="title" aria-describedby="textHelp" placeholder="Введите название сериала" required>
</div>
<div class="form-group">
    @if(isset($season->id))
        <p>Картинка</p>
        <div class="row">
            <div class="col-12">
                <img style="width: 100px;" src="{{'/assets/img/'.$season->img}}" alt="">
            </div>
        </div>
    @endif
    <label for="img">Выберите картинку</label>
    <input type="file" name="img" class="form-control-file" id="img">
</div>
<div class="form-group">
    <label for="short_desc">Краткое описение</label>
    <textarea rows="3" type="text" name="short_desc" class="form-control" id="short_desc" aria-describedby="textHelp">
        @if(isset($season->id))
            {{$season->short_desc}}
        @endif
    </textarea>
</div>
<div class="form-group">
    <label for="date_start">Дата старта</label>
    <input type="date" value="@if(isset($season->id)){{trim($season->date_start)}}@endif" name="date_start" class="form-control" id="date_start">
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="Сохранить">
</div>