@extends('layouts.app')

@section('content')
    <div class="container">
          <h2>基本情報</h2>
          <table>
               <tr>
                    <th>会社名</th>
                    <td>{{ $basicInfo->company_name }}</td>
               </tr>
               <tr>
                    <th>住所</th>
                    <td>{{ $basicInfo->address }}</td>
               </tr>
               <tr>
                    <th>電話番号</th>
                    <td>{{ $basicInfo->telephone_number }}</td>
               </tr>
               <tr>
                    <th>メールアドレス</th>
                    <td>{{ $basicInfo->email_address }}</td>
               </tr>
               <tr>
                    <td colspan="2">
                        <a href="{{ route('basicInfo.edit', $basicInfo->id) }}" class="btn btn-primary">編集</a>
                    </td>
               </tr>
          </table>
    </div>
@endsection
