@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>

        @foreach($errors->all() as $error)
            {{ $error }}<br/>
        @endforeach
    </div>
@endif
<x-form class="form-control" action="{{route('users.store')}}">

    <div class="mb-3">
        <label for="name" class="form-label">Ім'я</label>
        <x-input name="name" id="name"  class="form-control"/>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <x-email class="form-control"/>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Пароль</label>

        <x-password class="form-control" id="password"/>
    </div>
    <div class="col-auto mb-3">
        <button type="submit" style="background-color: royalblue" class="btn btn-primary mb-3">Створити нового
            адміністратора
        </button>
    </div>
</x-form>
