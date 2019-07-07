<table class="table table-hover">
    <thead>
    <tr>
        @foreach($content->getColumns() as $column)
            <th>{{ $content::trans("rows.{$column}") }}</th>
        @endforeach
    </tr>
    </thead>

    <tbody>

    @foreach($items as $item)
        <tr>
            @foreach($content->getColumns() as $key => $column)
                <td>
                    {!! $content->getByColumn($column, $item) !!}
                </td>
            @endforeach
        </tr>
    @endforeach

    </tbody>
</table>

{{ $items->links() }}