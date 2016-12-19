 //
 // Automate some form control synchronization.
 //
 
 $( document ).ready(function() {
            $('.card.thumbnail > .content').click(function() {
                var graphic_id = $(this).find('input.graphic-id').first().val();
                window.location.href = "/graphics/" + graphic_id;
            });
        });