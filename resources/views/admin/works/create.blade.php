@extends('adminlte::page')

@section('title', '作品登録')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/create_movie.css') }}">
@stop

@section('content_header')
<h1>作品登録</h1>
@stop

@section('content')

@if(session('success'))
<div style="color: green;">
    {{ session('success') }}
</div>
@endif

<form method="POST" action="{{ route('admin.works.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-grid">

        <div class="label">タイトル</div>
        <div class="input"><input type="text" name="work_name"></div>

        <div class="label">カテゴリ</div>
        <div class="input">
            <select name="category_id">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="label">ジャンル</div>
        <div class="input checkbox-group">
            @foreach($genres as $genre)
            <label>
                <input type="checkbox" name="genre_ids[]" value="{{ $genre->id }}">
                {{ $genre->name }}
            </label>
            @endforeach
        </div>

        <div class="label">作品イメージ</div>
        <div class="input">
            <input type="file" id="image-input" name="image_path">
            <img id="preview" width="200" style="display:none;">
            <button type="button" id="remove-image" style="display:none;">削除</button>
        </div>

        <div class="label">公開情報</div>
        <div class="input inline-group">
            <div>
                <label>年</label>
                <input type="number" name="release_year">
            </div>

            <div>
                <label>月</label>
                <input type="number" name="release_month" min="1" max="12">
            </div>

            <div>
                <label>日</label>
                <input type="number" name="release_day" min="1" max="31">
            </div>

            <div>
                <label>上映時間（分）</label>
                <input type="number" name="duration">
            </div>
        </div>

        <div class="label">制作国</div>
        <div class="input">
            <select name="country_id">
                @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="label">監督</div>
        <div class="input">
            <input type="text" id="director-input" size="40">
            <button type="button" id="add-director-btn">追加</button>
            <ul id="director-suggestions"></ul>

            <table border="1" id="director-table" style="display: none;">
                <thead>
                    <tr>
                        <th>監督名</th>
                        <th>順序</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody id="director-list"></tbody>
            </table>
        </div>

        <div class="label">原作</div>
        <div class="input">
            <input type="text" id="original-input" size="40">
            <button type="button" id="add-original-btn">追加</button>
            <ul id="original-suggestions"></ul>

            <table border="1" id="original-table" style="display: none;">
                <thead>
                    <tr>
                        <th>原作者</th>
                        <th>順序</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody id="original-list"></tbody>
            </table>
        </div>

        <div class="label">主題歌</div>
        <div class="input">
            <input type="text" id="song-input" size="40">
            <button type="button" id="add-song-btn">追加</button>
            <ul id="song-suggestions"></ul>

            <table border="1" id="song-table" style="display: none;">
                <thead>
                    <tr>
                        <th>歌手名</th>
                        <th>順序</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody id="song-list"></tbody>
            </table>
        </div>

        <div class="label">キャスト名</div>
        <div class="input">
            <input type="text" id="cast-input" size="40">
            <button type="button" id="add-cast-btn">追加</button>
            <ul id="cast-suggestions"></ul>
            <table border="1" id="cast-table" style="display: none;">
                <thead>
                    <tr>
                        <th>キャスト名</th>
                        <th>役名</th>
                        <th>順序</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody id="cast-list"></tbody>
            </table>
        </div>

        <div class="label">配給会社</div>
        <div class="input">
            <input type="text" id="maker-input" name="maker_name" size="40">
            <ul id=maker-suggestion></ul>
        </div>

        <div class="label">あらすじ</div>
        <div class="input">
            <textarea name="description" rows="4"></textarea>
        </div>

        <div class="label">賞</div>
        <div class="input checkbox-group">
            @foreach($awards as $award)
            <label>
                <input type="checkbox" name="award_ids[]" value="{{ $award->id }}">
                {{ $award->name }}
            </label>
            @endforeach
        </div>

        <div class="label">配信サービス</div>
        <div class="input checkbox-group">
            @foreach($subscriptions as $subscription)
            <label>
                <input type="checkbox" name="subscription_ids[]" value="{{ $subscription->id }}">
                {{ $subscription->name }}
            </label>
            @endforeach

        </div>

    </div>

    <button type="submit" onclick="return confirm ('登録しますか？')">登録</button>

</form>

@stop

@section('js')
<script src="{{ asset('js/cast.js') }}"></script>
<script src="{{ asset('js/image.js') }}"></script>
@stop