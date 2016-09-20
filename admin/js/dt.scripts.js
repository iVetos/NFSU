/**
 * Data table scripts
 */

$(function(){
    // datatables
	$('.datatable').dataTable({
		"oLanguage": {
			"sUrl": "js/dt_" + curLang + ".txt"
		},
		"aaSorting": [],
        stateSave: true
	});
    
    // Pages
    $('.dt-pages').dataTable({
		"oLanguage": {
			"sUrl": "js/dt_" + curLang + ".txt"
		},
		"aaSorting": [[ 0, "asc" ]],
        stateSave: true,
        "aoColumns": [ 
          null,
          null,
          null,
          { "bSortable": false }
        ]
	});
    
    // Menu
    $('.dt-menu').dataTable({
		"oLanguage": {
			"sUrl": "js/dt_" + curLang + ".txt"
		},
		"aaSorting": [[ 3, "asc" ]],
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
			"sUrl": "js/dt_" + curLang + ".txt"
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
    
    // Dt admins
    $('.dt_admins').dataTable({
		"oLanguage": {
			"sUrl": "js/dt_" + curLang + ".txt"
		},
		"aaSorting": [[ 1, "asc" ]],
        "bStateSave": true,
        "aoColumns": [ 
          null,
          null,
          null,
          null,
          { "bSortable": false }
        ]
	});
    
    // Dt users
    $('.dt_users').dataTable({
		"oLanguage": {
			"sUrl": "js/dt_" + curLang + ".txt"
		},
		"aaSorting": [[ 1, "asc" ]],
        "bStateSave": true,
        "aoColumns": [ 
          null,
          null,
          { "bSortable": false },
          null,
          { "bSortable": false },
          { "bSortable": false },
          { "bSortable": false }
        ]
	}); 
    
    // Dt three cols
    $('.dt-three').dataTable({
		"oLanguage": {
			"sUrl": "js/dt_" + curLang + ".txt"
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