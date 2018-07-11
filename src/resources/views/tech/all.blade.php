<div class="box-body">
    <h3>Files details:</h3>

@foreach($allFiles as $file)

    @if($file->getFilename() != 'all.blade.php')
        <p>tech/<b>{{$file->getFilename()}}</b> | <a href="{{url('dashboard/tech/'. str_replace('.blade.php','',$file->getFilename()))}}">Preview</a></p>
    @endif

@endforeach

</div>