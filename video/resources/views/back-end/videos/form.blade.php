{{ csrf_field() }}
<div class="row">
    @php $input = "name"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Name</label>
            <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}"
                   class="form-control @error($input) is-invalid @enderror">
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php $input = "meta_keywords"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta keywords</label>
            <input type="text" name="{{$input}}" value="{{ isset($row) ? $row->{$input} : '' }}"
                   class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    @php $input = "image"; @endphp
    <div class="col-md-6">
        <div >
            <label >Video image</label>
            <input type="file" name="{{$input}}">
            @error($input)
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
</div>
    @php $input = "youtube"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Youtube url</label>
            <input type="url" name="{{$input}}" value="{{ isset($row) ? $row->{$input} : '' }}"
                   class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    @php $input = "published"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Status</label>
            <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
                <option value="1" {{ isset($row) && $row->{$input} == 1 ? 'selected'  :'' }}>published</option>
                <option value="0" {{ isset($row) && $row->{$input} == 0 ? 'selected'  :'' }}>hidden</option>
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>
    @php $input = "cat_id"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Category</label>
            <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
                @foreach($categories  as $caegory)
                    <option value="{{ $caegory->id }}" {{ isset($row) && $row->{$input} == $caegory->id ? 'selected'  :'' }}>{{ $caegory->name }}</option>
                @endforeach
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    @php $input = "desc"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Description</label>
            <textarea name="{{ $input }}"  cols="30" rows="5" class="form-control @error($input) is-invalid @enderror">{{ isset($row) ? $row->{$input} : '' }}</textarea>
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>
    @php $input = "meta_desc"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta Description</label>
            <textarea name="{{ $input }}"  cols="30" rows="2" class="form-control @error($input) is-invalid @enderror">{{ isset($row) ? $row->{$input} : '' }}</textarea>
            @error($input)
            <span class="invalid-feedback" role="alert">

                <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    @php $input = "skils[]"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Skils</label>
            <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror" multiple>
                @foreach($skils  as $skil)
                    <option value="{{ $skil->id }}" {{ in_array( $skil->id,$selectedSkils) ? 'selected':''}}>{{ $skil->name }}</option>
                       
                @endforeach
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>
    @php $input = "tags[]"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Tags</label>
            <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror" multiple>
                @foreach($tags  as $tag)
                    <option value="{{ $tag->id }}" {{in_array($tag->id,$selectedTags) ? 'selected':''}} >{{ $tag->name }}</option>
                       
                @endforeach
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>
</div>

  