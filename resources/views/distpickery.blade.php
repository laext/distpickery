<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>

    <div class="{{$viewClass['field']}} form-inline">

        @include('admin::form.error')
        <div id="{{ $id }}" {!! $attributes !!} class="col-sm-12 form-inline no-padding">
            <div class="col-sm-4" style="padding: 0 10px 0 0;">
                <select class="form-control" name="{{$name['province']}}" style="width:100%"></select>
            </div>
            <div class="col-sm-4" style="padding: 0 10px 0 0;">
                <select class="form-control" name="{{$name['city']}}" style="width:100%"></select>
            </div>
            <div class="col-sm-4 no-padding">
                <select class="form-control" name="{{$name['district']}}" style="width:100%"></select>
            </div>
        </div>
        @include('admin::form.help-block')

    </div>
</div>