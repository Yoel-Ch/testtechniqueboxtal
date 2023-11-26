
document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('monGraphique').getContext('2d');

    const labels = Object.keys(donneesGraphique);
    const donnees = labels.map(label => {
        const info = donneesGraphique[label];
        return {
            x: label,
            y: info.iqa,
            backgroundColor: `rgb(${info.red}, ${info.green}, ${info.blue})`
        };
    });

    const data = {
        labels: labels,
        datasets: [{
            label: 'Indice de Qualité de l\'Air (IQA)',
            data: donnees,
            backgroundColor: donnees.map(d => d.backgroundColor)
        }]
    };

    const config = {
        type: 'line',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    };

    const monGraphique = new Chart(ctx, config);
});