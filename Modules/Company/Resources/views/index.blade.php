@extends('layouts.master')
@section('header')
@foreach ($css_files as $css_file)
<link rel="stylesheet" href="{{ $css_file }}">
@endforeach
@endsection
@section('content')
<div style="padding: 20px" class="paper-card">
    {!! $output !!}
</div>
@endsection

@section('footer')
@foreach ($js_files as $js_file)
<script src="{{ $js_file }}"></script>
@endforeach
<script>

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

</script>   
@endsection
