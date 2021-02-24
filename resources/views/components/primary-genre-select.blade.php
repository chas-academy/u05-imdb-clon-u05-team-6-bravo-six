<select class="form-control" name="genre_id">
@foreach (\App\Models\Genre::all() as $genre)
@if($genre->id == $selected)
<option selected value="{{$genre->id}}">{{$genre->name}}</option>
@else
<option value="{{$genre->id}}">{{$genre->name}}</option>
@endif
@endforeach
</select>