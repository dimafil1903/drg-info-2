<!-- Button trigger modal -->
@php Log::info("model",array($model)) @endphp

@if($model->enabled)
    <button class="btn btn-danger" wire:click="ban({{$model->id}})"> Забанити </button>
@else
    <button class="btn btn-success" wire:click="unban({{$model->id}})"> Розбанити </button>

@endif


