$(document).ready(function() { 
    
    google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawTrendlines);

function drawTrendlines() {
      var data = new google.visualization.DataTable();
      data.addColumn('timeofday', 'الدول العربية');
      data.addColumn('number', 'معدل الأصابات');
      data.addColumn('number', 'معدل الوفيات');

var data = google.visualization.arrayToDataTable([
          ['مكان الأصابة', 'أصابات', 'وفيات'],
          ['الثدي',43 ,16 ],
          ['البروستات',20 ,10 ],
          ['الرئة',15 ,14 ],
          ['القولون',11 , 6],
          ['المثانية',9 ,4 ],
          ['الكبد',8 , 8],
          ['المعدة',7 ,6 ]
        ]);


      var options = {
        title: 'معدل أنتشار السرطان للشرق الأوسط وشمال أفريقيا لكل 100,000',
        trendlines: {
         
        },
        hAxis: {
          title: '',
          format: 'h:mm a',
          viewWindow: {
            min: [100, 60, 3],
            max: [100, 60, 20]
          }
        },
        vAxis: {
          title: ''
        }
      };

      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    
    
    
    
    
    
    
    
    
  google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
     function getValueAt(column, dataTable, row) {
        return dataTable.getFormattedValue(row, column);
      }
    calc: getValueAt.bind(undefined, 1)
      var data = google.visualization.arrayToDataTable([
        ["الدولة", "العدد", { role: "style" } ],
        ["مصر", 49.5, "#3366CC"],
        ["السودان", 27.83, "#3366CC"],
        ["الجزائر", 48.51, "#3366CC"],
        ["المغرب", 40.82, "color: #3366CC"],   
        ["العراق", 42.55, "#3366CC"],
        ["السعودية", 29.55, "#3366CC"],
        ["اليمن", 27.36, "#3366CC"],
        ["سوريا", 52.53, "color: #3366CC"],   
        ["تونس", 31.8, "#3366CC"],
        ["الصومال", 40.55, "#3366CC"],
        ["ليبيا", 24.1, "#3366CC"],
        ["الأردن", 61.3, "color: #3366CC"],    
        ["أرتريا", 35.88, "color: #3366CC"],    
        ["الأمارات", 39.22, "color: #3366CC"],    
        ["لبنان", 78.68, "color: #3366CC"],    
        ["فلسطين", 44.05, "color: #3366CC"],    
        ["موريتانيا",25.82 , "color: #3366CC"],    
        ["الكويت",46.68 , "color: #3366CC"],    
        ["عمان",26 , "color: #3366CC"],    
        ["قطر", 64.1, "color: #3366CC"],    
        ["جيبوتي", 35.91, "color: #3366CC"],    
        ["البحرين", 42.46, "color: #3366CC"],    
        ["جزر القمر", 17.04, "color: #3366CC"],    
        ["الصحراء الغربية", 36.22, "color: #3366CC"],    
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "معدل المصابين المصابين بسرطان الثدي في الدول العربية لكل 100.000 شخص",
        width: 1100,
        height: 400,
        bar: {groupWidth: "15%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
    
 
    
    
    
    
    
    
    
    
});