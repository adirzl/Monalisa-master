@if(session('success'))
{{--    <div class="card-alert card green lighten-5">--}}
{{--        <div class="card-content green-text">--}}
{{--            <p>{!! session('success') !!}</p>--}}
{{--        </div>--}}
{{--        <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">--}}
{{--            <span aria-hidden="true">×</span>--}}
{{--        </button>--}}
{{--    </div>--}}

    <div class="card-alert card gradient-45deg-light-blue-cyan">
        <div class="card-content white-text">
            <p>
                <i class="material-icons">info_outline</i> INFO : {!! session('success') !!}</p>
        </div>
        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif

@if(session('info'))
    <div class="card-alert card cyan lighten-5">
        <div class="card-content cyan-text">
            <p>{!! session('info') !!}</p>
        </div>
        <button type="button" class="close cyan-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif

@if(session('warning'))
    <div class="card-alert card orange lighten-5">
        <div class="card-content orange-text">
            <p>{!! session('warning') !!}</p>
        </div>
        <button type="button" class="close orange-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif

@if(session('error'))
    <div class="card-alert card red lighten-5">
        <div class="card-content red-text">
            <p>{!! session('error') !!}</p>
        </div>
        <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif

@if($errors->any())
    <div class="card-alert card purple lighten-5">
        <div class="card-content purple-text">
            <p>Following error(s) occured:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button type="button" class="close purple-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif
