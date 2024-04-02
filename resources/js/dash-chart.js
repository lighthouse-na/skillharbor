import Chart from 'chart.js/auto';

const data = {
    labels: [
      'Advanced Digital',
      'Basic Digital',
      'Knowledge',
      'Behavioral',
      'Soft Skills'

    ],
    datasets: [{
      label: 'JCP',
      data: [90, 60, 80, 85, 80],
      fill: true,
      backgroundColor: 'rgba(159, 43, 104, 0.2)',
      borderColor: 'rgb(159, 43, 104)',
      pointBackgroundColor: 'rgb(159, 43, 104)',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgb(159, 43, 104)'
    },
    {
      label: 'ECP',
      data: [10,18,65,75,60],
      fill: true,
      backgroundColor: 'rgba(255, 87, 51, 0.2)',
      borderColor: 'rgb(255, 87, 51 )',
      pointBackgroundColor: 'rgb(255, 87, 51 )',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgb(255, 87, 51 )'
    }
]
};

const config = {
    type: 'radar',
    data: data,
    options: {
      elements: {
        line: {
          borderWidth: 3
        }
      }
    },
};
new Chart(
    document.getElementById('SkillGapChart'),
    config
);
