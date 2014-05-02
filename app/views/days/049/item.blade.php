<div class="col-sm-3 uploaded-image">
    <div class="thumbnail">
        <img src="days/day044/{{$file->thumbnail}}" alt="{{$file->thumbnail}}">
        <div class="caption">
            <p class="delete-button" style="float:right">
                <a href="#" data-id="{{$file->id}}" onclick="deleteFile({{$file->id}})">[x]</a>
            </p>
            <p>{{$file->title}}</p>
        </div>
    </div>
</div>
