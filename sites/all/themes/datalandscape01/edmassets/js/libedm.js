
function gline_summary(container, _data) {
    
    var _categories = ['2013','2014','2015','2016','2017','2018','2019','2020','2025'];
    
    var ncat = _categories.length;
    
    var _serie_ch_forecast = Array(ncat).fill(null);
    _serie_ch_forecast[ncat - 2] = _data.data()[ncat - 2];
    _serie_ch_forecast[ncat - 1] = _data.ch_forecast();
    
    var _serie_hg_forecast = Array(ncat).fill(null);
    _serie_hg_forecast[ncat - 2] = _data.data()[ncat - 2];
    _serie_hg_forecast[ncat - 1] = _data.hg_forecast();
    
    var rad = 3;
    
    Highcharts.chart(container, {
        title: {
            text: null // _data.title
        },
        subtitle: {
            text: null // 'Dotted line signifies forecast'
        },
        tooltip: {
           valueSuffix: _data.suffix
        },
        xAxis: {
            categories: _categories,
            labels: {
                style: {
                    fontSize: '9px'
                }
            }
        },
        yAxis: {
            title: {
                text: null
            },
            labels: {
                style: {
                    fontSize: '9px'
                }
            },
            tickPixelInterval: 40
        },
        series: [{
            data: _data.data(),
            name: 'Current and Baseline Forecast',
            lineWidth: 1,
            zIndex: 4,
            zoneAxis: 'x',
            color: '#2A9D8F',
            zones: [{
                value: 6
            }, {
                dashStyle: 'dash'
            }],
            marker: {
                enabled: true,
                symbol: 'circle',
                radius: rad
            }
        },{
            data: _serie_ch_forecast,
            name: 'Challenge Forecast',
            zIndex: 3,
            zoneAxis: 'x',
            color: '#E9C46A',
            zones: [{
                value: 5
            }, {
                dashStyle: 'dash'
            }],
            marker: {
                enabled: true,
                symbol: 'circle',
                radius: rad
            }
        },
        {
            data: _serie_hg_forecast,
            name: 'High Growth Forecast',
            zIndex: 2,
            zoneAxis: 'x',
            color: '#264653',
            zones: [{
                value: 5
            }, {
                dashStyle: 'dash'
            }],
            marker: {
                enabled: true,
                symbol: 'circle',
                radius: rad
            }
        }],
        credits: false,
        legend: false,
        chart: {
            spacingLeft: 0,
            spacingRight: 0
        }
    });
}

function table_normal(data, suffix) {
    
    //visible rows
    var vrs = [
        // 'r2016',
        // 'r2017',
        'r2018',
        'r2019',
        'r2020',
    ];
    
    let html = '<table class="table table-condensed table-bordered table-summary"><tbody>';
    
    var my_normalizer = normalizer(Object.values(data));
    
    for(var i in data) {
        if (!data.hasOwnProperty(i)) continue;
        var label = 'r' + i.toLowerCase().replace(/ +/g, '-');
        
        var class_hide = (vrs.indexOf(label) == -1) ? 'row-hide' : '';
        
        var val_normalize = (data[i] == null) ? '' : Math.round(my_normalizer(data[i]));
        
        html+='<tr class="' + label + ' ' + class_hide + '">' 
            + '<td class="c1">' 
            + i + '</td><td class="c2 percentageFill" data-perc="'+val_normalize+'">'+format_number(data[i], suffix)+'</td></tr>';
    }
    html+='<tr class="tr-toggle active" data-collapsed="1"><td colspan="2"><span>Show more</span></td></tr>';
    html+='</tbody></table>';
    
    return html;
}

function set_i($obj, info){
    
    if((info+'') !== '') {
        $obj.attr('data-original-title', info);
    }
}

function render_table_normal(container, data) {
    var _html = table_normal(data.datatable, data.suffix);
    jQuery('#'+container).html(_html);
    set_i(jQuery('#'+container).parent().find('h3 i'), data.information);
}

function format_number(n, suffix) {
    
    if (n > 1000000000) {
        return numberWithCommas(precisionRound(n/1000000, 0)) + ' M';
    }
    else if(n > 1000000) {
        return precisionRound(n/1000000,2) + ' M';
    }
    else if(n > 1000) {
        return precisionRound(n/1000, 2) + ' k';
    }
    else if(typeof suffix !== "undefined" && n !== null) {
        return precisionRound(n,1) + suffix;
    }
    else if(n === null) {
        return '<em>NA</em>';
    }
    else {
        return n;
    }
}

function precisionRound(number, precision) {
  var factor = Math.pow(10, precision);
  var val = Math.round(number * factor) / factor;
  return Number.parseFloat(val).toFixed(precision);
}

function normalizer(serie) {
    var min = d3.min(serie);
    var max = d3.max(serie);
    return d3.scaleLinear().domain([min, max]).range([15, 95]);
}

numberWithCommas = function(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

/**
 * Fill the CSS Background programmatically.
 * 
 * @param String el The element selector
 * @param int perc
 * @param bool use_color
 * @returns void
 */
function setFill(el, perc, use_color) {
    
    var color;
    
    if(use_color !== true) {
        color = '#f5f5f5';
    }
    else {
        
        if(isNaN(perc)){
            return null;
        }
        if(perc < 20) {
            color='#F8D7CF';
        }
        else if(perc < 40) {
            color='#FCE5D3';
        }
        else if(perc < 60) {
            color='#F9EED6';
        }
        else if(perc < 80) {
            color='#C4E4E0';
        }
        else if(perc <= 100) {
            color='#C3CCD0';
        }
    }
    
    jQuery(el)
        .css('background','-webkit-linear-gradient(right, '+color+' '+perc+'%,#ffffff '+perc+'%)')
        .css('background','-moz-linear-gradient(right, '+color+' '+perc+'%,#ffffff '+perc+'%)')
        .css('background','-ms-linear-gradient(right, '+color+' '+perc+'%,#ffffff '+perc+'%)')
        .css('background','-o-linear-gradient(right, '+color+' '+perc+'%,#ffffff '+perc+'%)')
        .css('background','linear-gradient(to left, '+color+' '+perc+'%,#ffffff '+perc+'%)');
}

/**
 * Render the EU map.
 * 
 * @param object data
 * @param string variable The title
 * @param bool init
 * @returns mixed
 */
function euromap(data, variable, init, keys) {
    
    var _subtitle = 'Map color shown '+keys.year +' values for the selected indicator';
    
    if(init === false) {
        console.log('Update records');
        hmap.setTitle({text: variable});
        hmap.setSubtitle({text: _subtitle});
        hmap.update({tooltip : {valueSuffix: ' '+keys.suffix}});
        jQuery('#hmap').highcharts().series[0].name=variable;
        jQuery('#hmap').highcharts().series[0].setData(data);
        
        return true;
    }
    
    // Create the chart
    hmap = Highcharts.mapChart('hmap', {
        chart: {
            map: 'custom/european-union',
            spacingLeft: 0,
            spacingRight: 0
        },
        title: {
            text: variable,
            style: {
                fontFamily: '"Helvetica Neue",Helvetica,Arial,sans-serif'
            }
        },
        subtitle: {
            text: _subtitle,
            style: {
                fontFamily: '"Helvetica Neue",Helvetica,Arial,sans-serif',
                fontSize: '11px',
                color: '#999999'
            }
        },
        tooltip: {
            valueSuffix: ' €'
        },
        mapNavigation: {
            enabled: false,
            buttonOptions: {
                verticalAlign: 'bottom'
            }
        },
        colorAxis: {
            min: 0,
            stops: [
                [0,     '#e76f51'], 
                [0.25,  '#F4A261'],
                [0.5,   '#E9C46A'], 
                [0.75,  '#2A9D8F'],
                [1,     '#264653']
            ]
        },
        series: [{
            data: data,
            name: variable,
            states: {
                hover: {
                    color: '#BADA55'
                }
            },
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }],
    
        plotOptions: {
          series: {
             shadow: true
          },
          candlestick: {
             lineColor: '#404048'
          },
          map: {
             shadow: false
          }
        }
    });
}

/**
 * Load CSV data from file and render the EU map.
 * 
 * @param string title
 * @param string csvfile
 * @param string key
 * @param bool is_init
 * @returns void
 */
function load_csv_eu(title, csvfile, keys, is_init) {
    
    d3.csv('/' + Drupal.settings.edmtool.path + "/edmassets/data/"+csvfile , function(data) {
        
        var eudata = [];
        data.forEach(function(rs) {
            var iso = highmaps_remap(rs['Abbr'].toLowerCase());
            eudata.push([iso ,parseFloat(rs[keys.year])]);
        });
        
        euromap(eudata, title, is_init, keys);
    });
}

/**
 * Remap some ISO code with strange values in HighMaps
 * @param string iso
 * @returns string
 */
function highmaps_remap(iso) {
    switch(iso) {
        case 'uk': iso='gb';
        break;
        case 'el': iso='gr';
    }
    return iso;
}


function minigraph_industries(container, _data, options) {
    
    var _categories = ['2013','2014','2015','2016','2017','2018','2019','2020','2025'];
    
    var ncat = _categories.length;
    
    var _serie_ch_forecast = Array(ncat).fill(null);
    _serie_ch_forecast[ncat - 2] = _data.data()[ncat - 2];
    _serie_ch_forecast[ncat - 1] = _data.ch_forecast();
    
    var _serie_hg_forecast = Array(ncat).fill(null);
    _serie_hg_forecast[ncat - 2] = _data.data()[ncat - 2];
    _serie_hg_forecast[ncat - 1] = _data.hg_forecast();
    
    var rad = 2;
    
    Highcharts.chart(container, {
        title: {
            text: _data.title,
            style: {
                fontSize: '14px'
            }
        },
        subtitle: {
            text: null // 'Dotted line signifies forecast'
        },
        tooltip: {
           valueSuffix: ' '+ _data.suffix
        },
        xAxis: {
            categories: _categories,
            labels: {
                style: {
                    fontSize: '9px'
                }
            }
        },
        yAxis: {
            title: {
                text: null
            },
            labels: {
                style: {
                    fontSize: '9px'
                }
            },
            tickPixelInterval: 40,
            max: options.max,
            min: options.min
        },
        series: [{
            data: _data.data(),
            name: 'Data',
            lineWidth: 1,
            zIndex: 4,
            zoneAxis: 'x',
            color: options.linecolor,
            zones: [{
                value: 6
            }, {
                dashStyle: 'dash'
            }],
            marker: {
                enabled: true,
                symbol: 'circle',
                radius: rad
            }
        },{
            data: _serie_ch_forecast,
            name: 'Challenge Forecast',
            zIndex: 3,
            zoneAxis: 'x',
            color: '#E9C46A',
            zones: [{
                value: 6
            }, {
                dashStyle: 'dash'
            }],
            marker: {
                enabled: true,
                symbol: 'circle',
                radius: rad
            }
        },
        {
            data: _serie_hg_forecast,
            name: 'High Growth Forecast',
            zIndex: 2,
            zoneAxis: 'x',
            color: '#264653',
            zones: [{
                value: 6
            }, {
                dashStyle: 'dash'
            }],
            marker: {
                enabled: true,
                symbol: 'circle',
                radius: rad
            }
        }],
        credits: false,
        legend: false,
        chart: {
            spacingLeft: 0,
            spacingRight: 0
        }
    });
}



/**
 * Load CSV data from file and render the EU map.
 * 
 * @param string title
 * @param string csvfile
 * @param function callback
 * @returns void
 */
function load_industries_csv(title, csvfile, _suffix) {
    
    var indata = [];
    var objs = [];
    
    d3.csv('/' + Drupal.settings.edmtool.path + "/edmassets/data/" + csvfile , function(data) {
        
        data.forEach(function(rs) {
            indata.push(rs);
        });
        
        // use slice() to copy the array and not just make a reference
        var sindu = indata.slice(0);
        sindu.sort(function(a,b) {
            return b['2020'] - a['2020'];
        });
        
        sindu.forEach(function(rs) {
            var o = new DataObject(
                rs['Industry'],
                {
                    '2013': (rs['2013'] !== 'undefined') ? parseFloat(rs['2013']) : null,
                    '2014': (rs['2014'] !== 'undefined') ? parseFloat(rs['2014']) : null,
                    '2015': (rs['2015'] !== 'undefined') ? parseFloat(rs['2015']) : null,
                    '2016': (rs['2016'] !== 'undefined') ? parseFloat(rs['2016']) : null,
                    '2017': (rs['2017'] !== 'undefined') ? parseFloat(rs['2017']) : null,
                    '2018': (rs['2018'] !== 'undefined') ? parseFloat(rs['2018']) : null,
                    '2019': (rs['2019'] !== 'undefined') ? parseFloat(rs['2019']) : null,
                    '2020': (rs['2020'] !== 'undefined') ? parseFloat(rs['2020']) : null,
                    '2025 Challenge' : (rs['2025_c'] !== 'undefined') ? parseFloat(rs['2025_c']) : null,
                    '2025 Baseline' : (rs['2025_b'] !== 'undefined') ? parseFloat(rs['2025_b']) : null,
                    '2025 High Growth' : (rs['2025_h'] !== 'undefined') ? parseFloat(rs['2025_h']) : null
                },
                _suffix);
                
            objs.push(o);
        });
        
        clear_graphs();
        render_indu_graphs(objs);
        
    });
    
    return objs;
}

function render_indu_graphs(di) {
    
    var mx=[];
    var mn=[]; 
    di.forEach(function(e){  
        mx.push(d3.max(d3.values(e.datatable))); 
        mn.push(d3.min(d3.values(e.datatable))); 
    });
    
    var colors= [
        '#F8766D','#DE8C00','#B79F00','#7CAE00','#00BA38','#00C08B',
        '#00BFC4','#00B4F0','#619CFF','#C77CFF','#F564E3','#FF64B0'
        ];

    var options={
        max: d3.max(mx),
        min: d3.min(mn)
    };
    
    for(var i=0; i<di.length; i++) { 
        options.linecolor = colors[i];
        minigraph_industries('indu-cont-' + i , di[i], options); 
    }
}

function clear_graphs() {
    for(var i=0; i<12; i++) { 
        jQuery('#indu-cont-' + i).html(null); 
    }
}

