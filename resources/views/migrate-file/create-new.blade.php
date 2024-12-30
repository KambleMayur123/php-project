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
    background-color: #fff;
    border: none;
    margin-left:500px;
    margin-top:100px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5)
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
    color: #000;
    border: 2px solid black;
    margin: 0 auto !important;
    float:center:
    
}

.nonsfs-label {
    display: block;
    margin-bottom: 5px;
    color: #000;
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
.browse{
 display:flex; 
align-items:center;
justify-content:center;
}
.browse input{
    width:200px;
    margin:5px;
}
.browse button{
    padding:3px 15px;
    margin:10px;
}
/* Modal container */
.modal {
    display: none; /* Hidden by default */
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 400px;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
}

/* Modal content box */
.modal-content {
    background-color: white;
    margin: 10% auto;
    padding: 0;
    border: 1px solid #888;
    width: 600px !important; /* Decreased modal width */
    border-radius: 4px;
    display: flex;
    flex-direction: column;
}

/* Modal Header */
.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: #f1f1f1;
    border-bottom: 1px solid #ddd;
}

/* Search bar styling */
#search {
    padding: 5px;
    width: 80%;
    border: 1px solid #ccc;
    border-radius: 3px;
}

/* Close button */
.close {
    font-size: 24px;
    cursor: pointer;
    padding: 0 10px;
}

/* Modal Body */
.modal-body {
    padding: 10px;
    display: flex;
    justify-content: space-between;
    height: 200px; /* Adjusted height */
    overflow-y: auto;
}

/* Sections table */
.sections {
    width: 100%;
}

.sections table {
    width: 100%;
    border-collapse: collapse;
}

.sections th,
.sections td {
    padding: 8px;
    text-align: left;
    border:none;
}

.sections th {
    background-color: #f1f1f1;
}

/* Radio Button Styles */
input[type="radio"] {
    margin-right: 8px;
}

/* Modal Footer */
.modal-footer {
    padding: 10px;
    background-color: #f1f1f1;
    text-align: center;
    border-top: 1px solid #ddd;
}

/* Import Button */
#importBtn {
    padding: 8px 16px;
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 4px;
}

#importBtn:hover {
    background-color: #0056b3;
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
                <input type="text" value="2012">
                <select>
                    <option>LF</option>
                </select>
            </div>
            <div class="browse">
               <label>Physical File No.*</label>
                <input type="text" placeholder="Choose">
               <button id="browseBtn">Browse</button>

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
                <label class="nonsfs-label" for="date">Opening Date</label>
              <input type="date" id="date" name="date">
                <label class="nonsfs-label">Remarks</label>
                <textarea></textarea>

                <label class="nonsfs-label">Previous Reference</label>
                <input type="text">

                <label class="nonsfs-label">Later Reference</label>
                <input type="text">
            </fieldset>

            <div class="nonsfs-buttons">
                <button type="button" class="nonsfs-button">
                    <i class="fas fa-file"></i> Work On File Later
                </button>
               <a href="./continueworking-electronic" class="nonsfs-button">
    <i class="fas fa-check"></i> Continue Working
</a>
    </div>
        </form>
    </div>
<div id="myModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <input type="text" id="search" placeholder="Search">
        </div>

        <!-- Sections and File Numbers Table -->
        <div class="modal-body">
            <div class="sections">
                <table>
                    <thead>
                        <tr>
                            <th>Sections</th>
                            <th>File Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>up6</td>
                            <td>
                                <label>
                                    <input type="radio" name="file" value="A-21022(1)/5/2008">
                                    A-21022(1)/5/2008
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="5">up7</td>
                            <td>
                                <label>
                                    <input type="radio" name="file" value="A-21022(21)/5/2008">
                                    A-21022(21)/5/2008
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input type="radio" name="file" value="A-21022(8)/5/2008">
                                    A-21022(8)/5/2008
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input type="radio" name="file" value="A-21022(17)/5/2008">
                                    A-21022(17)/5/2008
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input type="radio" name="file" value="A-21022(5)/5/2008">
                                    A-21022(5)/5/2008
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input type="radio" name="file" value="A-21022(19)/5/2008">
                                    A-21022(19)/5/2008
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Import Button -->
        <div class="modal-footer">
            <button id="importBtn">Import</button>
        </div>
    </div>
</div>

<script>
 // Get modal element
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("browseBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function(event) {
  event.preventDefault();  // Prevent form submission or any default action
  modal.style.display = "block";  // Show the modal
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";  // Close the modal
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";  // Close the modal if clicking outside
  }
}


</script>