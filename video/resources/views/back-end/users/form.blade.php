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
  @php  $input = "email"; @endphp
  <div class="col-md-6">
      <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Email address</label>
        <input type="email" class="form-control  @error('$input') is-invalid @enderror" name="{{$input}}" value="{{isset($row) ? $row->{$input} : ''}}">
        @error('$input')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
  </div>
</div>
<div class="row">
  @php $input= "password"; @endphp
  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">password</label>
      <input type="password" class="form-control  @error('$input') is-invalid @enderror" name="{{$input}}">
      @error('$input')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>
</div>
                     
                    