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
    <div class="box">
        <h3>Invite New Client (Company)</h3>
        <form action="{{ route('invite.store') }}" method="POST">
            @csrf
            <input type="text" name="company_name" placeholder="Company Name" required>
            <input type="text" name="name" placeholder="Admin Name" required>
            <input type="email" name="email" placeholder="Admin Email" required>
            <button type="submit"
                style="background-color: #0356fc; color: #ffffff; padding: 6px 12px; margin-top: 2px; border-radius: 4px; cursor: pointer; border: none;">
                Send Invitation
            </button>
        </form>
    </div>

    <h3>Clients Overview</h3>
    <table>
        <thead>
            <tr>
                <th>Client Name</th>
                <th>Users</th>
                <th>Total URLs</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->users_count }}</td>
                    <td>{{ $company->urls_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3 style="margin-top: 30px;">Global URL List</h3>
    <table>
        <thead>
            <tr>
                <th>Short URL</th>
                <th>Original URL</th>
                <th>Company</th>
                <th>Hits</th>
            </tr>
        </thead>
        <tbody>
            @foreach($urls as $url)
                <tr>
                    <td><a href="{{ url($url->short_code) }}" target="_blank">{{ url($url->short_code) }}</a></td>
                    <td>{{ Str::limit($url->original_url, 30) }}</td>
                    <td>{{ $url->company->name ?? 'N/A' }}</td>
                    <td>{{ $url->hits }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $urls->links() }}
@endsection