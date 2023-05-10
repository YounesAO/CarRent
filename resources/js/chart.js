
import './bootstrap';
import * as Utils from'./Utils'
import Chart from 'chart.js/auto'
import 'chart.js/helpers';
let Stats = null;
if($('#data').val()!=null){
var data = JSON.parse($('#data').val());
    const ctx = document.getElementById('chargeChart')    
      var c= new Chart(
        ctx,
        { 
          type: 'bar',
          data: {
          labels:data.entreprise.map(row => row.label),
           datasets: [
           
                {
                label: 'Charge ',
                data: data.entreprise.map(row => row.data)
                }
            ]
          }
        }
      );
  
      
  //chart de revuen et charge par voitures 
 
const DATA_COUNT = Object.keys(data.revenue).length;
;
const NUMBER_CFG = {count: DATA_COUNT, min: -100000000, max: 100000000};

const labels = data.revenue.map(row => row.voiture);
const dataChart = {
  labels: labels,
  datasets: [
    {
      label: 'Revenues',
      data: data.revenue.map(row => row.montant),
      borderColor:'rgb(86, 255, 90)',
      backgroundColor:'rgb(86, 255, 90, 0.5)',
    },
    {
      label: 'Charges',
      data: data.charge.map(row => -row.montant),
      borderColor:     'rgb(255, 205, 86)'      ,
      backgroundColor: 'rgb(255, 205, 86, 0.5)',
    }
  ]
};

const config = {
    type: 'bar',
    data: dataChart,
    options: {
      indexAxis: 'y',
      // Elements options apply to all of the options unless overridden in a dataset
      // In this case, we are setting the border of each horizontal bar to be 2px wide
      elements: {
        bar: {
          borderWidth: 2,
        }
      },
      responsive: true,
      plugins: {
        legend: {
          position: 'right',
        },
        title: {
          display: true,
          text: 'Chart des revunues et charges par voitures'
        }
      }
    },
  };
var c1= new Chart(
    $('#revenuechart'),config
  );
}
  //chart l'accuiel
  var stats = JSON.parse($('#stats').val());

  const DATA_COUNT1 = Object.keys(stats).length;

  const NUMBER_CFG1 = {count: DATA_COUNT1, min:0, max: 100};
  
  const labels1 = stats.map(row => row.date);
  const data1 = {
    labels: labels1,
    datasets: [
      {
        label: 'Reservation',
        data: stats.map(row => row.number),
       
      },
      {
        label: 'Renevues',
        data: stats.map(row => row.revenues),
       
      },
      
    ]
  };
  const config2= {
    type: 'line',
    data: data1,
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        tooltip: {
          callbacks: {
              label: function(context) {
                  let label = context.dataset.label || '';

                  if (label) {
                    console.log(label);

                      label += ': ';
                  }
                  if (context.parsed.y !== null  ) {
                    if(label!='Reservation: ')
                      label += new Intl.NumberFormat('en-US', { style: 'currency', currency: 'MAD' }).format(context.parsed.y);
                    else
                    label += new Intl.NumberFormat('en-US').format(context.parsed.y);
                    }
                  return label;
              }
          }
      },
        title: {
          display: true,
          text: 'Chart.js Line Chart'
        }
      }
    },
  };


  var c3= new Chart(
    $('#line-chart'),config2
  ); 