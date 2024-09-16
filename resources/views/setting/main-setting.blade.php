
@extends('layout.app')

@section('title', 'Leads')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Leads</title>
    <style>
        body {
            font-family: sans-serif;
        }

        .filter-container {
            width: 300px;
            margin: 0 auto;
        }

        .filter-title {
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .search-bar {
            margin-bottom: 10px;
        }

        .search-bar input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .filter-list {
            list-style: none;
            padding: 0;
        }

        .filter-list li {
            margin-bottom: 5px;
        }

        .filter-list input[type="checkbox"] {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="filter-container">
        <h2 class="filter-title">Filter Leads by</h2>
        <div class="search-bar">
            <input type="text" placeholder="Search">
        </div>

        <h3 class="filter-title">System Defined Filters</h3>
        <ul class="filter-list">
            <li>
                <input type="checkbox" id="touched-records">
                <label for="touched-records">Touched Records</label>
            </li>
            <li>
                <input type="checkbox" id="untouched-records">
                <label for="untouched-records">Untouched Records</label>
            </li>
            <li>
                <input type="checkbox" id="record-action">
                <label for="record-action">Record Action</label>
            </li>
            <li>
                <input type="checkbox" id="related-records-action">
                <label for="related-records-action">Related Records Action</label>
            </li>
            <li>
                <input type="checkbox" id="scoring-rules">
                <label for="scoring-rules">Scoring Rules</label>
            </li>
            <li>
                <input type="checkbox" id="locked">
                <label for="locked">Locked</label>
            </li>
            <li>
                <input type="checkbox" id="email-sentiment">
                <label for="email-sentiment">Email Sentiment</label>
            </li>
            <li>
                <input type="checkbox" id="latest-email-status">
                <label for="latest-email-status">Latest Email Status</label>
            </li>
            <li>
                <input type="checkbox" id="activities">
                <label for="activities">Activities</label>
            </li>
            <li>
                <input type="checkbox" id="notes">
                <label for="notes">Notes</label>
            </li>
            <li>
                <input type="checkbox" id="campaigns">
                <label for="campaigns">Campaigns</label>
            </li>
            <li>
                <input type="checkbox" id="next-best-experience">
                <label for="next-best-experience">Next best experience</label>
            </li>
            <li>
                <input type="checkbox" id="cadences">
                <label for="cadences">Cadences</label>
            </li>
        </ul>
    </div>
</body>
</html>
@endsection