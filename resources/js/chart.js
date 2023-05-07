
import './bootstrap';
import * as Utils from'./Utils'
import Chart from 'chart.js/auto'
import 'chart.js/helpers';
let Stats = null;

var data = JSON.parse($('#data').val());
    console.log(data.revenue);
    const ctx = document.getElementById('chargeChart')
    console.log(ctx);
    const data2 = [
        { year: 2010, count: 10 },
        { year: 2011, count: 20 },
        { year: 2012, count: 15 },
        { year: 2013, count: 25 },
        { year: 2014, count: 22 },
        { year: 2015, count: 30 },
        { year: 2016, count: 28 },
      ];
      console.log(data.entreprise);
    
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
 
  const DATA_COUNT = 3;
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