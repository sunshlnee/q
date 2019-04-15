<select class="form-control selectpicker{{ $errors->has('colors') ? ' is-invalid' : '' }}" multiple name="colors[]">
        <option value="" disabled selected>Colors</option>
    @foreach ($colors as $key => $value) 
        <option value="{{$key}}">{{$value}}</option>
    @endforeach
</select> 
    