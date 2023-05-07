import 'chart.js';


document.addEventListener('DOMContentLoaded', function () {
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
  
    var c= new Chart(
      ctx,
      { 
        type: 'bar',
        data: {
        labels: data2.map(row => row.year),
         datasets: [
            {
            label: 'Acquisitions by year',
            data: data2.map(row => row.count)
            }
          ]
        }
      }
    );

    
  }, false);
