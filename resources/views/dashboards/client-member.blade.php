@extends('layouts.app')
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

@section('content')
    <!-- Generate Short URL Section -->
    <div class="box">
        <h3>Generate Short URL</h3>
        <form action="{{ route('urls.store') }}" method="POST">
            @csrf
            <input type="text" name="original_url" placeholder="https://example.com" style="width: 70%;" required>
            <button type="submit" class="btn"
                style="background-color: #0356fc; color: #ffffff; padding: 6px 12px; margin-top: 2px; border-radius: 4px; cursor: pointer; border: none;">Generate</button>
        </form>
    </div>

    <!-- List Section -->
    <h3>Your Generated Short URLs</h3>
    <table>
        <thead>
            <tr>
                <th>Short URL</th>
                <th>Long URL</th>
                <th>Hits</th>
            </tr>
        </thead>
        <tbody>
            @foreach($urls as $url)
                <tr>
                    <td><a href="{{ url($url->short_code) }}" target="_blank">{{ url($url->short_code) }}</a></td>
                    <td>{{ Str::limit($url->original_url, 50) }}</td>
                    <td>{{ $url->hits }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $urls->links() }}
@endsection