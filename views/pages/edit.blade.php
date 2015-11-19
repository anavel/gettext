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
<div class="box">
    <h1>Gettext editor</h1>
</div>
@stop
