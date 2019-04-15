<select class="form-control selectpicker{{ $errors->has('brand_id') ? ' is-invalid' : '' }}" multiple name="fabrics[]">
        <option value="" disabled selected>Fabrics</option>
    @foreach ($fabrics as $key => $value) 
        <option value="{{$key}}">{{$value}}</option>
    @endforeach
</select> 
    