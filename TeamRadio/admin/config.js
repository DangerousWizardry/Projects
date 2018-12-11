  
$(function () {

  "use strict";

  //Make the dashboard widgets sortable Using jquery UI
  $(".connectedSortable").sortable({
    placeholder: "sort-highlight",
    connectWith: ".connectedSortable",
    handle: ".box-header, .nav-tabs",
    forcePlaceholderSize: true,
    zIndex: 999999
  });
  $(".connectedSortable .box-header, .connectedSortable .nav-tabs-custom").css("cursor", "move");

  /* jQueryKnob */
  $(".knob").knob();
  //Fix for charts under tabs
  $('.box ul.nav a').on('shown.bs.tab', function () {
    area.redraw();
    donut.redraw();
    line.redraw();
  });
});
function useragent(data){
  data = JSON.parse(data);
  $('#knob1')
        .val(data["type1"])
        .trigger('change');
  $('#knob3')
        .val(data["type2"])
        .trigger('change');
  $('#knob2')
        .val(data["type3"])
        .trigger('change');
}
  function auditbyhour(arraydata){
    Morris.Line({
    element: 'line-chart',
    resize: true,
    data: arraydata,
    xkey: 'time',
    ykeys: ['auditeurs'],
    labels: ['Auditeurs'],
    lineColors: ['#efefef'],
    lineWidth: 2,
    hideHover: 'auto',
    gridTextColor: "#fff",
    gridStrokeWidth: 0.4,
    pointSize: 4,
    pointStrokeColors: ["#efefef"],
    gridLineColor: "#efefef",
    gridTextFamily: "Open Sans",
    gridTextSize: 10
  });
  }
  function auditbymin(data){
  $('#sparkline-1').sparkline(JSON.parse("[" + data + "]"), {
    type: 'line',
    lineColor: '#92c1dc',
    fillColor: "#ebf4f9",
    height: '50',
    width: '80'
  });
  }
  function connectedbymin(data){
  $('#sparkline-2').sparkline(JSON.parse("[" + data + "]"), {
    type: 'line',
    lineColor: '#92c1dc',
    fillColor: "#ebf4f9",
    height: '50',
    width: '80'
  });
  }
  function tchatstats(data){
  $('#sparkline-3').sparkline(JSON.parse("[" + data + "]"), {
    type: 'line',
    lineColor: '#92c1dc',
    fillColor: "#ebf4f9",
    height: '50',
    width: '80'
  });
  }