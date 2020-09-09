<html>
    <h1>LAPORAN KERJA HARIAN</h1>
    <h4>Group IT-AMN</h4>
    <table>
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">NIK</th>
            <th rowspan="2">Nama</th>
            <th rowspan="2">Lokasi Kerja</th>
            <th rowspan="2">Tanggal</th>
            <th colspan="2">Jam</th>
            <th rowspan="2">Status</th>
            <th rowspan="2">To Do List</th>
            <th rowspan="2">Pencapaian Pekerjaan Harian</th>
            <th rowspan="2">Kendala</th>
            <th rowspan="2">Keterangan</th>
        </tr>
        <tr>
            <th>Check In</th>
            <th>Check Out</th>
        </tr>
        @php($no = 1)
        @foreach($story as $item)
            @php($rowspan=count($item->story_detail))
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $item->users->nik }}</td>
                <td>{{ $item->users->name }}</td>
                <td>{{ $location[$item->location] }}</td>
                <td>{{ $item->date_story }}</td>
                <td>{{ $item->check_in }}</td>
                <td>{{ $item->check_out }}</td>
                <td>On Time (overtime to be discusion)</td>
                <td>
                    @if($rowspan > 1)
                        <ul class="browser-default">
                        @foreach($item->story_detail as $d)
                            <li>{{ $d->task }}</li>
                        @endforeach
                        </ul>
                    @elseif($rowspan == 1)
                        @foreach($item->story_detail as $d)
                            {{ $d->task }}
                        @endforeach
                    @endif
                </td>
                <td>
                    @if($rowspan > 1)
                        <ul>
                            @foreach($item->story_detail as $d)
                                <li>{{ $task_status[$d->status] }}</li>
                            @endforeach
                        </ul>
                    @elseif($rowspan == 1)
                        @foreach($item->story_detail as $d)
                            {{ $task_status[$d->status] }}
                        @endforeach
                    @endif
                </td>
                <td>
                    @if($rowspan > 1)
                        <ul>
                            @foreach($item->story_detail as $d)
                                <li>{{ $d->obstacle }}</li>
                            @endforeach
                        </ul>
                    @elseif($rowspan == 1)
                        @foreach($item->story_detail as $d)
                            {{ $d->obstacle }}
                        @endforeach
                    @endif
                </td>
                <td>
                    @if($rowspan > 1)
                        <ul>
                            @foreach($item->story_detail as $d)
                                <li>{{ $d->description }}</li>
                            @endforeach
                        </ul>
                    @elseif($rowspan == 1)
                        @foreach($item->story_detail as $d)
                            {{ $d->description }}
                        @endforeach
                    @endif
                </td>
            </tr>
            @php($no++)
        @endforeach
    </table>
</html>
