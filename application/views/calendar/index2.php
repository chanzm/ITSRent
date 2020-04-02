<!-- Display event calendar -->
<div id="calendar_div">
    <?php echo $eventCalendar; ?>
</div>

<!-- jQuery library -->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

<script>
function getCalendar(target_div, year, month){
    $.get( '<?php echo base_url('calendar/eventCalendar/'); ?>'+year+'/'+month, function( html ) {
        $('#'+target_div).html(html);
    });
}

function getEvents(date){
    $.get( '<?php echo base_url('calendar/getEvents/'); ?>'+date, function( html ) {
        $('#event_list').html(html);
        $('#event_list').slideDown('slow');
    });
}
</script>

<script>
$(document).on("mouseenter", ".date_cell", function(){
    date = $(this).attr('date');
    $(".date_popup_wrap").fadeOut();
    $("#date_popup_"+date).fadeIn();
});
$(document).on("mouseleave", ".date_cell", function(){
    $(".date_popup_wrap").fadeOut();
});
$(document).on("change", ".month_dropdown", function(){
    getCalendar('calendar_div', $('.year_dropdown').val(), $('.month_dropdown').val());
});
$(document).on("change", ".year_dropdown", function(){
    getCalendar('calendar_div', $('.year_dropdown').val(), $('.month_dropdown').val());
});
$(document).click(function(){
    $('#event_list').slideUp('slow');
});
</script>