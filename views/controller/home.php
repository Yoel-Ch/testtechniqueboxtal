<select name="citySelector" id="citySelector">
    <option value="48-8588897.2-320041">Paris</option>
    <option value="39-9057136.116-3912972">Pékin</option>
</select>

<script>

    function setInitialSelection() {
        const pathParts = window.location.pathname.split('/');
        const latitude = pathParts[3];
        const longitude = pathParts[4];
        const formattedValue = latitude + '.' + longitude;

        const selectElement = document.querySelector('#citySelector');
        selectElement.value = formattedValue;

        if (selectElement.selectedIndex === -1) {
            selectElement.selectedIndex = 0;
        }
    }

    function setupLocationChangeOnSelection() {
        document.querySelector('#citySelector').addEventListener('change', function() {
            const [latitude, longitude] = this.value.split('.')
            if (latitude && longitude) {
                window.location.href = `${window.location.protocol}//${window.location.host}/home/show/${latitude}/${longitude}`;
            }
        });
    }

    window.onload = function() {
        setInitialSelection();
        setupLocationChangeOnSelection();
    };

</script>