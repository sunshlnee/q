<select class="selectpicker{{ $errors->has('brand_id') ? ' is-invalid' : '' }}" name="brand_id">
    <option value="" disabled selected>Brand</option>
@foreach ($brands as $key => $value) 
    <option value="{{$key}}">{{$value}}</option>
@endforeach
</select>