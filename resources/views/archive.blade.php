@foreach ( $archives as $archive )
<h4>{{$archive->name}}</h4>
<img src="{{Voyager::image($archive->photo)}}">
@endforeach
