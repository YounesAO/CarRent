
import './bootstrap';
import * as Utils from'./Utils'
import Chart from 'chart.js/auto'
import 'chart.js/helpers';
let Stats = null;
if($('#data').val()!=undefined){
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
 if($('#stats').val()!=undefined){
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
      }
      }
    },
  };


  var c3= new Chart(
    $('#line-chart'),config2
  ); 
 }

  /*
   pie chart chaque voiture avec reservations 
  */
if($('#stats-reservation').val()!=undefined) {
  var stats1 = JSON.parse($('#stats-reservation').val());
  const DATA_COUNT2 = Object.keys(stats1).length;

  const NUMBER_CFG2 = {count: DATA_COUNT2, min:0, max: 100};
  
  const labels2 = stats1.map(row => row.voiture);
  const data2 = {
    labels: labels2,
    datasets: [
      {
        label: 'Réservation',
        data:  stats1.map(row => row.nbReservation),
       
      },
    
      
    ],
  };
  const config3 = {
    type: 'doughnut',
    data: data2,
    options: {
      responsive: true,
      cutout:'70%',

      plugins: {
        emptyDoughnut: {
          color: 'rgb(0,0,0)',
          width: 2,
          radiusDecrease: 20
        },
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'Réservations pour ce mois'
        }
      }
    },
  };
  var c4= new Chart(
    $('#pieChart'),config3
  ); 
}
   
//chart de duree reservation  
if($('#duree').val()!=undefined){
const data3 = JSON.parse($('#duree').val());
const DATA_COUNT3 = Object.keys(data3).length;
;
const NUMBER_CFG3 = {count: DATA_COUNT3, min: -100000000, max: 100000000};

const labels3 = data3.map(row => row.duree+" jrs");
const dataChart3 = {
  labels: labels3,
  datasets: [
    {
      label: 'Durée par reservation',
      data: data3.map(row => row.number),
      borderColor:'rgb(86, 255, 90)',
      backgroundColor:'rgb(86, 255, 90, 0.5)',
    },
    
  ]
};
const config4 = {
    type: 'bar',
    data: dataChart3,
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
    $('#bar-duree'),config4
  );
}

//reservation client 
if($("#clientReservation").val()!=undefined){
  const dataClient = JSON.parse($("#clientReservation").val());
  const DATA_COUNTclient= Object.keys(dataClient).length;

  const NUMBER_CFGclient = {count: DATA_COUNTclient, min:0, max: 100};
  
  const labelsclient = dataClient.map(row => row.date);
  const dataReserv = {
    labels: labelsclient,
    datasets: [
      {
        label: 'Renevues',
        data: dataClient.map(row => row.montant),
       
      },
      {
        label: 'Durée',
        data: dataClient.map(row => row.duree),
       
      },
      
    ]
  };
  const configclient= {
    type: 'line',
    data: dataReserv,
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
                      label += ': ';
                  }
                  if (context.parsed.y !== null  ) {
                    if(label!='Durée: '){
                      label += new Intl.NumberFormat('en-US', { style: 'currency', currency: 'MAD' }).format(context.parsed.y);
                    }else{
                    
                    label += new Intl.NumberFormat('en-US').format(context.parsed.y);
                    label +=" jrs"
                    }
                  }
                  return label;
              }
          }
      }
      }
    },
  };


  var clientChart= new Chart(
    $('#client-chart'),configclient
  ); 
  console.log(JSON.stringify(configclient));

}
  /*
   pie chart chaque voiture avec reservations 
  */
   if($('#pieData').val()!=undefined) {
    var pieData = JSON.parse($('#pieData').val());
    const DATA_COUNTpieData = Object.keys(pieData).length;
  
    const NUMBER_CFGpieData = {count: DATA_COUNTpieData, min:0, max: 100};
    
    const labelspieData = pieData.map(row => row.voiture);
    const datapieData = {
      labels: labelspieData,
      datasets: [
        {
          label: 'Réservation',
          data:  pieData.map(row => row.stats),
         
        },
      
        
      ],
    };
    const configpieData = {
      type: 'doughnut',
      data: datapieData,
      options: {
        responsive: true,
        cutout:'70%',
  
        plugins: {
          emptyDoughnut: {
            color: 'rgb(0,0,0)',
            width: 2,
            radiusDecrease: 20
          },
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: 'Voitures réservées'
          }
        }
      },
    };
    var c4= new Chart(
      $('#pieVoiture'),configpieData
    ); 
  }