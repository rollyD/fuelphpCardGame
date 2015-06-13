function deck_switch() {
    var info = $('form').serialize();
    $.ajax({
        method: "POST",
        url: "switch/deck",
        data: info
    })
    .done(function(data) {
        var response = $.parseJSON(data);
        var cardlist = "";
        var skills = "";
        if (response.cards.length !== 0) {
            //getting all the list of the cards on the selected desk
            $.each(response.cards, function(k, v) {
                cardlist += '<div class="list-group-item">' + v + '</div>';
            });
            //getting all the skills
            $.each(response.skills, function(k, v){
                if (v) {
                    skills += '<strong>+ ' + v + '</strong><br/>';
                }
            });
            if (skills) {
                $('#skills').html(skills);
            }
            else {
                $('#skills').html('<strong>No skills available</strong>');
            }
            
            $('#defence').html(response.defence);
            $('#strength').html(response.strength);
            $('#deck-number').html(response.deck);
            $('#cards-list').html(cardlist);
            $('#error_message').html('<div role="alert" class="alert alert-success alert-dismissible">'+
                '<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>'+
                    'Deck changed to <strong>'+ response.deck + '</strong>'+
              '</div>');
        }
        else {
            $('#skills').html('<strong>No skills available</strong>');
            $('#defence').html('0');
            $('#strength').html('0');
            $('#deck-number').html(response.deck);
            $('#cards-list').html('<div class="list-group-item"><br/></div><div class="list-group-item"><br/></div><div class="list-group-item"><br/></div>');
            $('#error_message').html('<div role="alert" class="alert alert-danger alert-dismissible">'+
                '<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>'+
                '<strong>Sorry!</strong> You don\'t have any card on this deck.'+
              '</div>');
        }
        
    });
}
