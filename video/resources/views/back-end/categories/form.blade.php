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
  @php  $input = "meta-keywords"; @endphp
  <div class="col-md-6">
      <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Meta-KeyWords</label>
        <input type="text" class="form-control  @error('$input') is-invalid @enderror" name="{{$input}}" value="{{isset($row) ? $row->{$input} : ''}}">
        @error('$input')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
  </div>
</div>
<div class="row">
  @php $input= "meta-desc"; @endphp
  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Description</label>
      <textarea name="{{$input}}"  cols="30" rows="10"  class="form-control" >{{isset($row) ? $row->{$input} : ''}}</textarea>
     
    </div>
  </div>
</div>
                     
                    