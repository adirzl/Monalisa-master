<style>
    th{
        border: 1px solid black;
    }

    td{
        border: 1px solid black;
    }
</style>
<h1 style="width:100%;alignment:center">REPORT PER-USER</h1>
<h4>USER : {{ $param }}</h4>

@foreach ($data as $item)

    <table style="margin-top:25px;width:100%">
        <tr>
            <td style="width:25%">STORY DATE : {{ $item->date_story }}</td>
            <td style="width:25%">CHECK IN : {{ $item->check_in }}</td>
            <td style="width:25%">CHECK OUT : {{ $item->check_out }}</td>
            <td style="width:25%">LOCATION : {{ $location[$item->location] }}</td>
        </tr>
    </table>

    <table style="width:100%">
        <tr>
            <th style="width:33%">TASK</th>
            <th style="width:33%">STATUS</th>
            <th style="width:33%">DESCRIPTION</th>
        </tr>
        @foreach($item->story_detail as $detailItem)
            <tr>
                <td>{{ $detailItem->task }}</td>
                <td>{{ $task_status[$detailItem->status] }}</td>
                <td>{{ $detailItem->description }}</td>
            </tr>
        @endforeach
    </table>
@endforeach
