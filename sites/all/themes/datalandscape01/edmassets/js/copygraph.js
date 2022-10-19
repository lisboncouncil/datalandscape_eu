(function ($) {
        function copyGraph(obj) {
        var focusgraph = $(obj).highcharts();
        var newopt = focusgraph.options;

        var $h3 = $(obj).prev();
        newopt.title = { text : $.trim($h3.text())};
        newopt.subtitle = { text : $.trim($h3.children().attr('data-original-title'))};

        if($('#graphmodal_canvas').length == 0) {
            var modal = '<div id="graphmodal_canvas" class="modal fade" tabindex="-1" role="dialog"><div class="modal-dialog" role="document"><div class="modal-content">'
                + '<div class="modal-body" id="modal-graph"></div>'
                + '</div></div></div>';
            $('body').append(modal);
        }

        $('#graphmodal_canvas').modal('show');
        copiedGraph = Highcharts.chart('modal-graph', newopt);

        $('#graphmodal_canvas').on('hidden.bs.modal', function(){
            copiedGraph.destroy();
        });

    }

    $(document).ready( function (){
        $('.tline').css('cursor', 'zoom-in');
        $('.tline').on('click', function (){
            copyGraph($(this));
        });
    });
    
}(jQuery));