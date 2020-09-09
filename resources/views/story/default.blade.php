@php($createRoute = 'story.create')
@extends('layouts.templates.default')
@section('title', ucwords('story'))
@section('subtitle', 'Default')
@section('filter_panel')
    @include('story.filter')
@endsection

@section('subcontent')
    <table class="responsive-table">
        <thead>
        <tr>
            <th>{{ __('label.action') }}</th>
            @foreach($fieldOnGrid as $header)
                <th>{{ strtoupper($header) }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
            @if(count($data))
                @foreach ($data as $d)
                    <tr>
                        <td>
                            {!! default_standard_controll('story',$d, true, $d->date_story) !!}
                        </td>
                        @foreach($fieldOnGrid as $header)
                            @if(in_array($header,['user_id']))
                                <td>{{ $d->users->name }}</td>
                            @elseif(in_array($header,['location']))
                                <td>{{ ${$header}[$d->$header] }}</td>
                            @elseif(in_array($header,['status']))
                                <td>{{ $story_status[is_null($d->deleted_at) ? '1' : '2'] }}</td>
                            @else
                                <td>{{ $d->$header }}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="{{ count($fieldOnGrid) + 1 }}">
                        No. Record(s) Found
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
