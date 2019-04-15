<select class="form-control selectpicker{{ $errors->has('sizes') ? ' is-invalid' : '' }}" multiple name="sizes[]">
        <option value="" disabled selected>Sizes</option>
    @foreach ($sizes as $key => $value) 
        <option value="{{$key}}">{{$value}}</option>
    @endforeach
</select> 
    