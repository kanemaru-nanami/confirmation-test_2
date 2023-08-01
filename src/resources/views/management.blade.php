@extends('layouts.app')
<style>
    svg.w-5.h-5 {
        width: 30px;
        height: 30px;
    }
</style>
@section('css')
<link rel="stylesheet" href="{{ asset('css/management.css') }}">
@endsection

@section('content')

<div class="search-form__content">
    <div class="search-form__heading">
        <h2>管理システム</h2>
    </div>
    <form class="search-form" action="/management/search" method="get">
        @csrf
        <div class="search-form__group">
            <div class="search-form__group-title">
                <span class="search-form__label">お名前</span>
            </div>
            <div class="search-form__group-item">
                <input class="search-form__item-input" type="text" name="fullname" value="{{ old('fullname') }}" /><br>
            </div>
        </div>
        <div class="search-form__group">
            <div class="search-form__group-title">
                <span class="search-form__label">性別</span>
            </div>
            <div class="search-form__group-item">
                <ul class="form__input--list">
                    <li><label><input type="radio" name="gender" id="all" value="全て" checked >全て　</label></li>
                    <li><label><input type="radio" name="gender" id="male" value="男性" >男性　</label></li>
                    <li><label><input type="radio" name="gender" id="female" value="女性" >女性</label></li>
                </ul>
            </div>
        </div>
        <div class="search-form__group">
            <div class="search-form__group-title">
                <span class="search-form__label">登録日</span>
            </div>
            <div class="search-form__group-item">
                <input class="search-form__item-input" type="date" name="created_at" value="{{ old('created_at') }}" />
            </div>
            -
            <div class="search-form__group-item">
                <input class="search-form__item-input" type="date" name="created_at" value="{{ old('created_at') }}" />
            </div>
        </div>
        <div class="search-form__group">
            <div class="search-form__group-title">
                <span class="search-form__label">メールアドレス</span>
            </div>
            <div class="search-form__group-item">
                <input class="search-form__item-input" type="email" name="email" value="{{ old('email') }}" />
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-search" type="submit">検索</button>
        </div>
        <div class="reset__button">
            <input class="reset__button-input" type="reset">リセット</input>
        </div>
    </form>
    <div class="management-table">
        <table class="table" style="width: 1000px; max-width: 0 auto;">
            <tr class="table-info">
                <th scope="col" class="table-info__item">ID</th>
                <th scope="col" class="table-info__item">お名前</th>
                <th scope="col" class="table-info__item">性別</th>
                <th scope="col" class="table-info__item">メールアドレス</th>
                <th scope="col" class="table-info__item">ご意見</th>
            </tr>
            ＠foreach($contacts as $contact)
            <tr class="management-table__row">
                <td class="management-table__item">
                    <form class="info-form">
                        <div class="info-form__item">
                            <p class="info-form__item-input">{{ $contact['id'] }}</p>
                        </div>
                    </form>
                </td>
                <td class="management-table__item">
                    <form class="info-form">
                        <div class="info-form__item">
                            <p class="info-form__item-input">{{ $contact['fullname'] }}</p>
                        </div>
                    </form>
                </td>
                <td class="management-table__item">
                    <form class="info-form">
                        <div class="info-form__item">
                            <p class="info-form__item-input">{{ $contact['gender'] }}</p>
                        </div>
                    </form>
                </td>
                <td class="management-table__item">
                    <form class="info-form">
                        <div class="info-form__item">
                            <p class="info-form__item-input">{{ $contact['email'] }}</p>
                        </div>
                    </form>
                </td>
                <td class="management-table__item">
                    <form class="info-form">
                        <div class="info-form__item">
                            <p class="info-form__item-input">{{ Str::limit('{{ $contact['opinion'] }}', 25, '...') }}</p>
                        </div>
                    </form>
                </td>
                <td class="management-table__item">
                    <form class="delete-form" action="/contacts/delete" method="POST">
                        @method('DELETE')
                        @csrf
                        <div class="delete-form__button">
                            <input type="hidden" name="id" value="{{ $todo['id'] }}">
                            <button class="delete-form__button-submit" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $contacts->links() }}
    </div>
</div>
@endsection