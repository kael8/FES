function result(dataId) {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var res = document.getElementById("res");

    $.ajax({
        type: "POST",
        url: "/pro-result",
        data: { dataId: dataId },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function (response) {
            if (response.status_code === 0) {
                res.style.display = "block";
                $('#A').html(response.A);
                $('#B').html(response.B);
                $('#C').html(response.C);
                $('#D').html(response.D);
                $('#total').html(response.total);
                $('#rt').html('Rating Period: ' + response.rating_period);
                $('#nf').html('Name of Faculty: ' + response.name);
                $('#cs').html('Contract of Service: ' + response.service);
                $('#cd').html('College/Department: ' + response.dep);
                $('#A1').html(response.A1);
                $('#A2').html(response.A2);
                $('#A3').html(response.A3);
                $('#A4').html(response.A4);
                $('#A5').html(response.A5);
                $('#B1').html(response.B1);
                $('#B2').html(response.B2);
                $('#B3').html(response.B3);
                $('#B4').html(response.B4);
                $('#B5').html(response.B5);
                $('#C1').html(response.C1);
                $('#C2').html(response.C2);
                $('#C3').html(response.C3);
                $('#C4').html(response.C4);
                $('#C5').html(response.C5);
                $('#D1').html(response.D1);
                $('#D2').html(response.D2);
                $('#D3').html(response.D3);
                $('#D4').html(response.D4);
                $('#D5').html(response.D5);
                $('#TotalA').html(response.A);
                $('#TotalB').html(response.B);
                $('#TotalC').html(response.C);
                $('#TotalD').html(response.D);
                $('#college').html(response.college.toUpperCase());
                $('#dep_head').html(response.dep_head);
                $('#coll').html(response.college_name);
                
                const text = response.comment;
                console.log(text);

                
                Highcharts.chart('sentiment', {
                    chart: {
                        type: 'pie',
                        options3d: {
                            enabled: true,
                            alpha: 45,
                            beta: 0
                        }
                    },
                    title: {
                        text: 'SentimentAnalysis',
                        align: 'center'
                    },
                    accessibility: {
                        point: {
                            valueSuffix: '%'
                        }
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            size: '100%',
                            innerSize: 100,
                            allowPointSelect: true,
                            cursor: 'pointer',
                            depth: 35,
                            dataLabels: {
                                enabled: true,
                                alignTo: 'plotEdges',
                                connectorShape: function(labelPosition, connectorPosition, options) {
                                    var connectorPadding = options.connectorPadding,
                                      touchingSliceAt = connectorPosition.touchingSliceAt,
                                      series = this.series,
                                      plotWidth = series.chart.plotWidth,
                                      plotLeft = series.chart.plotLeft,
                                      alignment = labelPosition.alignment,
                                      stepDistance = 150, // in px - distance between the step and vertical border of the plot area
                                      stepX = alignment === 'left' ? plotLeft + plotWidth - stepDistance : plotLeft + stepDistance;
                                    return ['M',
                                      labelPosition.x + (alignment === 'left' ? 1 : -1) *
                                      connectorPadding,
                                      labelPosition.y,
                                      'L',
                                      stepX,
                                      labelPosition.y,
                                      'L',
                                      stepX,
                                      touchingSliceAt.y,
                                      'L',
                                      touchingSliceAt.x,
                                      touchingSliceAt.y
                                    ];
                                  },
                                pointFormat: '{point.name}: <b>{point.percentage:.1f}%</b>'
                            }
                        }
                    },
                    series: [{
                        type: 'pie',
                        name: 'Sentiment',
                        data: [
                            ['Positive', response.positive],
                            ['Negative', response.negative],
                        ]
                    }]
                });





                const lines = text.replace(/[():'?0-9]+/g, '').split(/[,\. ]+/g);
const data = lines.reduce((arr, word) => {
    let obj = Highcharts.find(arr, obj => obj.name === word);
    if (obj) {
        obj.weight += 1;
    } else {
        obj = {
            name: word,
            weight: 1
        };
        arr.push(obj);
    }
    return arr;
}, []);

Highcharts.chart('wordcloud', {
    accessibility: {
        screenReaderSection: {
            beforeChartFormat: '<h5>{chartTitle}</h5>' +
                '<div>{chartSubtitle}</div>' +
                '<div>{chartLongdesc}</div>' +
                '<div>{viewTableButton}</div>'
        }
    },
    series: [{
        type: 'wordcloud',
        data,
        name: 'Occurrences',
        rotation: {
            from: 0,
            to: 0,
            orientations: 6 // You can experiment with the number of orientations
        },
        style: {
            fontFamily: 'Arial', // You can change the font style
            textOutline: 'none'
        }
    }],
    title: {
        text: 'Wordcloud of Student Comments',
        align: 'center'
    },
    tooltip: {
        headerFormat: '<span style="font-size: 16px"><b>{point.key}</b></span><br>'
    }
});




                scrollToElement("sentiment");
            } else {
                $('#error-message').html(response.Message);
                $('#error-message').css('color', 'tomato');
                $('#error-message').css('font-size', '0.7rem');
            }
        },
    });
}

function scrollToElement(elementId) {
    var element = document.getElementById(elementId);
    if (element) {
        element.scrollIntoView({ behavior: "smooth" }); // Scroll to the element smoothly
    }
}
