am4core.ready(function() {    
    am4core.useTheme(am4themes_animated);
    var chart = am4core.create("tasks", am4charts.PieChart);
    
    chart.rtl = true;

    var tasks = '';
    var view_data = $.ajax({
        url         :   '/api/tasks',
        async       :    false,
        dataType    :   "json",
        type        :   "get", 
        success:function(data, textStatus, jqXHR) {
            tasks = data;
        }       
    });

    // Add data
    chart.data = tasks;
    
    chart.innerRadius = am4core.percent(50);
    // chart.height = am4core.percent(100);
    // chart.width = am4core.percent(100);
    chart.layout = "vertical";


    // Add and configure Series
    var pieSeries = chart.series.push(new am4charts.PieSeries());
    pieSeries.dataFields.value = "value";
    pieSeries.dataFields.category = "key";
    
    pieSeries.ticks.template.disabled = true;
    pieSeries.alignLabels = false;
    pieSeries.labels.template.text = "{value.percent.formatNumber('#.0')}%";
    pieSeries.labels.template.radius = am4core.percent(5);
    pieSeries.labels.template.fill = am4core.color("#5bb0c4");

    //hide series less than 5 
    pieSeries.ticks.template.adapter.add("hidden", hideSmall);
    pieSeries.labels.template.adapter.add("hidden", hideSmall);
    function hideSmall(hidden, target) {
        return target.dataItem.values.value.percent < 9 ? true : false;
    }    

    // Legend
    chart.legend = new am4charts.Legend();    
    chart.legend.useDefaultMarker = true;
    chart.legend.itemContainers.template.paddingTop = 0;
    chart.legend.itemContainers.template.paddingBottom = 0;
    chart.legend.itemContainers.template.paddingRight = 0;
    chart.legend.itemContainers.template.paddingLeft = 0;
    chart.legend.labels.template.text = "[{color}]{name}";
    chart.legend.valueLabels.template.disabled = true;

    // Legend size and position
    var markerTemplate = chart.legend.markers.template;
    markerTemplate.width = 7;
    markerTemplate.height = 7;
    chart.legend.position = "bottom";
    chart.legend.valign = "middle";
    
});

$(document).ready(function() {
            
    var top_5_users = '';
    var view_data = $.ajax({
        url         :   '/api/top_5_users',
        async       :    false,
        dataType    :   "json",
        type        :   "get", 
        success:function(data, textStatus, jqXHR) {
            top_5_users = data;
        }       
    });

    // var top_5_users = mapData.sort(function(a, b) { return a.value < b.value ? 1 : -1; }).slice(0, 5);
    $('#top_5_users').DataTable({
        bAutoWidth: false,
        paging: false,
        searching: false,
        ordering:  false,
        select: false,
        "info": false,
        "language": {
            "search": "بحث"
        },
        data: top_5_users,
        "columnDefs": [
            {
                "targets": 0,
                "render": function ( data, type, row, meta ) {
                    var column = row['name']; 
                    return '<div class="first-td"><div class="tx-primary">'+column+' </div></div>';
                }
            },
            {
                "targets": 1,
                "render": function ( data, type, row, meta ) {
                    var column = row['value']; 
                    return '<div class="first-td"><div class="tx-primary">'+column+' </div></div>';
                }
            }
        ],  
        "columns"     :   [
            { "data": "name" },
            { "data": "value" },
        ],
    });
});