/**
 * plugin.js
 *
 * Copyright, VAN STEIN & GROENTJES B.V.
 *
 */

/*jshint unused:false */
/*global tinymce:true */

/**
 * PLUGIN TO ADD CHOICES IN THE EBOOK
 */
tinymce.PluginManager.add('storychoice', function(editor, url) {
	// Add a button that opens a window
	editor.addButton('storychoice', {
		text: 'Insert Story Choice',
		icon: 'link',
		onclick: function() {
			// Open window
			editor.windowManager.open({
				title: 'Insert Story Choice',
				body: [
					{type: 'label',text:'Add a link and story text, if the link is pressed the story will be shown. Initialy all linked stories will be hidden.'},	
					{type: 'textbox', name: 'linktext', label: 'Link text:'},
					{type: 'label',text:'The number of the group determines which other choices are connected to this choice.'},	
					{type: 'textbox', name: 'choicegroup', label: 'Group number:'},
					{type: 'textbox', multiline:'true', name: 'story', label: 'Story:'},
					{type: 'checkbox', label:'Hide all other open choices when clicked.', name: 'hidestories'},
					{type: 'checkbox', label:'Disable other choices when clicked.', name: 'hidelinks'}
				],
				onsubmit: function(e) {
					// Insert content when the window form is submitted
					var choicenumber = 0;
					var choicegroup = e.data.choicegroup;
					var id = "ascenario";
					if (e.data.hidestories == true){
						var id = "scenario";
					}
					if (e.data.hidelinks == true){
						var id = "hidescenario";
					}
					while ( editor.dom.get(id+choicenumber)!= null ){
						choicenumber += 1;
					}
					console.log(choicenumber);
					
					var newchoice = '<a href="#'+id+choicenumber+'" class="choicegroup'+choicegroup+'">'+e.data.linktext+'</a><div id="'+id+choicenumber+'" class="choicegroup'+choicegroup+'"><p>'+e.data.story+'<br/></p></div><p>(After story)</p>'
				
					editor.insertContent(newchoice);
				}
			});
		}
	});

	/* Adds a menu item to the tools menu
	editor.addMenuItem('example', {
		text: 'Example plugin',
		context: 'tools',
		onclick: function() {
			// Open window with a specific url
			editor.windowManager.open({
				title: 'TinyMCE site',
				url: url + '/dialog.html',
				width: 600,
				height: 400,
				buttons: [
					{
						text: 'Insert',
						onclick: function() {
							// Top most window object
							var win = editor.windowManager.getWindows()[0];

							// Insert the contents of the dialog.html textarea into the editor
							editor.insertContent(win.getContentWindow().document.getElementById('content').value);

							// Close the window
							win.close();
						}
					},

					{text: 'Close', onclick: 'close'}
				]
			});
		}
	});
*/
});/**
 * plugin.js
 *
 * Copyright, VAN STEIN & GROENTJES B.V.
 *
 */

/*jshint unused:false */
/*global tinymce:true */

/**
 * PLUGIN TO ADD CHOICES IN THE EBOOK
 */
tinymce.PluginManager.add('storychoice', function(editor, url) {
	// Add a button that opens a window
	editor.addButton('storychoice', {
		text: 'Insert Story Choice',
		icon: 'link',
		onclick: function() {
			// Open window
			editor.windowManager.open({
				title: 'Insert Story Choice',
				body: [
					{type: 'label',text:'Add a link and story text, if the link is pressed the story will be shown. Initialy all linked stories will be hidden.'},	
					{type: 'textbox', name: 'linktext', label: 'Link text:'},
					{type: 'textbox', multiline:'true', name: 'story', label: 'Story:'},
					{type: 'label',text:'The number of the group determines which other choices are connected to this choice.'},	
					{type: 'textbox', name: 'choicegroup', label: 'Group number:'},
					{type: 'checkbox', label:'Hide all other open choices when clicked.', name: 'hidestories'},
					{type: 'checkbox', label:'Disable other choices when clicked.', name: 'hidelinks'}
				],
				onsubmit: function(e) {
					// Insert content when the window form is submitted
					var choicenumber = 0;
					var choicegroup = e.data.choicegroup;
					var id = "-scenario";
					if (e.data.hidestories == true){
						var id = "scenario";
					}
					if (e.data.hidelinks == true){
						var id = "hidescenario";
					}
					while ( editor.dom.get(id+choicenumber)!= null ){
						choicenumber += 1;
					}
					console.log(choicenumber);
					
					var newchoice = '<a href="#'+id+choicenumber+'" class="choicegroup'+choicegroup+'">'+e.data.linktext+'</a><div id="'+id+choicenumber+'" class="choicegroup'+choicegroup+'"><p>'+e.data.story+'<br/></p></div><p>(After story)</p>'
				
					editor.insertContent(newchoice);
				}
			});
		}
	});

	/* Adds a menu item to the tools menu
	editor.addMenuItem('example', {
		text: 'Example plugin',
		context: 'tools',
		onclick: function() {
			// Open window with a specific url
			editor.windowManager.open({
				title: 'TinyMCE site',
				url: url + '/dialog.html',
				width: 600,
				height: 400,
				buttons: [
					{
						text: 'Insert',
						onclick: function() {
							// Top most window object
							var win = editor.windowManager.getWindows()[0];

							// Insert the contents of the dialog.html textarea into the editor
							editor.insertContent(win.getContentWindow().document.getElementById('content').value);

							// Close the window
							win.close();
						}
					},

					{text: 'Close', onclick: 'close'}
				]
			});
		}
	});
*/
});