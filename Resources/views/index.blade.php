@extends('admin.layouts.main')


@section('content')

    @component('content::components.table.index')
        @slot('items', $items)
        @slot('content', $content)
    @endcomponent

@endsection
