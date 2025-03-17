<!-- Change EOI form --> 
<form id="eoiform3" method="post" autocomplete="off" action="change-eoi.php">  
    <label for="change_table-1">Change EOI status</label>
    <!-- Input field -->
    <span id="change_EOI1"><input type="text" name="change_table-1" id="change_table-1" maxlength="40" size="10" placeholder="Enter applicant EOI, job reference no., or name"></span>
    <br>
    <!-- Select dropdown -->
    <select name="change_table-2" id="change_table-2" aria-labelledby="change_EOI1">
            <option value="">Choose status</option>			
            <option id="current" value="Current">Current</option>
            <option id="final" value="Final">Final</option>
    </select>
    <br>
    <!-- Reset and Amend buttons -->
    <div class="field-left3">
        <input type="reset" value="Reset">
    </div>
    <div class="field-right3">
    <input type="submit" value="Amend">
    </div>
</form>