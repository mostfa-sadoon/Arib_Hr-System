<input type="hidden" name="id" id="id" value="{{$TaskStatus->id}}">
<div class="row">
    @foreach (config('translatable.locales') as $locale)
        <div class="col-6">
            <label>{{ __('system.'.$locale.'.name') }}</label>
            <input class="form-control" id="{{$locale}}_name" name="{{$locale}}[name]" value="{{$TaskStatus->translateOrNew($locale)->name}}" type="text" required>
        </div>

    @endforeach

    <input type="submit" class="btn btn-primary m-3" value="{{__('system.edit')}}">

</div>
