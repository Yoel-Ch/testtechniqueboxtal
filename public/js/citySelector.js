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
