@extends('adoadomin::layouts.master')

@section('body-classes')
    sidebar-collapse
@stop

@section('content-header')
<h1>
    {{ config('adoadomin-gettext.name') }}
    <small>{{ trans('adoadomin-gettext::messages.edit_title') }}</small>
</h1>
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{{ route('adoadomin-gettext.edit') }}"><i class="fa fa-language"></i> {{ config('adoadomin-gettext.name') }}</a></li>
    <li class="active">{{ trans('adoadomin-gettext::messages.edit_title') }}</li>
</ol>
@stop

@section('content')
<div class="nav-tabs-custom">
    <form method="post" action="{{ route('adoadomin-gettext.update', $current) }}" id="gettext-form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT">

        <ul class="nav nav-tabs">
            @foreach ($locales as $locale)
            <li {!! ($locale === $current) ? 'class="active"' : '' !!}><a href="{{ route(Route::currentRouteName(), $locale) }}">{{ $locale }}</a></li>
            @endforeach

            <li class="pull-right">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> {{ trans('adoadomin-gettext::messages.save_button') }}</button>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active">
                <div class="well">
                    <div class="row">
                        <div class="col-lg-8">
                            <input type="search" placeholder="Search (min. 3 chars)..." class="form-control" />
                        </div>

                        <div class="col-lg-4">
                            <div class="btn-group pull-right" data-toggle="buttons">
                                <label class="btn">
                                    <input type="checkbox" data-gettext="empty" autocomplete="off" /> Only empty
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <?php $i = 0; ?>

                @foreach ($entries as $entry)
                <div class="form-group gettext-group">
                    <label for="entry-{{ ++$i }}">{{{ $entry->getOriginal() }}}</label>

                    @if ($entry->lines)
                    <a href="#" class="fa fa-info-circle show-references"></a>

                    <ul class="list-unstyled references text-muted">
                        <li>{!! implode('</li><li>', $entry->lines) !!}</li>
                    </ul>
                    @endif

                    <textarea id="entry-{{ $i }}" name="translations[{{ $entry->getOriginal() }}]" class="form-control">{{ $entry->getTranslation() }}</textarea>
                </div>
                @endforeach

                <div class="box-footer clearfix">
                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> {{ trans('adoadomin-gettext::messages.save_button') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>
@stop

@section('footer-scripts')
    @parent

    <script src="{{ asset('vendor/adoadomin-gettext/js/app.js') }}" type="text/javascript"></script>
@stop