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
    <x-form class="form-control p-4" action="{{route('drg-cars.store')}}" has-files>
        <div class="mb-3">
            <label for="number" class="form-label">Номер</label>
            <x-input style="width: 60px; height: 30px;text-align: center" name="left_letters" maxlength="2" placeholder="__"/>
            <x-input style="width: 75px;height: 30px;text-align: center" name="number" pattern="[0-9]+" maxlength="4" placeholder="____"/>
            <x-input style="width: 60px;height: 30px;text-align: center" name="right_letters" maxlength="2" placeholder="__"/>

        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Фото</label>

            <x-input class="form-control" type="file" name="photo"/>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Примітка</label>

            <x-textarea class="form-control" name="description"/>
        </div>


        {{-- Add Form --}}

        <div class="col-auto mb-3">
            <button type="submit" style="background-color: royalblue" class="btn btn-primary mb-3">
                Додати до бази даних
            </button>
        </div>
    </x-form>
</div>

