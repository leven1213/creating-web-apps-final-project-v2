<!-- Delete EOI form -->
<form id="eoiform2" method="post" autocomplete="off" action="delete-eoi.php"> 
    <label for="deleteEOI">Delete EOI/s</label>
    <br>
    <!-- Select dropdown -->
    <select name="deleteEOI" id="deleteEOI">
            <option value="">Choose job reference number</option>			
            <option id="jobrefnum1" value="7D1EG">7D1EG</option>
            <option id="jobrefnum2" value="3U1EN">3U1EN</option>
    </select>
    <br>
    <!-- Reset and Delete buttons -->
    <div class="field-left3">
        <input type="reset" value="Reset">
    </div>
    <div class="field-right3">
        <input type="submit" class="red-fill" value="Delete">
    </div>
</form>