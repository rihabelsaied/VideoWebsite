@csrf
<div class="row">
 @php $input = "name"; @endphp                     
  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">name</label>
      <input type="text" class="form-control  @error($input) is-invalid @enderror" name="{{$input}}" value="{{ isset($row) ? $row->{$input} : '' }}">
      @error($input)
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>
  
</div>
                     
                    