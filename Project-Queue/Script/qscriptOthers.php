<script>
function loadSecondDropdownOther() {
        var firstDropdown = document.getElementById("first-dropdown-other");
        var selectedValue = firstDropdown.value;
        var secondDropdown = document.getElementById("second-dropdown-other");
        
        secondDropdown.innerHTML = '<option value="">Select an option</option>';
        
        if (selectedValue !== "") {

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "getcategory.php?selectedValue=" + selectedValue, true);
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var options = JSON.parse(xhr.responseText);
                    
                    for (var i = 0; i < options.length; i++) {
                        var option = document.createElement("option");
                        option.value = options[i].value;
                        option.textContent = options[i].label;
                        secondDropdown.appendChild(option);
                    }
                }
            };
            
            xhr.send();
        }
    }
    
</script>