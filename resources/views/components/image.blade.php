<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$model->id}}">
    @if($model->photo)
        <img width="100px" src="{{ $model->photo }}">
    @else
        <img width="100px" src="https://i.stack.imgur.com/l60Hf.png">

    @endif
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$model->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if($model->photo)
                    <img  src="{{ $model->photo }}">
                @else
                    <img  src="https://i.stack.imgur.com/l60Hf.png">

                @endif            </div>

        </div>
    </div>
</div>

