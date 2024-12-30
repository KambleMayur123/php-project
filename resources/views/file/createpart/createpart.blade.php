@extends('layouts.master')
@section('title')
    @lang('translation.file-selection')
@endsection

@section('css')
    <style>
        /* Container styling */
        .file-selection-container {
            margin: 50px auto;
            width: 80%;
            background-color: #f5f5f5;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        /* Table styling */
        .file-selection-table {
            width: 100%;
            border-collapse: collapse;
        }

        .file-selection-table th, .file-selection-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .file-selection-table th {
            background-color: #f0f0f0;
        }

        /* Search and filter section */
        .search-bar {
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
        }

        .search-bar input {
            padding: 5px;
            width: 300px;
        }

        /* Pagination controls */
        .pagination-controls {
            margin-top: 10px;
            text-align: center;
        }

        /* Button styling */
        .select-file-btn {
            background-color: #007bff;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .select-file-btn:hover {
            background-color: #0056b3;
        }
    </style>
@endsection

@section('content')
    <div class="file-selection-container">
        <h3>Search File for Attach</h3>
        
        <!-- Search bar -->
        <div class="search-bar">
            <select>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <!-- Add more years as options here -->
            </select>
            <input type="text" placeholder="Search...">
        </div>
        
        <!-- File selection table -->
        <table class="file-selection-table">
            <thead>
                <tr>
                    <th></th>
                    <th>File Number</th>
                    <th>Subject</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample rows, loop over your files data here -->
                <tr>
                    <td><input type="radio" name="file-selection"></td>
                    <td>N-1801/45/2010-D/te-Gov</td>
                    <td>Tour program for spot studies</td>
                </tr>
                <tr>
                    <td><input type="radio" name="file-selection"></td>
                    <td>N-1701/11/2010-te-Gov</td>
                    <td>Board Meeting of NISG</td>
                </tr>
                <tr>
                    <td><input type="radio" name="file-selection"></td>
                    <td>N-1703/11/2010-te-Gov</td>
                    <td>Draft copy of the note for Cabinet approval</td>
                </tr>
                <!-- Add more rows dynamically here -->
            </tbody>
        </table>
        
        <!-- Pagination controls (for future use, if needed) -->
        <div class="pagination-controls">
            << <span>1</span> 2 3 >> <!-- Add real pagination controls here -->
        </div>
        
        <!-- Select File button -->
        <button class="select-file-btn">Select File</button>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ URL::asset('build/js/pages/listjs.init.js') }}"></script>

    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@endsection
