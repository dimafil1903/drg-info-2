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
<div class="container ">
    <x-form class="form-control p-4" action="{{route('drg-people.store')}}" has-files>
        <div class="mb-3">
            <label for="name_ru" class="form-label">Ім'я (ru)</label>
            <x-input class="form-control" name="name_ru"/>
        </div>
        <div class="mb-3">
            <label for="name_lt" class="form-label">Ім'я (lt)</label>
            <x-input class="form-control" name="name_lt"/>
        </div>
        <div class="mb-3">
            <label for="date_of_birthday" class="form-label">Дата народження</label>

            <x-pikaday class="form-control" name="date_of_birthday"
                       placeholder="dd/mm/yyyy"
                       onkeyup="
        var v = this.value;
        if (v.match(/^\d{2}$/) !== null) {
            this.value = v + '/';
        } else if (v.match(/^\d{2}\/\d{2}$/) !== null) {
            this.value = v + '/';
        }"
                       maxlength="10"
            />
        </div>
        <div class="mb-3">
            <label for="passport" class="form-label">Паспорт</label>

            <x-input class="form-control" name="passport"/>
        </div>
        <div class="mb-3">
            <label for="passport_id" class="form-label">Паспорт Id</label>
            <x-input class="form-control" name="passport_id"/>

        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Фото</label>

            <x-input class="form-control" type="file" name="photo"/>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Адреса</label>

            <x-textarea class="form-control" name="address"/>
        </div>

        <div class="col-auto mb-3 row">
            <div class="col-6">
                Номера телефонів
                <label for="passport_id" class="visually-hidden">Телефон</label>
                <input type="text" class="form-control" name="phones[0]" wire:model="phone.0" placeholder="Телефон">
                @error('username.0') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="col-2">
                <button class="btn btn-primary mt-4" wire:click.prevent="add({{$i}})">+
                </button>
            </div>
        </div>

        {{-- Add Form --}}

        @foreach ($inputs as $key => $value)
            <div class="col-auto mb-3 row">
                <div class="col-6">
                    <label class="visually-hidden">Телефон</label>
                    <input type="text" class="form-control" name="phones[{{$value}}]" wire:model="phone.{{ $value }}"
                           placeholder="Телефон">
                    @error('username.') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
                <div class="col-2">
                    <button class="btn btn-light mt-1" wire:click.prevent="remove({{$key}})"> -
                    </button>
                </div>
            </div>
        @endforeach

        <div class="col-auto mb-3">
            <button type="submit" style="background-color: royalblue" class="btn btn-primary mb-3">
                Додати урода до бази даних
            </button>
        </div>
    </x-form>
</div>

