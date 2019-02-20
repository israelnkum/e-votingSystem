@extends('layouts.app')
@section('content')
    <div id="checkbox_group">
        <label class="inline custom-control custom-checkbox block">
            <input type="checkbox"  name="Sports" id="Sports" class="custom-control-input cbox">
            <span class="custom-control-label ml-0">Sports</span>
        </label>

        <label class="inline custom-control custom-checkbox block">
            <input type="checkbox"  name="News" id="News" class="custom-control-input cbox">
            <span class="custom-control-label ml-0">News</span>
        </label>

        <label class="inline custom-control custom-checkbox block">
            <input type="checkbox"  name="Entertainment" id="Entertainment" class="custom-control-input cbox">
            <span class="custom-control-label ml-0">Entertainment</span>
        </label>

        <label class="inline custom-control custom-checkbox block">
            <input type="checkbox"  name="Music" id="Music" class="custom-control-input cbox">
            <span class="custom-control-label ml-0">Music</span>
        </label>
    </div>
    @endsection

