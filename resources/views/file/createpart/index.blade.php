@extends('layouts.master')
@section('title')
    @lang('translation.list-js')
@endsection
@section('css')
<style>
.nonsfs-container {
    width: 700px !important;
    margin: 50px auto;
    padding: 20px;
    background-color: #9D4E81;
    border: 2px solid black;
    margin-left:500px;
    margin-top:100px;
}

.nonsfs-header {
    text-align: center;
    margin-bottom: 20px;
    color: #000;
}

.nonsfs-header h3, .nonsfs-header h4, .nonsfs-header p {
    margin: 5px 0;
    color:#000;
    font-weight:500;
}

.nonsfs-file-no-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.nonsfs-file-no-section input, .nonsfs-file-no-section select {
    width: 60px;
    padding: 5px;
    margin-right: 5px;
}

.nonsfs-required {
    color: red;
}

nonsfs-fieldset {
    border: 2px solid black;
    margin-bottom: 20px;
    padding: 10px;
    color: white;
}

.nonsfs-legend {
    background-color: #9D4E81;
    padding: 5px 10px;
    color: white;
    border: 2px solid black;
    margin: 0 auto !important;
    float:center:
    
}

.nonsfs-label {
    display: block;
    margin-bottom: 5px;
    color: white;
}

input[type="text"], textarea, select {
    width: 100%;
    padding: 5px;
    margin-bottom: 10px;
    border: 1px solid black;
    border-radius: 2px;
}

textarea {
    height: 60px;
    resize: none;
}

.nonsfs-buttons {
    display: flex;
    justify-content: space-between;
}

.nonsfs-button {
    background-color: #B75B8D;
    color: white;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    border-radius: 5px;
    display: flex;
    align-items: center;
}

.nonsfs-button i {
    margin-right: 5px;
}

.nonsfs-button:hover {
    background-color: #8A4572;
}
legend {
   
    width: 100%;
    padding: 0;
    margin-bottom: .5rem;
    font-size:15px !important;
    line-height: inherit;
    text-align:center !important;
}
</style>
    <div class="nonsfs-container">

        <form>
            <div class="nonsfs-file-no-section">
                <label>File No.: <span class="nonsfs-required">*</span></label>
                <input type="text" placeholder="Choose">
                <input type="text" placeholder="Choose">
                <input type="text" placeholder="Choose">
                <input type="text" placeholder="">
                <input type="text" value="2011">
                <select>
                    <option>ADM</option>
                </select>
            </div>

            <fieldset class="nonsfs-fieldset">
                <legend class="nonsfs-legend">Subject</legend>
                <label class="nonsfs-label">Description <span class="nonsfs-required">*</span></label>
                <textarea></textarea>

                <label class="nonsfs-label">Category</label>
                 <label class="nonsfs-label">Main</label>
                <input type="text" placeholder="Main Choose One">
                  <label class="nonsfs-label">Sub</label>
                <input type="text" placeholder="Sub Choose One">
            </fieldset>

            <fieldset class="nonsfs-fieldset">
                <legend class="nonsfs-legend">Other Details</legend>
                <label class="nonsfs-label">Classified</label>
                <select>
                    <option>Choose One</option>
                </select>

                <label class="nonsfs-label">Remarks</label>
                <textarea></textarea>

                <label class="nonsfs-label">Previous Reference</label>
                <input type="text">

                <label class="nonsfs-label">Later Reference</label>
                <input type="text">
            </fieldset>

            <div class="nonsfs-buttons">
               <a href="./createpartindex" class="nonsfs-button">
    <i class="fas fa-check"></i> create part 
</a>
    </div>
        </form>
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
