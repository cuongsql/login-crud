
        <div class="text-center img-placeholder" onClick="triggerClick()"></div>
        <img onClick="triggerClick()" id="Display" height="210" witdh="210">
        
    <input type="file" name="profileImage" onChange="displayImage(this)" id="idImage" class="form-control">


<script type="text/javascript">
function triggerClick(e) {
    document.querySelector('#idImage').click();
}

function displayImage(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('#Display').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}
</script>