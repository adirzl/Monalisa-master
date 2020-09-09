@if(session('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Alert!</h5>
    INFO : {!! session('success') !!}
</div>
@endif

@if(session('info'))
<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-info"></i> Alert!</h5>
    INFO : {!! session('info') !!}
</div>
@endif

@if(session('warning'))
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
    INFO : {!! session('warning') !!}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
    INFO : {!! session('warning') !!}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger color-palette alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
    <p>Following error(s) occured:</p>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif