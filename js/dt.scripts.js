/**
 * Data table scripts
 */

$(function(){
    // datatables
	$('.datatable').dataTable({
		"oLanguage": {
			"sUrl": "js/dt_ru.txt"
		},
		"aaSorting": [],
        "bStateSave": true
	});
    
    // Pages
    $('.dt_pages').dataTable({
		"oLanguage": {
			"sUrl": "js/dt_ru.txt"
		},
		"aaSorting": [[ 0, "asc" ]],
        "bStateSave": true,
        "aoColumns": [ 
          null,
          null,
          null,
          { "bSortable": false }
        ]
	});
    
    // Menu
    $('.dt_menu').dataTable({
		"oLanguage": {
			"sUrl": "js/dt_ru.txt"
		},
		"aaSorting": [[ 4, "asc" ]],
        "bStateSave": true,
        "aoColumns": [ 
          null,
          null,
          null,
          null,
          { "bSortable": false }
        ]
	}); 
    
    // Gallery
    $('.dt_gallery').dataTable({
		"oLanguage": {
			"sUrl": "js/dt_ru.txt"
		},
		"aaSorting": [[ 0, "asc" ]],
        "bStateSave": true,
        "aoColumns": [ 
          null,
          null,
          null,
          { "bSortable": false }
        ]
	});
    
    // Dt three cols
    $('.dt_three').dataTable({
		"oLanguage": {
			"sUrl": "js/dt_ru.txt"
		},
		"aaSorting": [[ 0, "asc" ]],
        "bStateSave": true,
        "aoColumns": [ 
          null,
          null,
          { "bSortable": false }
        ]
	}); 
});